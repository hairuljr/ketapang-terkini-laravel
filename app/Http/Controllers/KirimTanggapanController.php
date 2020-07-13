<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\SuratPembaca;
use Illuminate\Support\Facades\DB;
use App\TanggapanSurat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KirimTanggapanController extends Controller
{

  public function kirim(Request $request)
  {
    $request->validate([
      'nama_lengkap' => 'required',
      'institusi' => 'required',
      'no_telp_institusi' => 'required',
      'alamat_lengkap' => 'required',
      'kota' => 'required',
      'no_hp' => 'required|max:15',
      'isi_tanggapan' => 'required'
    ]);

    $tanggapan = new TanggapanSurat();
    $tanggapan->surat_id = $request->surat_id;
    $tanggapan->slug = Str::slug($request->judul_surat);
    $tanggapan->nama_lengkap = $request->nama_lengkap;
    $tanggapan->institusi = $request->institusi;
    $tanggapan->no_telp_institusi = $request->no_telp_institusi;
    $tanggapan->alamat_lengkap = $request->alamat_lengkap;
    $tanggapan->kota = $request->kota;
    $tanggapan->no_hp = $request->no_hp;
    $tanggapan->isi_tanggapan = $request->isi_tanggapan;

    $tanggapan->save();

    DB::table('surat_pembacas')
      ->where('surat_id', $request->surat_id)
      ->delete(['status' => 1]);

    return redirect('surat-tanggapan')->with('success', 'Berhasil Mengirim Tanggapan!');
  }
}
