<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TanggapanSurat extends Model
{
  protected $fillable = [
    'surat_id', 'nama_lengkap', 'slug', 'institusi', 'no_telp_institusi', 'alamat_lengkap', 'kota', 'no_hp', 'isi_tanggapan'
  ];

  protected $guarded = [];
}
