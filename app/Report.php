<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Report;

class Report extends Model
{
    protected $fillable = [
        'report_message', 'admin_message'
    ];
}
