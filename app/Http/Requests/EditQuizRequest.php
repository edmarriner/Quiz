<?php

namespace App\Http\Requests;

use App\Models\Quiz;
use Illuminate\Foundation\Http\FormRequest;

class EditQuizRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['string'],
            'description' => ['description']
        ];
    }

    public function authorize()
    {
        $quiz = Quiz::find($this->route('id'));
        return $quiz && $this->user()->can('update', $quiz);
    }
}
