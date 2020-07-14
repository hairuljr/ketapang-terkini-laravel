<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JasaRequest;
use App\Jasa;
use App\ImageInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth as FacadesAuth;
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
        $id = FacadesAuth::user()->id;
        $items = DB::table('infos')->where([
            ['id_users', '=', $id],
            ['id_kat_info', '=', '4'],
            ['deleted_at', '=', null],
        ])->get();
        return \view('pages.admin.info.jasa', [
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
        return \view('pages.admin.info.crud-jasa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JasaRequest $request)
    {
        $data = $request->validate([
            'cover' => 'required|image'
        ]);
        $data = $request->all();
        $data['id_users'] = FacadesAuth::user()->id;
        $data['slug'] = Str::slug($request->judul);
        $data['cover'] = $request->file('cover')->store(
            'assets/info-jasa/cover',
            'public'
        );
        $idnya = Jasa::create($data);
        //masukan ke image_infos jasa
        $images = array();
        if ($files = $request->file('gambar')) {
            foreach ($files as $file) {
                $name = 'assets/info-jasa/' . $file->getClientOriginalName();
                $file->move('../storage/app/public/assets/info-jasa', $name);
                $images[] = $name;
            }
        }
        /*Insert your data*/
        ImageInfo::insert([
            'nama_foto' =>  implode("|", $images),
            'info_id' => $idnya->id
        ]);
        return redirect('admin/info-jasa')->with('toast_success', 'Jasa Berhasil Ditambahkan!');
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
        $item = Jasa::findOrFail($id);
        return \view('pages.admin.info.crud-jasa.edit', [
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
    public function update(JasaRequest $request, $id)
    {
        $data = $request->all();
        $data['id_users'] = FacadesAuth::user()->id;
        $data['slug'] = Str::slug($request->judul);
        $item = Jasa::findOrFail($id);
        if ($request->hasFile('cover')) {
            $filename = $request->cover->getClientOriginalName();
            $data['cover'] = $request->cover->storeAs('assets/info-jasa/cover', $filename, 'public');
        } else {
            $data['cover'] = $item->cover;
        }
        $item->update($data);
        // masukkan ke image_infos
        $images = array();
        if ($files = $request->file('gambar')) {
            foreach ($files as $file) {
                $name = 'assets/info-jasa/' . $file->getClientOriginalName();
                $file->move('../storage/app/public/assets/info-jasa', $name);
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
        return redirect('admin/info-jasa')->with('toast_success', 'Jasa Berhasil Diubah!');
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
        DB::table('image_infos')->where('info_id', '=', $id)->delete();
        return redirect('admin/info-jasa')->with('toast_success', 'Jasa Berhasil Dihapustoast_!');
    }
}
