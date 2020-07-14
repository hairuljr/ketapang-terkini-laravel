<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventLoker extends Model
{
    protected $table = 'eventlokers';
    protected $fillable = [
        'judul', 'jenis', 'gambar', 'slug', 'maps', 'deskripsi'
    ];

    protected $hidden = [];
}
