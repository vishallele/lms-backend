<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Module;
use App\Models\Lesson;
use App\Models\Question;
use Error;
use App\Http\Requests\StoreQuestionRequest;

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

        $questions = Question::where("lesson_id", "=", (int)$lesson_id)->paginate(10);
        //$questions = Question::all();

        // dd($questions);

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

    public function store(StoreQuestionRequest $request)
    {

        $request->validated();

        $options = [];
        $lesson_id = (int)$request->get('lesson_id');
        $question_type = $request->get('question_type');

        $questionAudioEn = $questionAudioHi = $questionAudioMr = null;

        //question audio uploading
        if ($request->file('question_audio_en')) {
            $requestFile = $request->file('question_audio_en');
            $questionAudioEn = $requestFile->store("audio/option/en");
        }

        if ($request->file('question_audio_hi')) {
            $requestFile = $request->file('question_audio_hi');
            $questionAudioHi = $requestFile->store("audio/option/hi");
        }

        if ($request->file('question_text_mr')) {
            $requestFile = $request->file('question_text_mr');
            $questionAudioMr = $requestFile->store("audio/option/mr");
        }

        for ($i = 0; $i < \count($request->get('option_en_text_')); $i++) {

            $enAudioFile = $hiAudioFile = $mrAudioFile = $optionImage = null;

            if (isset($request->file('option_en_audio_')[$i])) {
                $requestFile = $request->file('option_en_audio_')[$i];
                $enAudioFile = $requestFile->store("audio/option/en");
            }


            if (isset($request->file('option_hi_audio_')[$i])) {
                $requestFile = $request->file('option_hi_audio_')[$i];
                $hiAudioFile = $requestFile->store("audio/option/hi");
            }

            if (isset($request->file('option_mr_audio_')[$i])) {
                $requestFile = $request->file('option_mr_audio_')[$i];
                $mrAudioFile = $requestFile->store("audio/option/mr");
            }

            if (isset($request->file('option_image_')[$i])) {
                $requestFile = $request->file('option_image_')[$i];
                $optionImage = $requestFile->store("image/option");
            }


            $options[$i] = [
                "text" => [
                    "en" => [
                        "text" => $request->get('option_en_text_')[$i],
                        "audio" => $enAudioFile
                    ],
                    "hi" => [
                        "text" => $request->get('option_hi_text_')[$i],
                        "audio" => $hiAudioFile
                    ],
                    "mr" => [
                        "text" => $request->get('option_mr_text_')[$i],
                        "audio" => $mrAudioFile
                    ]
                ],
                "image" => $optionImage,
                "correct_answer" => isset($request->get('option_correct_')[$i]) ? 1 : 0,
            ];
        }


        $question = [

            "text" => [
                "en" => [
                    "text" => $request->get('question_text_en'),
                    "audio" => $questionAudioEn
                ],
                "hi" => [
                    "text" => $request->get('question_text_hi'),
                    "audio" => $questionAudioHi
                ],
                "mr" => [
                    "text" => $request->get('question_text_mr'),
                    "audio" => $questionAudioMr
                ]
            ],
            "options" => $options
        ];

        try {
            $question = Question::create([
                "question_data" => $question,
                "lesson_id" => $lesson_id,
                "question_type" => $question_type
            ]);
        } catch (\Exception $e) {
            throw new Error($e);
        }
    }



    public function edit() {}

    public function update() {}
}
