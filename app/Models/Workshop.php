<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Workshop extends Model
{

    protected $fillable = [
        'name',
        'image',
        'workers_count',
    ];
    //
}