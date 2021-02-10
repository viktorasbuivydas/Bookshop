<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Book extends Model
{
    protected $fillable = [
        'title', 'description', 'cover_image_url'
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
