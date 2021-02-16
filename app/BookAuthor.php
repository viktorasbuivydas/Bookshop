<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Author;
use App\Book;

class BookAuthor extends Model
{
    protected $fillable = ['author_id', 'book_id'];
    public $timestamps = false;
    public function author(){
        return $this->belongsTo(Author::class);
    }
    public function book(){
        return $this->belongsTo(Book::class);
    }
}
