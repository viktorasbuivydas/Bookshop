<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


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
}
