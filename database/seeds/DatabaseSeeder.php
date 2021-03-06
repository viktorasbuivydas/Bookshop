<?php


use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Book;
use App\Models\BookReview;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            GenreSeeder::class,
       ]);
        User::factory(100)->create();
        Author::factory(100)->create();
        Genre::factory(100)->create();
        $authors = Author::all();
        $genres = Genre::all();

        Book::factory(100)->create()->each(
            function ($book) use($genres, $authors) {
                $genres = $genres->random(rand(1, 4))->pluck('id');
                $book->genres()->attach($genres);
                $authors = $authors->random(rand(1, 4))->pluck('id');
                $book->authors()->attach($authors);
            }
        );
        BookReview::factory(100)->create();
    }
}
