<?php


namespace App\DTOs\Quiz;


class CreateQuizDTO
{

    public string $name;
    public string $description;

    public function __construct(string $name, string $description) {
        $this->name = $name;
        $this->description = $description;
    }

}
