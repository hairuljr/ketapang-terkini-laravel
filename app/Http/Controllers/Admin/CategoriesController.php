<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoriesRequest;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Category::all();

        return \view('pages.admin.berita.kategori', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return \view('pages.admin.berita.crud-kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);
        Category::create($data);
        return redirect('admin/kategori-berita')->with('toast_success', 'Kategori Berhasil Ditambahkan!');
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
        $item = Category::findOrFail($id);
        return \view('pages.admin.berita.crud-kategori.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $item = Category::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_kategori);
        $item->update($data);
        return redirect('admin/kategori-berita')->with('toast_success', 'Kategori Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Category::findOrFail($id);
        $item->delete();

        return redirect('admin/kategori-berita')->with('toast_success', 'Kategori Berhasil Dihapus!');
    }
}
