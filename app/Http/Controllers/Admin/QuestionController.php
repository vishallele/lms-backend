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

        $lesson_id = (int)$request->get('lesson_id');
        $question_type = $request->get('question_type');
        $question_data = '';

        switch ($question_type) {
            case "select_image":
            case "select_text":
                $question_data = $this->getSelectTextAndImageData($request);
                break;
            case "fill_blanks":
                $question_data = $this->getFillinBlanksData($request);
                break;
            case "pair_matching":
                $question_data = $this->getPairMatchingData($request);
                break;
        }


        try {
            $question = Question::create([
                "question_data" => $question_data,
                "lesson_id" => $lesson_id,
                "question_type" => $question_type
            ]);
        } catch (\Exception $e) {
            throw new Error($e);
        }
    }

    private function getSelectTextAndImageData($data)
    {

        $question = $options = [];

        $questionAudioEn = $questionAudioHi = $questionAudioMr = null;

        //question audio uploading
        if ($data->file('question_audio_en')) {
            $requestFile = $data->file('question_audio_en');
            $questionAudioEn = $requestFile->store("audio/option/en");
        }

        if ($data->file('question_audio_hi')) {
            $requestFile = $data->file('question_audio_hi');
            $questionAudioHi = $requestFile->store("audio/option/hi");
        }

        if ($data->file('question_text_mr')) {
            $requestFile = $data->file('question_text_mr');
            $questionAudioMr = $requestFile->store("audio/option/mr");
        }

        for ($i = 0; $i < \count($data->get('option_en_text_')); $i++) {

            $enAudioFile = $hiAudioFile = $mrAudioFile = $optionImage = null;

            if (isset($data->file('option_en_audio_')[$i])) {
                $requestFile = $data->file('option_en_audio_')[$i];
                $enAudioFile = $requestFile->store("audio/option/en");
            }


            if (isset($data->file('option_hi_audio_')[$i])) {
                $requestFile = $data->file('option_hi_audio_')[$i];
                $hiAudioFile = $requestFile->store("audio/option/hi");
            }

            if (isset($data->file('option_mr_audio_')[$i])) {
                $requestFile = $data->file('option_mr_audio_')[$i];
                $mrAudioFile = $requestFile->store("audio/option/mr");
            }

            if (isset($data->file('option_image_')[$i])) {
                $requestFile = $data->file('option_image_')[$i];
                $optionImage = $requestFile->store("image/option");
            }


            $options[$i] = [
                "text" => [
                    "en" => [
                        "text" => $data->get('option_en_text_')[$i],
                        "audio" => $enAudioFile
                    ],
                    "hi" => [
                        "text" => $data->get('option_hi_text_')[$i],
                        "audio" => $hiAudioFile
                    ],
                    "mr" => [
                        "text" => $data->get('option_mr_text_')[$i],
                        "audio" => $mrAudioFile
                    ]
                ],
                "image" => $optionImage,
                "correct_answer" => isset($data->get('option_correct_')[$i]) ? 1 : 0,
            ];
        }


        $question = [

            "text" => [
                "en" => [
                    "text" => $data->get('question_text_en'),
                    "audio" => $questionAudioEn
                ],
                "hi" => [
                    "text" => $data->get('question_text_hi'),
                    "audio" => $questionAudioHi
                ],
                "mr" => [
                    "text" => $data->get('question_text_mr'),
                    "audio" => $questionAudioMr
                ]
            ],
            "options" => $options
        ];

        return $question;
    }

    private function getFillinBlanksData($data)
    {

        $question = $options = [];

        $sentenceImage = null;

        //sentence image uploading
        if ($data->file('sentence_image')) {
            $requestFile = $data->file('sentence_image');
            $sentenceImage = $requestFile->store("image");
        }

        for ($i = 0; $i < \count($data->get('option_en_text_')); $i++) {

            $enAudioFile = $hiAudioFile = $mrAudioFile =  null;

            if (isset($data->file('option_en_audio_')[$i])) {
                $requestFile = $data->file('option_en_audio_')[$i];
                $enAudioFile = $requestFile->store("audio/option/en");
            }

            if (isset($data->file('option_hi_audio_')[$i])) {
                $requestFile = $data->file('option_hi_audio_')[$i];
                $hiAudioFile = $requestFile->store("audio/option/hi");
            }

            if (isset($data->file('option_mr_audio_')[$i])) {
                $requestFile = $data->file('option_mr_audio_')[$i];
                $mrAudioFile = $requestFile->store("audio/option/mr");
            }


            $options[$i] = [
                "text" => [
                    "en" => [
                        "text" => $data->get('option_en_text_')[$i],
                        "audio" => $enAudioFile
                    ],
                    "hi" => [
                        "text" => $data->get('option_hi_text_')[$i],
                        "audio" => $hiAudioFile
                    ],
                    "mr" => [
                        "text" => $data->get('option_mr_text_')[$i],
                        "audio" => $mrAudioFile
                    ]
                ]
            ];
        }


        $question = [

            "text" => [
                "en" => [
                    "text" => $data->get('sentence_en'),
                    "instruction" => $data->get('instruction_en'),
                ],
                "hi" => [
                    "text" => $data->get('sentence_hi'),
                    "instruction" => $data->get('instruction_hi'),
                ],
                "mr" => [
                    "text" => $data->get('sentence_mr'),
                    "instruction" => $data->get('instruction_mr')
                ]
            ],
            "correct_sentence" => $data->get('correct_sentence'),
            "image" => $sentenceImage,
            "options" => $options
        ];

        return $question;
    }

    private function getPairMatchingData($data)
    {

        $question = $leftPair = $rightPair = [];

        for ($i = 0; $i < \count($data->get('option_en_text_l_')); $i++) {

            $enAudioFile = $hiAudioFile = $mrAudioFile = $pairImage = null;

            if (isset($data->file('option_en_audio_l_')[$i])) {
                $requestFile = $data->file('option_en_audio_l_')[$i];
                $enAudioFile = $requestFile->store("audio/option/en");
            }

            if (isset($data->file('option_hi_audio_l_')[$i])) {
                $requestFile = $data->file('option_hi_audio_l_')[$i];
                $hiAudioFile = $requestFile->store("audio/option/hi");
            }

            if (isset($data->file('option_mr_audio_l_')[$i])) {
                $requestFile = $data->file('option_mr_audio_l_')[$i];
                $mrAudioFile = $requestFile->store("audio/option/mr");
            }

            if (isset($data->file('option_image_l_')[$i])) {
                $requestFile = $data->file('option_image_l_')[$i];
                $pairImage = $requestFile->store("image/option");
            }


            $leftPair[$i] = [
                "text" => [
                    "en" => [
                        "text" => $data->get('option_en_text_l_')[$i],
                        "audio" => $enAudioFile
                    ],
                    "hi" => [
                        "text" => $data->get('option_hi_text_l_')[$i],
                        "audio" => $hiAudioFile
                    ],
                    "mr" => [
                        "text" => $data->get('option_mr_text_l_')[$i],
                        "audio" => $mrAudioFile
                    ]
                ],
                "image" => $pairImage
            ];
        }

        for ($i = 0; $i < \count($data->get('option_en_text_r_')); $i++) {

            $enAudioFile = $hiAudioFile = $mrAudioFile = $pairImage = null;

            if (isset($data->file('option_en_audio_r_')[$i])) {
                $requestFile = $data->file('option_en_audio_r_')[$i];
                $enAudioFile = $requestFile->store("audio/option/en");
            }

            if (isset($data->file('option_hi_audio_r_')[$i])) {
                $requestFile = $data->file('option_hi_audio_r_')[$i];
                $hiAudioFile = $requestFile->store("audio/option/hi");
            }

            if (isset($data->file('option_mr_audio_l_')[$i])) {
                $requestFile = $data->file('option_mr_audio_r_')[$i];
                $mrAudioFile = $requestFile->store("audio/option/mr");
            }

            if (isset($data->file('option_image_r_')[$i])) {
                $requestFile = $data->file('option_image_r_')[$i];
                $pairImage = $requestFile->store("image/option");
            }


            $rightPair[$i] = [
                "text" => [
                    "en" => [
                        "text" => $data->get('option_en_text_r_')[$i],
                        "audio" => $enAudioFile
                    ],
                    "hi" => [
                        "text" => $data->get('option_hi_text_r_')[$i],
                        "audio" => $hiAudioFile
                    ],
                    "mr" => [
                        "text" => $data->get('option_mr_text_r_')[$i],
                        "audio" => $mrAudioFile
                    ]
                ],
                "image" => $pairImage
            ];
        }


        $question = [
            "left_pair" => $leftPair,
            "right_pair" => $rightPair
        ];

        return $question;
    }

    public function edit() {}

    public function update() {}
}
