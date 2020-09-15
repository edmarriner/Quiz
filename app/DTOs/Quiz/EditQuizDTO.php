<?php


namespace App\DTOs\Quiz;

class EditQuizDTO
{
    public ?string $name = null;
    public ?string $description = null;

    public function __construct(?string $name, ?string $description)
    {
        $this->name = $name;
        $this->description = $description;
    }
}
