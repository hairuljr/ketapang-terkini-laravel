<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FashionRequest;
use App\Fashion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FashionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$items = Fashion::all();
        $items = Fashion::with(['kategori_fashion'])->where('id_kat_info', 1)->get();
        return \view('pages.merchant.info.fashion', [
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
        return \view('pages.merchant.info.crud-fashion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FashionRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/info-fashion',
            'public'
        );
        Fashion::create($data);
        return redirect('merchant/fashion')->with('success', 'Fashion Berhasil Ditambahkan!');
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
        $item = Fashion::findOrFail($id);
        return \view('pages.merchant.info.crud-fashion.edit', [
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
    public function update(FashionRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $item = Fashion::findOrFail($id);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/info-fashion',
            'public'
        );
        $item->update($data);
        return redirect('merchant/fashion')->with('success', 'Fashion Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Fashion::findOrFail($id);
        $item->delete();

        return redirect('merchant/fashion')->with('success', 'Fashion Berhasil Dihapus!');
    }
}
