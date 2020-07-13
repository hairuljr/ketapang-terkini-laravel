<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SuratPembaca;
use App\TanggapanSurat;

class SuratTanggapanController extends Controller
{
  public function index(Request $request)
  {
    $surat_pembaca = SuratPembaca::where('status', 0)->latest()->paginate(3);
    $tanggapan_surat = TanggapanSurat::latest()->paginate(3);
    $query = "SELECT `tanggapan_surats`.`institusi`, `tanggapan_surats`.`slug`, `tanggapan_surats`.`updated_at`, `surat_pembacas`.`judul_surat` FROM `tanggapan_surats` JOIN `surat_pembacas` ON `tanggapan_surats`.`surat_id` = `surat_pembacas`.`surat_id` ORDER BY `tanggapan_surats`.`updated_at` DESC LIMIT 4";
    $tanggapan = DB::select(DB::raw($query));
    return view('pages.surat-tanggapan.surat_pembaca', [
      'surat_pembaca' => $surat_pembaca,
      'tanggapan_surat' => $tanggapan_surat,
      'tanggapan' => $tanggapan
    ]);
  }

  public function surat_tanggapan_detail(Request $request, $slug)
  {

    $surat_lainnya = DB::table('surat_pembacas')->where([
      ['status', '=', 0]
    ])->get();
    $items = DB::table('surat_pembacas')->where([
      ['slug', '=', $slug]
    ])->first();
    return view('pages.surat-tanggapan.surat_pembaca_detail', [
      'items' => $items,
      'surat_lainnya' => $surat_lainnya
    ]);
  }

  public function tanggapan_detail(Request $request, $slug)
  {
    $surat_pembaca = SuratPembaca::where('slug', $slug)->get();
    $tanggapan = TanggapanSurat::where('slug', $slug)->get();
    return view('pages.surat-tanggapan.tanggapan_surat', [
      'surat_pembaca' => $surat_pembaca,
      'tanggapan' => $tanggapan
    ]);
  }
}
