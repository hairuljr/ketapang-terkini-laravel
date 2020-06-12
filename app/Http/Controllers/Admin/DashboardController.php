<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\News;
use App\EventLoker;
use App\User;

use App\Fashion;
use App\Info;
use App\Kuliner;
use App\Wisata;
use App\Jasa;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        $berita = News::withoutTrashed()->count();
        $jml_eventLoker = EventLoker::withoutTrashed()->count();
        $jml_merchant = User::where('roles', 'MERCHANT')->count();
        $jml_info = Info::withoutTrashed()->count();
        $fashion = Info::where('id_kat_info', 1)->withoutTrashed()->count();
        $kuliner = Info::where('id_kat_info', 2)->withoutTrashed()->count();
        $wisata = Info::where('id_kat_info', 3)->withoutTrashed()->count();
        $jasa = Info::where('id_kat_info', 1)->withoutTrashed()->count();
        return view('pages.admin.dashboard', [
            'jml_fashion' => $fashion,
            'jml_kuliner' => $kuliner,
            'jml_wisata' => $wisata,
            'jml_jasa' => $jasa,
            'jml_berita' => $berita,
            'jml_eventLoker' => $jml_eventLoker,
            'jml_merchant' => $jml_merchant,
            'jml_info' => $jml_info
        ]);
    }
}
