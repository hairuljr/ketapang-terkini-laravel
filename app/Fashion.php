<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\InfoKite;

class Fashion extends Model
{
    use SoftDeletes;
    protected $table = 'infos';

    protected $fillable = [
        'judul', 'slug', 'id_kat_info', 'rating', 'jml_rating', 'keterangan', 'gambar'
    ];

    protected $hidden = [];

    public function kategori_fashion()
    {
        return $this->belongsTo(InfoKite::class, 'id_kat_info', 'id');
    }
}
