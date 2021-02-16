<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
class Book extends Model
{
    protected $fillable = [
        'title', 'description', 'cover_image_url', 'price', 'discount'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function authors(){
        return $this->belongsToMany(Author::class, 'book_authors');
    }
    public function genres(){
        return $this->belongsToMany(Genre::class, 'book_genres');
    }
}
