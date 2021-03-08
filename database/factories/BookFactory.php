<?php
namespace Database\Factories;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $users = User::all();
        return [
            'title' => $this->faker->title,
            'cover_image_url' => 'cover.jpg',
            'description' => $this->faker->text($maxNbChars = 200),
            'is_approved' => true,
            'user_id' => $users->random()->id,
            'price' => $this->faker->numberBetween(1, 100),
            'discount' => $this->faker->numberBetween(0, 100)
        ];
    }
}
