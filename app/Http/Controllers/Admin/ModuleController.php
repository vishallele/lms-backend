<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Module;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    public function index(string $course_id)
    {
        if (!$course_id) {
            return redirect('/admin/courses')->with('error', 'Invalid course');
        }
        $modules = Module::where('course_id', '=', $course_id)->paginate(10);
        return view('admin.course.module.index', ['course_id' => $course_id, 'modules' => $modules]);
    }

    public function create(string $course_id)
    {
        return view('admin.course.module.create', ["course_id" => $course_id]);
    }

    public function store(Request $request, string $course_id)
    {

        //dd($request);

        $request->validate([
            'title' => 'required',
            'title_hi' => 'required',
            'title_mr' => 'required'
        ]);

        try {

            $titleTranslations = [
                'en' => $request->get('title'),
                'hi' => $request->get('title_hi'),
                'mr' => $request->get('title_mr'),
            ];

            $descriptionTranslation = [
                'en' => $request->get('description'),
                'hi' => $request->get('description_hi'),
                'mr' => $request->get('description_mr'),
            ];

            $module = Module::create([
                'title' => $titleTranslations,
                'course_id' => $course_id,
                'description' => $descriptionTranslation
            ]);

            //dd($module);

            if (!$module) {
                return redirect('/admin/course/' . $course_id . '/modules')->with('error', 'Invalid course');
            }

            return redirect('/admin/course/' . $course_id . '/modules')->with('success', 'Module added successfully');
        } catch (\Exception $e) {
            return redirect('/admin/course/' . $course_id . '/modules')->with('error', $e->getMessage());
        }
    }
}
