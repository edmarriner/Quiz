<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewQuizRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['string', 'required'],
            'description' => ['string', 'required']
        ];
    }

    public function authorize()
    {
        return true;
    }
}
