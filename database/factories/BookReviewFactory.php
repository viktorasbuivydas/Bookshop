<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\BookReview;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BookReview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $books = Book::where('is_approved', true)->get();
        $users = User::all();
        return [
            'rating' => $this->faker->numberBetween(1, 5),
            'review' => $this->faker->realText(100),
            'book_id' => $books->random()->id,
            'user_id' => $users->random()->id,
        ];
    }
}
