<?php

namespace App\Services;
use App\Author;

class AuthorService{
    public function getAuthors($request_authors, $authors){
        $book_authors = $request_authors;
         foreach($authors as $author){
             if(!Author::where('author', $author)->exists()){
                 $new_author = Author::create(['author' => $author]);
                 if(!in_array($author, $book_authors)){
                     array_push($book_authors, $new_author->id);
                 }
             }
         }
         return $book_authors;
    }
}