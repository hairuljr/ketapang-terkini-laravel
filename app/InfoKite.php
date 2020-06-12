<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoKite extends Model
{
    protected $fillable = [
        'nama_kat_info', 'gambar'
    ];

    protected $table = 'kategori_infos';
    protected $hidden = [];
}
