<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Category;
use App\Tag;

class News extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'judul', 'slug', 'penggalan', 'penulis', 'tanggal', 'gambar', 'konten'
    ];

    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }
}
