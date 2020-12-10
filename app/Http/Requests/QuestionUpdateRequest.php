<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
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
        $question = $this->route('question');
        return [
            'question' => 'required|max:250|unique:questions,question,'.$question->id,
            'points' => 'required|numeric|min:0|max:10',
            'goodanswer' => 'required',
            'wronganswer1' => 'required',
            'wronganswer2' => 'required',
            'wronganswer3' => 'required',
        ];
    }
}
