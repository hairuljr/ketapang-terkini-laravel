<?php

namespace App\Http\Controllers\Mitra;

use Illuminate\Support\Facades\Auth as FacadesAuth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FashionRequest;
use App\Fashion;
use App\ImageInfo;
use Illuminate\Support\Facades\DB;
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
        $id = FacadesAuth::user()->id;
        $items = DB::table('infos')->where([
            ['id_users', '=', $id],
            ['id_kat_info', '=', '1'],
            ['deleted_at', '=', null],
        ])->get();
        return \view('pages.mitra.info.fashion', [
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
        return \view('pages.mitra.info.crud-fashion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FashionRequest $request)
    {
        $data = $request->validate([
            'cover' => 'required|image'
        ]);
        $data = $request->all();
        $data['id_users'] = FacadesAuth::user()->id;
        $data['slug'] = Str::slug($request->judul);
        $data['cover'] = $request->file('cover')->store(
            'assets/info-fashion/cover',
            'public'
        );
        $idnya = Fashion::create($data);
        // masukkan ke image_infos
        $images = array();
        if ($files = $request->file('gambar')) {
            foreach ($files as $file) {
                $name = 'assets/info-fashion/' . $file->getClientOriginalName();
                $file->move(base_path() . '/storage/app/public/assets/info-fashion', $name);
                $images[] = $name;
            }
        }
        /*Insert your data*/
        ImageInfo::insert([
            'nama_foto' =>  implode("|", $images),
            'info_id' => $idnya->id
        ]);
        return redirect('mitra/fashion')->with('success', 'Fashion Berhasil Ditambahkan!');
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
        $item = Fashion::findOrFail($id);
        return \view('pages.mitra.info.crud-fashion.edit', [
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
    public function update(FashionRequest $request, $id)
    {
        $data = $request->all();
        $data['id_users'] = FacadesAuth::user()->id;
        $data['slug'] = Str::slug($request->judul);
        $item = Fashion::findOrFail($id);
        if ($request->hasFile('cover')) {
            $filename = $request->cover->getClientOriginalName();
            $data['cover'] = $request->cover->storeAs('assets/info-fashion/cover', $filename, 'public');
        } else {
            $data['cover'] = $item->cover;
        }
        $item->update($data);
        // masukkan ke image_infos
        $images = array();
        if ($files = $request->file('gambar')) {
            foreach ($files as $file) {
                $name = 'assets/info-fashion/' . $file->getClientOriginalName();
                $file->move(base_path() . '/storage/app/public/assets/info-fashion', $name);
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
        return redirect('mitra/fashion')->with('success', 'Fashion Berhasil Diubah!');
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
        DB::table('image_infos')->where('info_id', '=', $id)->delete();
        return redirect('mitra/fashion')->with('success', 'Fashion Berhasil Dihapus!');
    }
}
