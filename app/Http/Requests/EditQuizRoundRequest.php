<?php

namespace App\Http\Requests;

use App\Models\Quiz;
use Illuminate\Foundation\Http\FormRequest;

class EditQuizRoundRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['string'],
        ];
    }

    public function authorize()
    {
        $quiz = Quiz::find($this->route('quizId'));
        return $quiz && $this->user()->can('update', $quiz);
    }
}
