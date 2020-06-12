@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Berita</h1>
  </div>

  @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif

  <div class="row">
    <div class="card-body col-md-6">
      <form action="{{ route('kelola-berita.update', $item->id) }}" method="post" enctype="multipart/form-data">
      @method('PUT')
        @csrf
        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" class="form-control" name="judul" value="{{ $item->judul }}">
        </div>
        <div class="form-group">
          <label for="category_id">Kategori Berita</label>
          <select multiple name="category_id[]" required class="form-control">
              <option value="">Kategori Sebelumnya : {{ $item->nama_kategories }}</option>
              @foreach($categories as $kb)
                  <option value="{{ $kb->id }}">
                      {{ $kb->nama_kategori }}
                  </option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tag_id">Tagar Berita</label>
            @foreach($tags as $tg)
              <div class="custom-control custom-switch">
                <input multiple name="tag_id[]" type="checkbox" class="custom-control-input" value="{{ $tg->id }}" id="{{ $tg->id }}">
                <label class="custom-control-label" for="{{ $tg->id }}">#{{ $tg->nama_tags }}</label>
              </div>
            @endforeach
        </div>
        <div class="form-group">
          <label for="penulis">Penulis</label>
          <input type="text" class="form-control" name="penulis" placeholder="Penulis Berita" value="{{ $item->penulis }}">
        </div>
        <div class="form-group">
          <label for="penggalan">Penggalan</label>
          <input type="text" class="form-control" name="penggalan" placeholder="Penggalan Berita" value="{{ $item->penggalan }}">
        </div>
        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" name="tanggal" value="{{ $item->tanggal }}">
        </div>
        <div class="form-group row">
          <div class="col-sm-4">Gambar Berita</div>
          <div class="col-sm-8">
              <div class="row">
                <div class="col-sm-4 mb-4">
                  <img src="{{ Storage::url($item->gambar) }}" class="img-thumbnail">
              </div>
                  <div class="col-sm-8">
                      <div class="custom-file">
                          <input type="file" class="custom-file-input" id="gambar" name="gambar">
                          <label class="custom-file-label" for="gambar">Pilih gambar</label>
                      </div>
                  </div>
              </div>
          </div>
      </div>
        <div class="form-group">
          <textarea id="konten" class="form-control" name="konten" rows="10" cols="50"></textarea>
        </div>

    <div class="row align-items-center justify-content-center mt-4">
      <div class="col-sm-3">
        <a href="{{ url('admin/kelola-berita') }}" class="btn btn-secondary">Kembali</a>
      </div>
      <div class="col-sm-3">
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection