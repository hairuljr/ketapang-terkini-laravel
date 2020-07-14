<?php

namespace App\Http\Controllers\Mitra;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\KulinerRequest;
use App\Kuliner;
use App\ImageInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;
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
        return \view('pages.mitra.info.kuliner', [
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
        return \view('pages.mitra.info.crud-kuliner.create');
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
            'cover' => 'required|image'
        ]);
        $data = $request->all();
        $data['id_users'] = FacadesAuth::user()->id;
        $data['slug'] = Str::slug($request->judul);
        $data['cover'] = $request->file('cover')->store(
            'assets/info-kuliner/cover',
            'public'
        );
        $idnya = Kuliner::create($data);
        // masukkan ke image_infos
        $images = array();
        if ($files = $request->file('gambar')) {
            foreach ($files as $file) {
                $name = 'assets/info-kuliner/' . $file->getClientOriginalName();
                $file->move('../storage/app/public/assets/info-kuliner', $name);
                $images[] = $name;
            }
        }
        /*Insert your data*/
        ImageInfo::insert([
            'nama_foto' =>  implode("|", $images),
            'info_id' => $idnya->id
        ]);
        return redirect('mitra/kuliner')->with('success', 'Kuliner Berhasil Ditambahkan!');
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
        $query = "SELECT `image_infos`.`nama_foto`, `infos`.* FROM `infos` JOIN `image_infos` on `image_infos`.`info_id` = `infos`.`id` WHERE `infos`.`id` = '$id'";
        $foto_image = DB::select(DB::raw($query));
        $item = Kuliner::findOrFail($id);
        return \view('pages.mitra.info.crud-kuliner.edit', [
            'item' => $item,
            'foto_image' => $foto_image
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
        if ($request->hasFile('cover')) {
            $filename = $request->cover->getClientOriginalName();
            $data['cover'] = $request->cover->storeAs('assets/info-kuliner/cover', $filename, 'public');
        } else {
            $data['cover'] = $item->cover;
        }
        $item->update($data);
        // masukkan ke image_infos
        $images = array();
        if ($files = $request->file('gambar')) {
            foreach ($files as $file) {
                $name = 'assets/info-kuliner/' . $file->getClientOriginalName();
                $file->move('../storage/app/public/assets/info-kuliner', $name);
                $images[] = $name;
            }
        }
        //hapus dulu images_info sebelumnya
        DB::table('image_infos')->where('info_id', '=', $id)->delete();
        /*Insert your data*/
        ImageInfo::insert([
            'nama_foto' =>  implode("|", $images),
            'info_id' => $id
        ]);
        return redirect('mitra/kuliner')->with('success', 'Kuliner Berhasil Diubah!');
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
        DB::table('image_infos')->where('info_id', '=', $id)->delete();
        return redirect('mitra/kuliner')->with('success', 'Kuliner Berhasil Dihapus!');
    }
}