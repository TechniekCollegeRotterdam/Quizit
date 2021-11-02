<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'question' => 'required|unique:questions|max:250',
            'points' => 'required|numeric|min:0|max:10',
            'answer1' => 'required|string|min:5|max:250',
            'answer2' => 'required|string|min:5|max:250',
            'answer3' => 'required|string|min:5|max:250',
            'answer4' => 'required|string|min:5|max:250',
            'correct' => 'required',
        ];
    }
}

