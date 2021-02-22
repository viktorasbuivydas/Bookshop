<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class BookReview extends Model
{
    protected $fillable = [
        'rating', 'review', 'book_id', 'user_id'
    ];
    public function book(){
        return $this->belongsTo(Book::class);
    }
}