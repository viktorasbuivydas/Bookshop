<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Report extends Model
{
    protected $fillable = [
        'admin_message', 'book_id', 'user_id'
    ];
}
