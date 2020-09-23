<?php


namespace Database\Factories;

use App\Enums\QuizStatusEnum;
use App\Models\Quiz;
use App\Models\QuizStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class QuizFactory extends Factory
{
    protected $model = Quiz::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'quiz_status_id' => QuizStatus::where('code', QuizStatusEnum::DRAFT())->firstOrFail()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
