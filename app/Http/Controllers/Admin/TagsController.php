<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagsRequest;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Tag::all();

        return \view('pages.admin.berita.tagar', [
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
        return \view('pages.admin.berita.crud-tagar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagsRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_tags);
        Tag::create($data);
        return redirect('admin/tagar-berita')->with('toast_success', 'Tagar Berhasil Ditambahkan!');
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
        $item = Tag::findOrFail($id);
        return \view('pages.admin.berita.crud-tagar.edit', [
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
    public function update(TagsRequest $request, $id)
    {
        $item = Tag::findOrFail($id);
        $data = $request->all();
        $data['slug'] = Str::slug($request->nama_tags);
        $item->update($data);
        return redirect('admin/tagar-berita')->with('toast_success', 'Tagar Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Tag::findOrFail($id);
        $item->delete();

        return redirect('admin/tagar-berita')->with('toast_success', 'Tagar Berhasil Dihapus!');
    }
}
