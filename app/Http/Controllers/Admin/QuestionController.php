<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Module;
use App\Models\Lesson;
use App\Models\Question;
use PSpell\Config;

class QuestionController extends Controller
{
    public function index(
        string $course_id,
        string $module_id,
        string $lesson_id
    ) {

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

        $lesson = Lesson::find($lesson_id);

        if (!$lesson) {
            return redirect('/admin/courses')->with('error', 'Invalid lesson.');
        }

        $questions = Question::where('lesson_id', '=', $lesson_id)->paginate(10);

        return view(
            'admin.course.question.index',
            [
                "course_id" => $course_id,
                "module_id" => $module_id,
                "lesson_id" => $lesson_id,
                "questions" => $questions,
            ]
        );
    }

    public function create(
        string $course_id,
        string $module_id,
        string $lesson_id
    ) {

        $question_types = Config('constant.question_types');


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

        $lesson = Lesson::find($lesson_id);

        if (!$lesson) {
            return redirect('/admin/courses')->with('error', 'Invalid lesson.');
        }

        return view(
            'admin.course.question.create',
            [
                "course_id" => $course_id,
                "module_id" => $module_id,
                "lesson_id" => $lesson_id,
                "question_types" => $question_types
            ]
        );
    }

    public function store() {}

    public function edit() {}

    public function update() {}
}
