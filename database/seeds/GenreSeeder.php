<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Action',
            'Adventure',
            'Classics',
            'Comic Book',
            'Graphic Novel',
            'Detective',
            'Mystery',
            'Fantasy',
            'Historical Fiction',
            'Horro',
            'Literary Fiction',
            'Romance',
            'Science Fiction',
            'Short Stories',
            'Suspense and Thrillers',
            'Biographies',
            'Cookbooks',
            'Essays',
            'History',
            'Memoir',
            'Poetry',
            'Self-Help',
            'True Crime',
        ];
        foreach($genres as $genre){
            Db::table('genres')->insert(['genre' => $genre]);
        }
    }
}
