<?php

namespace App\Services;

use App\Genre;

class GenreService{
   public function getGenres($request_genres, $genres){
       $genre_id = $request_genres;
       if($request_genres !== null && $genres!==null){
           foreach($genres as $genre){
               if(!Genre::where('genre', $genre)->exists()){
                   $new_genre = Genre::create(['genre' => $genre]);
                   if(!in_array($genre, $genre_id)){
                       array_push($genre_id, $new_genre->id);
                   }
               }
           }
       }
       return $genre_id;
   }
}
