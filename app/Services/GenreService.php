<?php

namespace App\Services;

use App\Genre;

class GenreService{
   public function getGenres($request_genres, $genres){
        foreach($genres as $genre){
            if(!Genre::where('genre', $genre)->exists()){
                $new_genre = Genre::create(['genre' => $genre]);
                if(!in_array($genre, $request_genres)){
                    array_push($request_genres, $new_genre->id);
                }
            }
        }
        return $request_genres;
   }
}