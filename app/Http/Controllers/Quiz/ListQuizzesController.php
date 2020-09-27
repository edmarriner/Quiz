<?php

namespace App\Http\Controllers\Quiz;

use App\Http\Controllers\Controller;
use App\Http\Requests\ListQuizzesRequest;
use App\Models\Quiz;
use Spatie\QueryBuilder\QueryBuilder;

class ListQuizzesController extends Controller
{
    public function __invoke(ListQuizzesRequest $request)
    {
        return QueryBuilder::for(Quiz::class)
            ->allowedFilters(['name'])
            ->get();
    }
}
