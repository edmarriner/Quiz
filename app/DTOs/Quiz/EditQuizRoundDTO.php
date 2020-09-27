<?php


namespace App\DTOs\Quiz;


class EditQuizRoundDTO
{
    public ?string $name = null;

    public function __construct(?string $name)
    {
        $this->name = $name;
    }

    public static function fromArray(array $record): self {
        return new self(
          $record['name'],
        );
    }

    public function toArray(): array {
        return [
            'name' => $this->name,
        ];
    }
}
