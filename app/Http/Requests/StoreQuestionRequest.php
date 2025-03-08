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
                    'option_correct_.*' => 'required|min:1',
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
                    'option_image_.*' => [
                        Rule::excludeIf($this->file('option_image_.*') === null),
                        File::types(['svg', 'json', 'jpeg', 'jpg', 'gif'])->max(8 * 1024)
                    ],
                ];
                break;
            case "fill_blanks":
                $rules = [
                    'instruction_en' => 'required',
                    'instruction_hi' => 'required',
                    'instruction_mr' => 'required',
                    'sentence_en' => 'required',
                    'sentence_hi' => 'required',
                    'sentence_mr' => 'required',
                    'option_en_text_.*' => 'required',
                    'option_hi_text_.*' => 'required',
                    'option_mr_text_.*' => 'required',
                    'correct_sentence' => 'required',
                    'sentence_image' => [
                        Rule::excludeIf($this->file('sentence_image') === null),
                        File::types(['svg', 'json', 'jpeg', 'jpg', 'gif'])->max(8 * 1024)
                    ],
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
                ];
                break;
            case "pair_matching":
                $rules = [
                    'option_en_text_l_.*' => 'required',
                    'option_hi_text_l_.*' => 'required',
                    'option_mr_text_l_.*' => 'required',
                    'option_en_text_r_.*' => 'required',
                    'option_hi_text_r_.*' => 'required',
                    'option_mr_text_r_.*' => 'required',
                    'option_image_l_.*' => [
                        Rule::excludeIf($this->file('option_image_l_.*') === null),
                        File::types(['svg', 'json', 'jpeg', 'jpg', 'gif'])->max(8 * 1024)
                    ],
                    'option_image_r_.*' => [
                        Rule::excludeIf($this->file('option_image_r_.*') === null),
                        File::types(['svg', 'json', 'jpeg', 'jpg', 'gif'])->max(8 * 1024)
                    ],
                    'option_en_audio_l_.*' => [
                        Rule::excludeIf($this->file('option_en_audio_l_.*') === null),
                        File::types(['mp3', 'mp4', 'wav'])->max(8 * 1024)
                    ],
                    'option_hi_audio_l_.*' => [
                        Rule::excludeIf($this->file('option_hi_audio_l_.*') === null),
                        File::types(['mp3', 'mp4', 'wav'])->max(8 * 1024)
                    ],
                    'option_mr_audio_l_.*' => [
                        Rule::excludeIf($this->file('option_mr_audio_l_.*') === null),
                        File::types(['mp3', 'mp4', 'wav'])->max(8 * 1024)
                    ],
                    'option_en_audio_r_.*' => [
                        Rule::excludeIf($this->file('option_en_audio_r_.*') === null),
                        File::types(['mp3', 'mp4', 'wav'])->max(8 * 1024)
                    ],
                    'option_hi_audio_r_.*' => [
                        Rule::excludeIf($this->file('option_hi_audio_r_.*') === null),
                        File::types(['mp3', 'mp4', 'wav'])->max(8 * 1024)
                    ],
                    'option_mr_audio_r_.*' => [
                        Rule::excludeIf($this->file('option_mr_audio_r_.*') === null),
                        File::types(['mp3', 'mp4', 'wav'])->max(8 * 1024)
                    ],
                ];
                break;
        }

        return $rules;
    }
}
