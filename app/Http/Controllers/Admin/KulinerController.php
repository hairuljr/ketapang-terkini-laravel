<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KulinerRequest;
use App\Kuliner;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;
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
        $id = FacadesAuth::user()->id;
        $items = DB::table('infos')->where([
            ['id_users', '=', $id],
            ['id_kat_info', '=', '2'],
            ['deleted_at', '=', null],
        ])->get();
        return \view('pages.admin.info.kuliner', [
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
        return \view('pages.admin.info.crud-kuliner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(KulinerRequest $request)
    {
        $data = $request->validate([
            'gambar' => 'required|image'
        ]);
        $data = $request->all();
        $data['id_users'] = FacadesAuth::user()->id;
        $data['slug'] = Str::slug($request->judul);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/info-kuliner',
            'public'
        );
        Kuliner::create($data);
        return redirect('admin/info-kuliner')->with('toast_success', 'Kuliner Berhasil Ditambahkan!');
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
        return \view('pages.admin.info.crud-kuliner.edit', [
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
        $data['id_users'] = FacadesAuth::user()->id;
        $data['slug'] = Str::slug($request->judul);
        $item = Kuliner::findOrFail($id);
        if ($request->hasFile('gambar')) {
            $filename = $request->gambar->getClientOriginalName();
            $data['gambar'] = $request->gambar->storeAs('assets/info-kuliner', $filename, 'public');
        } else {
            $data['gambar'] = $item->gambar;
        }
        $item->update($data);
        return redirect('admin/info-kuliner')->with('toast_success', 'Kuliner Berhasil Diubah!');
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

        return redirect('admin/info-kuliner')->with('toast_success', 'Kuliner Berhasil Dihapus!');
    }
}
