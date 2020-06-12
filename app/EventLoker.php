<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EventLoker extends Model
{
    use SoftDeletes;
    protected $table = 'eventlokers';
    protected $fillable = [
        'judul', 'gambar'
    ];

    protected $hidden = [];
}
