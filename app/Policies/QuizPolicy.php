<?php

namespace App\Policies;

use App\Models\Quiz;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuizPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }


    public function view(User $user, Quiz $quiz)
    {

    }

    public function update(User $user, Quiz $quiz)
    {
        //
    }

    public function delete(User $user, Quiz $quiz)
    {
        //
    }
}
