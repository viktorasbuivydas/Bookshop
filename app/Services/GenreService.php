<?php

namespace App\Services;

use App\Genre;

class GenreService{
   public function getGenres($request_genres, $genres){
       $book_genres = $request_genres;
        foreach($genres as $genre){
            if(!Genre::where('genre', $genre)->exists()){
                $new_genre = Genre::create(['genre' => $genre]);
                if(!in_array($genre, $book_genres)){
                    array_push($book_genres, $new_genre->id);
                }
            }
        }
        return $book_genres;
   }
}