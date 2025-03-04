<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;

class StoreQuestionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        //dd($this);

        $questionType = $this->input('question_type');

        $rules = [
            "question_type" => "required"
        ];

        switch ($questionType) {
            case "select_image":
            case "select_text":
                $rules = [
                    'question_text_en' => 'required',
                    'question_text_hi' => 'required',
                    'question_text_mr' => 'required',
                    'option_en_text_.*' => 'required',
                    'option_hi_text_.*' => 'required',
                    'option_mr_text_.*' => 'required',
                    //'option_correct' => 'required',
                    'option_correct_.*' => 'accepted|min:1',
                    'option_en_audio_.*' => [
                        Rule::excludeIf($this->file('option_en_audio_.*') === null),
                        File::types(['mp3', 'mp4', 'wav'])->max(8 * 1024)
                    ],
                    'option_hi_audio_.*' => [
                        Rule::excludeIf($this->file('option_hi_audio_.*') === null),
                        File::types(['mp3', 'mp4', 'wav'])->max(8 * 1024)
                    ],
                    'option_mr_audio_.*' => [
                        Rule::excludeIf($this->file('option_mr_audio_.*') === null),
                        File::types(['mp3', 'mp4', 'wav'])->max(8 * 1024)
                    ],
                    'option_en_image_.*' => [
                        Rule::excludeIf($this->file('option_en_image_.*') === null),
                        File::types(['svg', 'json', 'jpeg', 'jpg', 'gif'])->max(8 * 1024)
                    ],
                    'option_hi_image_.*' => [
                        Rule::excludeIf($this->file('option_en_image_.*') === null),
                        File::types(['svg', 'json', 'jpeg', 'jpg', 'gif'])->max(8 * 1024)
                    ],
                    'option_mr_image_.*' => [
                        Rule::excludeIf($this->file('option_en_image_.*') === null),
                        File::types(['svg', 'json', 'jpeg', 'jpg', 'gif'])->max(8 * 1024)
                    ],
                ];
                break;
        }

        return $rules;
    }
}
