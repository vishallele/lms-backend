<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lesson;
use App\Models\Module;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index(string $course_id, string $module_id)
    {
        if (!$course_id || !$module_id) {
            return redirect('/admin/courses')->with('error', 'Invalid course or module.');
        }

        $course = Course::find($course_id);

        if (!$course) {
            return redirect('/admin/courses')->with('error', 'Invalid course.');
        }

        $module = Module::find($module_id);

        if (!$module) {
            return redirect('/admin/courses')->with('error', 'Invalid module.');
        }

        $lessons = Lesson::where("module_id", "=", $module_id)->paginate(10);

        return view(
            'admin.course.lesson.index',
            [
                "course_id" => $course_id,
                "module_id" => $module_id,
                "lessons" => $lessons
            ]
        );
    }

    public function create(string $course_id, string $module_id)
    {

        if (!$course_id || !$module_id) {
            return redirect('/admin/courses')->with('error', 'Invalid course or module.');
        }

        $course = Course::find($course_id);

        if (!$course) {
            return redirect('/admin/courses')->with('error', 'Invalid course.');
        }

        $module = Module::find($module_id);

        if (!$module) {
            return redirect('/admin/courses')->with('error', 'Invalid module.');
        }

        return view(
            'admin.course.lesson.create',
            [
                "course_id" => $course_id,
                "module_id" => $module_id,
            ]
        );
    }

    public function store(Request $request, string $course_id, string $module_id)
    {
        if (!$course_id || !$module_id) {
            return redirect('/admin/courses')->with('error', 'Invalid course or module.');
        }

        $request->validate([
            'title' => 'required',
            'title_hi' => 'required',
            'title_mr' => 'required'
        ], [
            'title' => 'Title in english is required.',
            'title_hi' => 'Title in hindi is required.',
            'title_mr' => 'Title in marathi is required.'
        ]);

        $course = Course::find($course_id);

        if (!$course) {
            return redirect('/admin/courses')->with('error', 'Invalid course.');
        }

        $module = Module::find($module_id);

        if (!$module) {
            return redirect('/admin/courses')->with('error', 'Invalid module.');
        }

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

            $lesson = Lesson::create([
                'title' => $titleTranslations,
                'module_id' => $module_id,
                'description' => $descriptionTranslation
            ]);

            if (!$lesson) {
                return redirect(
                    '/admin/course/' . $course_id . '/module/' . $module_id . '/lessons'
                )->with('error', 'Failed to add lesson');
            }

            return redirect(
                '/admin/course/' . $course_id . '/module/' . $module_id . '/lessons'
            )->with('success', 'Lesson added successfully');
        } catch (\Exception $e) {
            return redirect(
                '/admin/course/' . $course_id . '/module/' . $module_id . '/lessons'
            )->with('error', $e->getMessage());
        }
    }

    public function edit(Request $request, string $course_id, string $module_id, string $lesson_id)
    {

        if (!$course_id || !$module_id) {
            return redirect('/admin/courses')->with('error', 'Invalid course or module.');
        }

        $course = Course::find($course_id);

        if (!$course) {
            return redirect('/admin/courses')->with('error', 'Invalid course.');
        }

        $module = Module::find($module_id);

        if (!$module) {
            return redirect('/admin/courses')->with('error', 'Invalid module.');
        }

        $lesson = Lesson::findorFail($lesson_id);

        return view(
            'admin.course.lesson.create',
            [
                'course_id' => $course_id,
                'module_id' => $module_id,
                'lesson' => $lesson
            ]
        );
    }

    public function update(
        Request $request,
        string $course_id,
        string $module_id,
        string $lesson_id
    ) {

        if (!$course_id || !$module_id) {
            return redirect('/admin/courses')->with('error', 'Invalid course or module.');
        }

        $request->validate([
            'title' => 'required',
            'title_hi' => 'required',
            'title_mr' => 'required'
        ], [
            'title' => 'Title in english is required.',
            'title_hi' => 'Title in hindi is required.',
            'title_mr' => 'Title in marathi is required.'
        ]);

        $course = Course::find($course_id);

        if (!$course) {
            return redirect('/admin/courses')->with('error', 'Invalid course.');
        }

        $module = Module::find($module_id);

        if (!$module) {
            return redirect('/admin/courses')->with('error', 'Invalid module.');
        }

        $lesson = Lesson::findorFail($lesson_id);

        $lesson->title = [
            'en' => $request->get('title'),
            'hi' => $request->get('title_hi'),
            'mr' => $request->get('title_mr'),
        ];

        $lesson->description = [
            'en' => $request->get('description'),
            'hi' => $request->get('description_hi'),
            'mr' => $request->get('description_mr'),
        ];

        $lessonResponse = $lesson->save();

        if ($lessonResponse) {
            return redirect(
                '/admin/course/' . $course_id . '/module/' . $module_id . '/lessons'
            )->with('success', 'Lesson updated successfully');
        } else {
            return redirect(
                '/admin/course/' . $course_id . '/module/' . $module_id . '/lessons'
            )->with('error', 'Failed to update lesson');
        }
    }
}
