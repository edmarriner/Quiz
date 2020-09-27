<?php

namespace App\Http\Requests;

use App\Models\Quiz;
use Illuminate\Foundation\Http\FormRequest;

class ViewQuizRequest extends FormRequest
{
    public function authorize()
    {
        $quiz = Quiz::find($this->route('id'));
        return $quiz && $this->user()->can('view', $quiz);
    }
}
