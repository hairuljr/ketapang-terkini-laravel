<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsRequest;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\News;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = News::latest()->get();
        return \view('pages.admin.berita.berita', \compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return \view('pages.admin.berita.crud-berita.create', \compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        $data = $request->validate([
            'gambar' => 'required|image'
        ]);
        if ($request->hasFile('gambar')) {
            $filename = $request->gambar->getClientOriginalName();
            $gambarnya = $request->gambar->storeAs('assets/berita', $filename, 'public');
        } else {
            $filename = 'default.jpg';
        }

        $berita = new News();

        $berita->judul = $request->judul;
        $berita->penulis = $request->penulis;
        $berita->penggalan = $request->penggalan;
        $berita->tanggal = $request->tanggal;
        $berita->slug = Str::slug($request->judul);
        $berita->gambar = $gambarnya;
        $berita->konten = $request->konten;

        $berita->save();

        $berita->categories()->sync($request->category_id);
        $berita->tags()->attach($request->tag_id);

        return redirect('admin/kelola-berita')->with('toast_success', 'Berita Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $tags = Tag::all();
        $item = News::findOrFail($id);
        // \dd($item->tags);
        return \view('pages.admin.berita.crud-berita.edit', \compact('categories', 'tags', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        $item = News::findOrFail($id);
        $pic = $item->gambar;
        if ($request->hasFile('gambar')) {
            $filename = $request->gambar->getClientOriginalName();
            $gambarnya = $request->gambar->storeAs('assets/berita', $filename, 'public');
        } else {
            $gambarnya = $pic;
        }

        News::where('id', $id)->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penggalan' => $request->penggalan,
            'tanggal' => $request->tanggal,
            'slug' => Str::slug($request->judul),
            'gambar' => $gambarnya,
            'konten' => $request->konten,
        ]);
        if ($request->category_id) {
            $news = new News();
            DB::table('category_news')->where('news_id', $id)->delete();
            $news->categories()->attach($request->category_id, ['news_id' => $id]);
        }
        if ($request->tag_id) {
            $news = new News();
            DB::table('news_tag')->where('news_id', $id)->delete();
            $news->tags()->attach($request->tag_id, ['news_id' => $id]);
        }

        return redirect('admin/kelola-berita')->with('toast_success', 'Berita Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item =  News::findOrFail($id);
        $item->delete();

        DB::table('category_news')->where('news_id', $id)->delete();
        DB::table('news_tag')->where('news_id', $id)->delete();

        return redirect('admin/kelola-berita')->with('toast_success', 'Berita Berhasil Dihapus!');
    }
}
