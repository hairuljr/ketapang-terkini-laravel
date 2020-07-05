<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\InfoKite;
use App\EventLoker;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        $fashion = InfoKite::where('nama_kat_info', 'Fashion')->get();
        $kuliner = InfoKite::where('nama_kat_info', 'Kuliner')->get();
        $wisata = InfoKite::where('nama_kat_info', 'Wisata')->get();
        $jasa = InfoKite::where('nama_kat_info', 'Jasa')->get();
        $banner = Banner::all();
        $info = InfoKite::all();
        $eventloker = EventLoker::latest()->get();
        return view(
            'pages.home',
            [
                'banner' => $banner,
                'info' => $info,
                'eventloker' => $eventloker,
                'fashion' => $fashion,
                'kuliner' => $kuliner,
                'wisata' => $wisata,
                'jasa' => $jasa
            ]
        );
    }
}
