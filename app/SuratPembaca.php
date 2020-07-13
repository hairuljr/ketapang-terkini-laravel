<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratPembaca extends Model
{

  protected $fillable = [
    'nama_lengkap', 'slug', 'alamat_lengkap', 'kelurahan', 'kecamatan', 'no_hp', 'judul_surat', 'ditujukan', 'isi_surat'
  ];

  protected $guarded = [];

  public function tanggapan_surat()
  {
    return $this->belongsToMany(TanggapanSurat::class)->withTimestamps();
  }
}
