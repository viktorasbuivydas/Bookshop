<?php

namespace App\Services;
use App\Author;

class AuthorService{
    public function getAuthors($request_authors, $authors){
        $author_id = $request_authors;
        if($request_authors !== null && $authors!==null){
            foreach($authors as $author){
                if(!Author::where('author', $author)->exists()){
                    $new_author = Author::create(['author' => $author]);
                    if(!in_array($author, $author_id)){
                        array_push($author_id, $new_author->id);
                    }
                }
            }
        }
        return $author_id;
    }

}
