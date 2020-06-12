<?php

namespace App\Http\Controllers\Merchant;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JasaRequest;
use App\Jasa;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$items = Jasa::all();
        $items = Jasa::with(['kategori_jasa'])->where('id_kat_info', 4)->get();
        return \view('pages.merchant.info.jasa', [
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
        return \view('pages.merchant.info.crud-jasa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JasaRequest $request)
    {
        $data = $request->all();
        //$data['slug'] = Str::slug($request->judul);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/info-jasa',
            'public'
        );
        Jasa::create($data);
        return redirect('merchant/jasa')->with('success', 'Jasa Berhasil Ditambahkan!');
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
        $item = Jasa::findOrFail($id);
        return \view('pages.merchant.info.crud-jasa.edit', [
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
    public function update(JasaRequest $request, $id)
    {
        $data = $request->all();
        //$data['slug'] = Str::slug($request->judul);
        $item = Jasa::findOrFail($id);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/info-jasa',
            'public'
        );
        $item->update($data);
        return redirect('merchant/jasa')->with('success', 'Jasa Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Jasa::findOrFail($id);
        $item->delete();

        return redirect('merchant/jasa')->with('success', 'Jasa Berhasil Dihapus!');
    }
}
