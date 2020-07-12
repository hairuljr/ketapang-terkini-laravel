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
        $jml_mitra = User::where('roles', 'MITRA')->count();
        $jml_info = Info::withoutTrashed()->count();
        return view('pages.admin.dashboard', [
            'jml_berita' => $berita,
            'jml_eventLoker' => $jml_eventLoker,
            'jml_mitra' => $jml_mitra,
            'jml_info' => $jml_info
        ]);
    }
}
