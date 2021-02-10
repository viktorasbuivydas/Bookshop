<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Review;

class Review extends Model
{
    protected $fillable = [
        'star', 'comment'
    ];
    
}
