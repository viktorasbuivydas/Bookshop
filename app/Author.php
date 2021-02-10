<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Author;

class Author extends Model
{
    protected $fillable = [
        'author'
    ];
    public $timestamps = false;
}
