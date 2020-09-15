<?php

namespace App\Http\Requests;

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
        return true;
    }
}
