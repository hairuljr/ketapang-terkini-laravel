<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fashion;
use App\Kuliner;
use App\Wisata;
use App\Jasa;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $fashion = Fashion::where('id_kat_info', 1)->count();
        $kuliner = Kuliner::where('id_kat_info', 2)->count();
        $wisata = Wisata::where('id_kat_info', 3)->count();
        $jasa = Jasa::where('id_kat_info', 4)->count();
        return view('pages.merchant.dashboard', [
            'jml_fashion' => $fashion,
            'jml_kuliner' => $kuliner,
            'jml_wisata' => $wisata,
            'jml_jasa' => $jasa
        ]);
    }
}
