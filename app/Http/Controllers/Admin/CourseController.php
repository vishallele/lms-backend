<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourseController extends Controller
{
    public function index()
    {
        $query = DB::table('courses');

        $query->where('deleted_at', '=', null);

        $courses = $query->paginate(10);

        return view('admin.course.index', ['courses' => $courses]);
    }

    public function create()
    {
        return view('admin.course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        try {
            $course = Course::create([
                "title" => $request->get('title'),
                "description" => $request->get('description'),
            ]);

            if ($course) {
                return redirect('/admin/courses')->with('success', 'Course Added Successfully.');
            }

            return redirect('/admin/courses')->with('error', 'Failed to add course');
        } catch (\Exception $e) {
            return redirect('/admin/courses')->with('error', 'Failed to add course');
        }
    }

    public function edit(string $id)
    {
        $course = Course::findOrFail($id);

        if (!$course) {
            return redirect('/admin/courses')->with('error', 'Course not found');
        }

        return view('admin.course.create', compact('course'));
    }

    public function update(Request $request, string $id)
    {
        try {

            $request->validate([
                'title' => 'required',
            ]);

            $course = Course::findOrFail($id);

            $cs = Course::where('id', $id)->update($request->only('title', 'description'));

            if ($cs) {
                return redirect('/admin/courses')->with('success', 'User updated successfully!');
            }

            return redirect('/admin/courses')->with('error', 'Failed to update course.');
        } catch (\Exception $e) {
            return redirect('/admin/courses')->with('error', 'Failed to update course.');
        }
    }
}
