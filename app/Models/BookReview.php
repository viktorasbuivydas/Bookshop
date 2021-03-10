<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BookReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'rating', 'review', 'book_id', 'user_id'
    ];

    protected $perPage = 25;

    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function scopeUserReview($query, $book_id){
        return $query->where('book_id', $book_id)->where('user_id', auth()->id());
    }
}
