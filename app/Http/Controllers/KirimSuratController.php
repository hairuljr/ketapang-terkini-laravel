<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\SuratPembaca;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KirimSuratController extends Controller
{

  public function kirim(Request $request)
  {
    $data = $request->validate([
      'nama_lengkap' => 'required',
      'alamat_lengkap' => 'required',
      'kelurahan' => 'required',
      'kecamatan' => 'required',
      'no_hp' => 'required|max:15',
      'judul_surat' => 'required',
      'ditujukan' => 'required',
      'isi_surat' => 'required'
    ]);

    $surat = new SuratPembaca();

    $surat->slug = Str::slug($request->judul_surat);
    $surat->nama_lengkap = $request->nama_lengkap;
    $surat->alamat_lengkap = $request->alamat_lengkap;
    $surat->kelurahan = $request->kelurahan;
    $surat->kecamatan = $request->kecamatan;
    $surat->no_hp = $request->no_hp;
    $surat->judul_surat = $request->judul_surat;
    $surat->ditujukan = $request->ditujukan;
    $surat->isi_surat = $request->isi_surat;

    $surat->save();

    return redirect('surat-tanggapan')->with('success', 'Surat Berhasil Dikirim!');
  }
}
