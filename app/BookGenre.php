<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Genre;
use App\Book;

class BookGenre extends Model
{
    protected $fillable = ['genre_id', 'book_id'];
    public $timestamps = false;
    public function genres(){
        return $this->belongsTo(Genre::class);
    }
    public function books(){
        return $this->belongsTo(Book::class);
    }
}
