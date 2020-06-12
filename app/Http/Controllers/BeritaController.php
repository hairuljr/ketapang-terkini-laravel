<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\News;
use App\Category;
use App\Tag;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $news = News::latest()->paginate(3);
        $recentnews = News::orderBy('updated_at', 'asc')->get()->take(3);

        $query = "SELECT `category_news`.`category_id`, `categories`.`nama_kategori`, COUNT(`category_news`.`category_id`) AS `jml_kategori`, `categories`.`slug` FROM `category_news` JOIN `categories` ON `category_news`.`category_id` = `categories`.`id` GROUP BY `category_news`.`category_id`";
        $jml_category = DB::select(DB::raw($query));

        $tag = Tag::all();
        return view('pages.berita.berita', [
            'news' => $news,
            'recentnews' => $recentnews,
            'jml_category' => $jml_category,
            'tag' => $tag
        ]);
    }

    public function beritanya(Request $request, $slug)
    {
        $recentnews = News::orderBy('updated_at', 'asc')->get()->take(3);
        $query = "SELECT `category_news`.`category_id`, `categories`.`nama_kategori`, COUNT(`category_news`.`category_id`) AS `jml_kategori`, `categories`.`slug` FROM `category_news` JOIN `categories` ON `category_news`.`category_id` = `categories`.`id` GROUP BY `category_news`.`category_id`";
        $jml_category = DB::select(DB::raw($query));

        $items = DB::table('news')->where([
            ['slug', '=', $slug],
            ['deleted_at', '=', null]
        ])->first();

        $query2 = "SELECT `news_tag`.`news_id`, `news_tag`.`tag_id`, `tags`.`nama_tags`, `tags`.`slug` FROM `news_tag` JOIN `tags` ON `news_tag`.`tag_id` = `tags`.`id` WHERE `news_tag`.`news_id` = $items->id";
        $tagarnya = DB::select(DB::raw($query2));
        return view('pages.berita.detail-berita', [
            'items' => $items,
            'jml_category' => $jml_category,
            'recentnews' => $recentnews,
            'tagarnya' => $tagarnya
        ]);
    }

    public function kategori(Request $request, $slug)
    {
        $query = "SELECT `category_news`.`news_id`, `category_news`.`category_id`, `news`.*, `categories`.`slug` AS `slug_kat` FROM `category_news` JOIN `news` ON `news`.`id` = `category_news`.`news_id` JOIN `categories` ON `category_news`.`category_id` = `categories`.`id` WHERE `categories`.`slug` = '$slug' GROUP BY `category_news`.`news_id`";
        $category = DB::select(DB::raw($query));
        $recentnews = News::orderBy('updated_at', 'asc')->get()->take(3);
        $query = "SELECT `category_news`.`category_id`, `categories`.`nama_kategori`, COUNT(`category_news`.`category_id`) AS `jml_kategori`, `categories`.`slug` FROM `category_news` JOIN `categories` ON `category_news`.`category_id` = `categories`.`id` GROUP BY `category_news`.`category_id`";
        $jml_category = DB::select(DB::raw($query));
        return view('pages.berita.kategori', [
            'category' => $category,
            'jml_category' => $jml_category,
            'recentnews' => $recentnews,
        ]);
    }

    public function tagar(Request $request, $slug)
    {
        $query = "SELECT `news_tag`.`news_id`, `news_tag`.`tag_id`, `news`.*, `tags`.`slug` AS `slug_tag` FROM `news_tag` JOIN `news` ON `news`.`id` = `news_tag`.`news_id` JOIN `tags` ON `news_tag`.`tag_id` = `tags`.`id` WHERE `tags`.`slug` = '$slug' GROUP BY `news_tag`.`news_id`";
        $tagar = DB::select(DB::raw($query));
        $recentnews = News::orderBy('updated_at', 'asc')->get()->take(3);
        $query = "SELECT `category_news`.`category_id`, `categories`.`nama_kategori`, COUNT(`category_news`.`category_id`) AS `jml_kategori`, `categories`.`slug` FROM `category_news` JOIN `categories` ON `category_news`.`category_id` = `categories`.`id` GROUP BY `category_news`.`category_id`";
        $jml_category = DB::select(DB::raw($query));
        return view('pages.berita.tagar', [
            'tagar' => $tagar,
            'jml_category' => $jml_category,
            'recentnews' => $recentnews,
        ]);
    }

    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;
        // mengambil data dari table pegawai sesuai pencarian data
        $pencarian = DB::table('news')->where('judul', 'like', "%" . $cari . "%")->orWhere('penggalan', 'like', "%" . $cari . "%")->get();

        $recentnews = News::orderBy('updated_at', 'asc')->get()->take(3);
        $query = "SELECT `category_news`.`category_id`, `categories`.`nama_kategori`, COUNT(`category_news`.`category_id`) AS `jml_kategori`, `categories`.`slug` FROM `category_news` JOIN `categories` ON `category_news`.`category_id` = `categories`.`id` GROUP BY `category_news`.`category_id`";
        $jml_category = DB::select(DB::raw($query));
        // mengirim data pegawai ke view index
        return view('pages.berita.cari', [
            'cari' => $cari,
            'pencarian' => $pencarian,
            'jml_category' => $jml_category,
            'recentnews' => $recentnews
        ]);
    }
}
