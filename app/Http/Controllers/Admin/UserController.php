<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\UserData;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function index()
    {

        $urlParams = request()->query();

        $query = DB::table('users')
            ->leftJoin('user_data', 'users.id', '=', 'user_data.user_id');

        if (isset($urlParams['status'])) {
            $query->where('is_active', '=', (int)$urlParams['status']);
        }

        if (isset($urlParams['search'])) {
            $query->whereAny(['name', 'email', 'user_data.phone_number'], 'like', "%" . $urlParams['search'] . "%");
        }

        $users = $query->paginate(10);

        //@dd($query->toSql());

        return view('admin.user.index', ['users' => $users]);
    }


    public function edit(string $id)
    {
        $user = User::with(['userData', 'roles'])->findOrFail($id);
        $roles = Role::all();
        return view('admin.user.create', compact('user', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', ['roles' => $roles]);
    }

    public function update(Request $request, string $id)
    {
        try {
            $user = User::findorFail($id);

            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => [
                    'required',
                    Rule::unique('users')->ignore($id)
                ],
                'password' => [
                    Rule::excludeIf(empty($request->get('password'))),
                    'required',
                    'confirmed'
                ],
                'role' => 'required'
            ]);


            if ($validator->fails()) {
                return redirect('/admin/user/edit/' . $id)
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($request->get('password')) {
                User::where('id', $id)->update($request->only('email', 'password', 'is_active'));
            } else {
                User::where('id', $id)->update($request->only('email', 'is_active'));
            }

            UserData::where('user_id', $id)->update(
                $request->only(
                    'name',
                    'phone_number',
                    'designation',
                    'about_user',
                    'facebook_url',
                    'twitter_url',
                    'linkedin_url',
                    'profile_picture'
                )
            );

            $user->roles()->sync($request->input('role'));

            return redirect('/admin/users')->with('success', 'User updated successfully!');
        } catch (Exception $e) {
            return redirect('/admin/users')->with('error', 'Failed to update user.');
        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|confirmed',
            'role' => 'required'
        ], [
            'role.required' => 'Please provide atleast one access'
        ]);

        try {

            $user = User::create([
                'email' => $request->get('email'),
                'password' => Hash::make($request->get('password')),
                'is_active' => $request->get('status'),
            ]);

            $user->userData()->create([
                'name' => $request->get('name'),
                'phone_number' => $request->get('phone_number'),
                'designation' => $request->get('designation'),
                'about_user' => $request->get('about_user'),
                'facebook_url' => $request->get('facebook_url'),
                'twitter_url' => $request->get('twitter_url'),
                'linkedin_url' => $request->get('linkedin_url'),
                'profile_picture' => $request->get('profile_picture'),
            ]);

            $user_roles = $request->get('role');
            if ($user_roles) {
                foreach ($user_roles as $user_role) {
                    $user->roles()->attach($user_role);
                }
            }

            return redirect('/admin/users')->with('success', 'User Added Successfully.');
        } catch (Exception $e) {
            return redirect('/admin/users')->with('error', 'Failed to add user');
        }
    }
}
