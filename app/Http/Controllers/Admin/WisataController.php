<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\WisataRequest;
use App\Wisata;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$items = Wisata::all();
        $items = Wisata::with(['kategori_wisata'])->where('id_kat_info', 3)->get();
        return \view('pages.admin.info.wisata', [
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
        return \view('pages.admin.info.crud-wisata.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WisataRequest $request)
    {
        $data = $request->all();
        //$data['slug'] = Str::slug($request->judul);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/info-wisata',
            'public'
        );
        Wisata::create($data);
        return redirect('admin/info-wisata')->with('toast_success', 'Wisata Berhasil Ditambahkan!');
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
        $item = Wisata::findOrFail($id);
        return \view('pages.admin.info.crud-wisata.edit', [
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
    public function update(WisataRequest $request, $id)
    {
        $data = $request->all();
        //$data['slug'] = Str::slug($request->judul);
        $item = Wisata::findOrFail($id);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/info-wisata',
            'public'
        );
        $item->update($data);
        return redirect('admin/info-wisata')->with('toast_success', 'Wisata Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Wisata::findOrFail($id);
        $item->delete();

        return redirect('admin/info-wisata')->with('toast_success', 'Wisata Berhasil Dihapus!');
    }
}
