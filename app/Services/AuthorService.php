<?php

namespace App\Services;
use App\Author;

class AuthorService{
    public function getAuthors($request_authors, $authors){
        if($request_authors !== null && $authors!==null){
            foreach($authors as $author){
                if(!Author::where('author', $author)->exists()){
                    $new_author = Author::create(['author' => $author]);
                    if(!in_array($author, $request_authors)){
                        array_push($request_authors, $new_author->id);
                    }
                }
            }
        }
        return $request_authors;
    }

}