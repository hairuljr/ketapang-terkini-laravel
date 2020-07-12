<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Fashion;
use App\Kuliner;
use App\Wisata;
use App\Jasa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }
    public function index(Request $request)
    {
        $id = FacadesAuth::user()->id;
        $fashion = DB::table('infos')->where([
            ['id_users', '=', $id],
            ['id_kat_info', '=', '1'],
            ['deleted_at', '=', null],
        ])->count();
        $kuliner = DB::table('infos')->where([
            ['id_users', '=', $id],
            ['id_kat_info', '=', '2'],
            ['deleted_at', '=', null],
        ])->count();
        $wisata = DB::table('infos')->where([
            ['id_users', '=', $id],
            ['id_kat_info', '=', '3'],
            ['deleted_at', '=', null],
        ])->count();
        $jasa = DB::table('infos')->where([
            ['id_users', '=', $id],
            ['id_kat_info', '=', '4'],
            ['deleted_at', '=', null],
        ])->count();
        return view('pages.mitra.dashboard', [
            'jml_fashion' => $fashion,
            'jml_kuliner' => $kuliner,
            'jml_wisata' => $wisata,
            'jml_jasa' => $jasa
        ]);
    }
}
