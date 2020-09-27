<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\ViewQuizRequest;
use App\Models\Quiz;

class ViewQuizController extends Controller
{
    public function __invoke(int $id, ViewQuizRequest $request)
    {
        return Quiz::findOrFail($id);
    }
}
