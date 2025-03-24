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
use Illuminate\Support\Facades\Storage;

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
            case "audio_to_text":
                $question_data = $this->getAudioToTextDdata($request);
                break;
            case "audio_to_audio":
                $question_data = $this->getAudioToAudioData($request);
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

    public function ajaxViewLoad($question_type)
    {
        switch ($question_type) {
            case "select_image":
            case "select_text":
                return view('admin.course.question.types.select_text')->render();
                break;
            case "fill_blanks":
                return view('admin.course.question.types.fill_in_blanks')->render();
                break;
            case "pair_matching":
                return view('admin.course.question.types.pair_matching')->render();
                break;
            case "audio_to_text":
                return view('admin.course.question.types.audio_to_text')->render();
                break;
            case "audio_to_audio":
                return view('admin.course.question.types.audio_to_audio')->render();
                break;
        }
    }

    public function edit(
        string $course_id,
        string $module_id,
        string $lesson_id,
        string $question_id
    ) {
        $question = Question::findOrFail($question_id);
        //dd($question);
        $question_types = Config('constant.question_types');
        return view(
            'admin.course.question.create',
            compact(
                'question',
                'question_id',
                'lesson_id',
                'course_id',
                'module_id',
                'question_types'
            )
        );
    }

    public function update(
        StoreQuestionRequest $request,
        $course_id,
        $module_id,
        $lesson_id,
        $question_id
    ) {

        $request->validated();

        $question_type = $request->get('question_type');

        switch ($question_type) {
            case "select_image":
            case "select_text":
                $question_data = $this->getSelectTextAndImageData($request, $question_id);
                break;
            case "fill_blanks":
                $question_data = $this->getFillinBlanksData($request, $question_id);
                break;
            case "pair_matching":
                $question_data = $this->getPairMatchingData($request);
                break;
            case "audio_to_text":
                $question_data = $this->getAudioToTextDdata($request);
                break;
            case "audio_to_audio":
                $question_data = $this->getAudioToAudioData($request);
                break;
        }

        try {
            /*$question = Question::create([
                "question_data" => $question_data,
                "lesson_id" => (int)$lesson_id,
                "question_type" => $question_type
            ]);*/

            $response = Question::where('_id', $question_id)->update([
                'question_data' => $question_data,
                'lesson_id' => (int)$lesson_id,
                'question_type' => $question_type
            ]);
        } catch (\Exception $e) {
            throw new Error($e);
        }
    }

    private function getSelectTextAndImageData($data, $id = null)
    {

        $question = $options = [];

        $questionAudioEn = $questionAudioHi = $questionAudioMr = null;

        if ($id) {

            $oldData = Question::findOrFail($id);

            //question audio uploading
            if ($data->file('question_audio_en')) {
                //delete old file
                $oldFileEn = $oldData->question_data['text']['en']['audio'];
                if ($oldFileEn) {
                    Storage::disk('public')->delete($oldFileEn);
                }

                $requestFile = $data->file('question_audio_en');
                $questionAudioEn = $requestFile->store("audio/option/en", 'public');
            } else {
                $questionAudioEn = $oldData->question_data['text']['en']['audio'];
            }

            if ($data->file('question_audio_hi')) {
                //delete old file
                $oldFileHi = $oldData->question_data['text']['hi']['audio'];
                if ($oldFileHi) {
                    Storage::disk('public')->delete($oldFileHi);
                }

                $requestFile = $data->file('question_audio_hi');
                $questionAudioHi = $requestFile->store("audio/option/hi", "public");
            } else {
                $questionAudioHi = $oldData->question_data['text']['hi']['audio'];
            }

            if ($data->file('question_audio_mr')) {
                //delete old file
                $oldFileMr = $oldData->question_data['text']['mr']['audio'];
                if ($oldFileMr) {
                    Storage::disk('public')->delete($oldFileMr);
                }

                $requestFile = $data->file('question_audio_mr');
                $questionAudioMr = $requestFile->store("audio/option/mr", "public");
            } else {
                $questionAudioMr = $oldData->question_data['text']['mr']['audio'];
            }

            for ($i = 0; $i < \count($data->get('option_en_text_')); $i++) {

                $enAudioFile = $hiAudioFile = $mrAudioFile = $optionImage = null;

                if (isset($data->file('option_en_audio_')[$i])) {
                    //delete old file
                    $optFileEn = $oldData->question_data['options'][$i]['text']['en']['audio'] ?? null;
                    //dd($optFileEn);
                    if ($optFileEn) {
                        Storage::disk('public')->delete($optFileEn);
                    }

                    $requestFile = $data->file('option_en_audio_')[$i];
                    $enAudioFile = $requestFile->store("audio/option/en", "public");
                } else {
                    $enAudioFile = $oldData->question_data['options'][$i]['text']['en']['audio'] ?? null;
                }


                if (isset($data->file('option_hi_audio_')[$i])) {
                    //delete old file
                    $optFileHi = $oldData->question_data['options'][$i]['text']['hi']['audio'] ?? null;
                    if ($optFileHi) {
                        Storage::disk('public')->delete($optFileHi);
                    }

                    $requestFile = $data->file('option_hi_audio_')[$i];
                    $hiAudioFile = $requestFile->store("audio/option/hi", 'public');
                } else {
                    $hiAudioFile = $oldData->question_data['options'][$i]['text']['hi']['audio'] ?? null;
                }

                if (isset($data->file('option_mr_audio_')[$i])) {
                    //delete old file
                    $optFileMr = $oldData->question_data['options'][$i]['text']['mr']['audio'] ?? null;
                    if ($optFileMr) {
                        Storage::disk('public')->delete($optFileMr);
                    }

                    $requestFile = $data->file('option_mr_audio_')[$i];
                    $mrAudioFile = $requestFile->store("audio/option/mr", 'public');
                } else {
                    $mrAudioFile = $oldData->question_data['options'][$i]['text']['mr']['audio'] ?? null;
                }

                if (isset($data->file('option_image_')[$i])) {
                    //delete old file
                    $optFileImg = $oldData->question_data['options'][$i]['image'] ?? null;
                    if ($optFileImg) {
                        Storage::disk('public')->delete($optFileImg);
                    }

                    $requestFile = $data->file('option_image_')[$i];
                    $optionImage = $requestFile->store("image/option", 'public');
                } else {
                    $optionImage = $oldData->question_data['options'][$i]['image'] ?? null;
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
        } else {

            //question audio uploading
            if ($data->file('question_audio_en')) {
                $requestFile = $data->file('question_audio_en');
                $questionAudioEn = $requestFile->store("audio/option/en");
            }

            if ($data->file('question_audio_hi')) {
                $requestFile = $data->file('question_audio_hi');
                $questionAudioHi = $requestFile->store("audio/option/hi");
            }

            if ($data->file('question_audio_mr')) {
                $requestFile = $data->file('question_audio_mr');
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

    private function getFillinBlanksData($data, $id = null)
    {

        $question = $options = [];

        $sentenceImage = null;

        if ($id) {

            $oldData = Question::findOrFail($id);

            //sentence image uploading
            if ($data->file('sentence_image')) {
                //delete old file
                $oldFileImg = $oldData->question_data['image'] ?? null;
                if ($oldFileImg) {
                    Storage::disk('public')->delete($oldFileImg);
                }

                $requestFile = $data->file('sentence_image');
                $sentenceImage = $requestFile->store("image", 'public');
            } else {
                $sentenceImage = $oldData->question_data['image'] ?? null;
            }

            for ($i = 0; $i < \count($data->get('option_en_text_')); $i++) {

                $enAudioFile = $hiAudioFile = $mrAudioFile =  null;

                if (isset($data->file('option_en_audio_')[$i])) {
                    //delete old file
                    $oldEnAudioFile = $oldData->question_data['options'][$i]['text']['en']['audio'] ?? null;
                    if ($oldEnAudioFile) {
                        Storage::disk('public')->delete($oldEnAudioFile);
                    }

                    $requestFile = $data->file('option_en_audio_')[$i];
                    $enAudioFile = $requestFile->store("audio/option/en", 'public');
                } else {
                    $enAudioFile = $oldData->question_data['options'][$i]['text']['en']['audio'] ?? null;
                }

                if (isset($data->file('option_hi_audio_')[$i])) {
                    //delete old file
                    $oldHiAudioFile = $oldData->question_data['options'][$i]['text']['hi']['audio'] ?? null;
                    if ($oldHiAudioFile) {
                        Storage::disk('public')->delete($oldHiAudioFile);
                    }

                    $requestFile = $data->file('option_hi_audio_')[$i];
                    $hiAudioFile = $requestFile->store("audio/option/hi", 'public');
                } else {
                    $hiAudioFile = $oldData->question_data['options'][$i]['text']['hi']['audio'] ?? null;
                }

                if (isset($data->file('option_mr_audio_')[$i])) {

                    //delete old file
                    $oldMrAudioFile = $oldData->question_data['options'][$i]['text']['mr']['audio'] ?? null;
                    if ($oldMrAudioFile) {
                        Storage::disk('public')->delete($oldMrAudioFile);
                    }

                    $requestFile = $data->file('option_mr_audio_')[$i];
                    $mrAudioFile = $requestFile->store("audio/option/mr", 'public');
                } else {
                    $mrAudioFile = $oldData->question_data['options'][$i]['text']['mr']['audio'] ?? null;
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
        } else {

            //sentence image uploading
            if ($data->file('sentence_image')) {
                $requestFile = $data->file('sentence_image');
                $sentenceImage = $requestFile->store("image", 'public');
            }

            for ($i = 0; $i < \count($data->get('option_en_text_')); $i++) {

                $enAudioFile = $hiAudioFile = $mrAudioFile =  null;

                if (isset($data->file('option_en_audio_')[$i])) {
                    $requestFile = $data->file('option_en_audio_')[$i];
                    $enAudioFile = $requestFile->store("audio/option/en", 'public');
                }

                if (isset($data->file('option_hi_audio_')[$i])) {
                    $requestFile = $data->file('option_hi_audio_')[$i];
                    $hiAudioFile = $requestFile->store("audio/option/hi", 'public');
                }

                if (isset($data->file('option_mr_audio_')[$i])) {
                    $requestFile = $data->file('option_mr_audio_')[$i];
                    $mrAudioFile = $requestFile->store("audio/option/mr", 'public');
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

    private function getAudioToTextDdata($data)
    {

        $question = $options = [];

        $questionAudioEn = $questionAudioHi = $questionAudioMr = $questionImage = null;

        //question audio uploading
        if ($data->file('question_audio_en')) {
            $requestFile = $data->file('question_audio_en');
            $questionAudioEn = $requestFile->store("audio/option/en");
        }

        if ($data->file('question_audio_hi')) {
            $requestFile = $data->file('question_audio_hi');
            $questionAudioHi = $requestFile->store("audio/option/hi");
        }

        if ($data->file('question_audio_mr')) {
            $requestFile = $data->file('question_audio_mr');
            $questionAudioMr = $requestFile->store("audio/option/mr");
        }

        if ($data->file('question_image')) {
            $requestFile = $data->file('question_image');
            $questionImage = $requestFile->store("image");
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
                ],
            ];
        }


        $question = [

            "text" => [
                "en" => [
                    "text" => $data->get('instruction_text_en'),
                    "audio" => $questionAudioEn
                ],
                "hi" => [
                    "text" => $data->get('instruction_text_hi'),
                    "audio" => $questionAudioHi
                ],
                "mr" => [
                    "text" => $data->get('instruction_text_mr'),
                    "audio" => $questionAudioMr
                ]
            ],
            "correct_anwer" => $data->get('correct_sentence'),
            "image" => $questionImage,
            "options" => $options
        ];

        return $question;
    }

    private function getAudioToAudioData($data)
    {

        $question = [];

        $questionAudioEn = $questionAudioHi = $questionAudioMr = $questionImage = null;

        //question audio uploading
        if ($data->file('question_audio_en')) {
            $requestFile = $data->file('question_audio_en');
            $questionAudioEn = $requestFile->store("audio/option/en");
        }

        if ($data->file('question_audio_hi')) {
            $requestFile = $data->file('question_audio_hi');
            $questionAudioHi = $requestFile->store("audio/option/hi");
        }

        if ($data->file('question_audio_mr')) {
            $requestFile = $data->file('question_audio_mr');
            $questionAudioMr = $requestFile->store("audio/option/mr");
        }

        if ($data->file('question_image')) {
            $requestFile = $data->file('question_image');
            $questionImage = $requestFile->store("image");
        }

        $question = [

            "text" => [
                "en" => [
                    "text" => $data->get('instruction_text_en'),
                    "audio" => $questionAudioEn
                ],
                "hi" => [
                    "text" => $data->get('instruction_text_hi'),
                    "audio" => $questionAudioHi
                ],
                "mr" => [
                    "text" => $data->get('instruction_text_mr'),
                    "audio" => $questionAudioMr
                ]
            ],
            "correct_anwer" => $data->get('correct_sentence'),
            "image" => $questionImage,
        ];

        return $question;
    }
}
