<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KulinerRequest;
use App\Kuliner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KulinerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$items = Kuliner::all();
        $items = Kuliner::with(['kategori_kuliner'])->where('id_kat_info', 2)->get();
        return \view('pages.merchant.info.kuliner', [
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
        return \view('pages.merchant.info.crud-kuliner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KulinerRequest $request)
    {
        $data = $request->all();
        //$data['slug'] = Str::slug($request->judul);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/info-kuliner',
            'public'
        );
        Kuliner::create($data);
        return redirect('merchant/kuliner')->with('success', 'Kuliner Berhasil Ditambahkan!');
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
        $item = Kuliner::findOrFail($id);
        return \view('pages.merchant.info.crud-kuliner.edit', [
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
    public function update(KulinerRequest $request, $id)
    {
        $data = $request->all();
        //$data['slug'] = Str::slug($request->judul);
        $item = Kuliner::findOrFail($id);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/info-kuliner',
            'public'
        );
        $item->update($data);
        return redirect('merchant/kuliner')->with('success', 'Kuliner Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Kuliner::findOrFail($id);
        $item->delete();

        return redirect('merchant/kuliner')->with('success', 'Kuliner Berhasil Dihapus!');
    }
}
