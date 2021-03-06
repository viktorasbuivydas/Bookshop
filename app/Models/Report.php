<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = [
        'admin_message', 'book_id', 'user_id'
    ];

    protected $perPage = 25;

    public function book(){
        return $this->hasOne(Book::class);
    }
    public function user(){
        return $this->hasOne(User::class);
    }
    public function scopeUserReport($query, $book_id){
        return $query->where('book_id', $book_id)->where('user_id', auth()->id());
    }
}
