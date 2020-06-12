<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventLokerRequest;
use App\EventLoker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventLokerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = EventLoker::all();

        return \view('pages.admin.event-loker.event', [
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
        return \view('pages.admin.event-loker.crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EventLokerRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/event-loker',
            'public'
        );
        EventLoker::create($data);
        return redirect('admin/event-loker')->with('toast_success', 'Event / Loker Berhasil Ditambahkan!');
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
        $item = EventLoker::findOrFail($id);
        return \view('pages.admin.event-loker.crud.edit', [
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
    public function update(EventLokerRequest $request, $id)
    {
        $data = $request->all();
        $item = EventLoker::findOrFail($id);
        $data['gambar'] = $request->file('gambar')->store(
            'assets/event-loker',
            'public'
        );
        $item->update($data);
        return redirect('admin/event-loker')->with('toast_success', 'Event / Loker Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = EventLoker::findOrFail($id);
        $image_path = "public/" . $item->gambar;
        if (file_exists($image_path)) {
            unlink($image_path);
        }
        $item->delete();
        return redirect('admin/event-loker')->with('toast_success', 'Event / Loker Berhasil Dihapus!');
    }
}
