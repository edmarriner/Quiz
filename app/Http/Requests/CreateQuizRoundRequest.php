<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateQuizRoundRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'string'
        ];
    }

    public function authorize()
    {
        return true;
    }
}
