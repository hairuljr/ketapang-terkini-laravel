<?php

namespace App\Http\Controllers;

use App\Info;
use App\InfoKite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfoController extends Controller
{
    public function index(Request $request)
    {
        // ini utk membuat no halaman
        $items = Info::paginate(4);
        return view('pages.info.info', [
            'items' => $items
        ]);
    }
    public function fashion(Request $request)
    {
        $items = Info::where('id_kat_info', 1)->paginate(4);
        return view('pages.info.fashion', [
            'items' => $items
        ]);
    }
    public function kuliner(Request $request)
    {
        $items = Info::where('id_kat_info', 2)->get();
        return view('pages.info.kuliner', [
            'items' => $items
        ]);
    }
    public function wisata(Request $request)
    {
        $items = Info::where('id_kat_info', 3)->get();
        return view('pages.info.wisata', [
            'items' => $items
        ]);
    }
    public function jasa(Request $request)
    {
        $items = Info::where('id_kat_info', 4)->get();
        return view('pages.info.jasa', [
            'items' => $items
        ]);
    }

    public function infonya(Request $request, $slug)
    {
        $query = "SELECT `image_infos`.`nama_foto`, `infos`.* FROM `infos` JOIN `image_infos` on `image_infos`.`info_id` = `infos`.`id` WHERE `infos`.`slug` = '$slug'";
        $foto_image = DB::select(DB::raw($query));
        $gambarnya = DB::table('gambar')->get();
        $items = Info::where('slug', $slug)->firstOrFail();
        return view('pages.info.infonya', \compact('items', 'foto_image', 'gambarnya'));
    }
}
