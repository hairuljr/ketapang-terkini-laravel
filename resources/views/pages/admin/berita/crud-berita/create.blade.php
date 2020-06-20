@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Berita</h1>
  </div>

  @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
  @endif


  <div class="row">
    <div class="card-body col-md-12">
      <form action="{{ route('kelola-berita.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Judul Berita" value="{{ old('judul') }}">
      </div>
      <div class="form-group">
        <label for="category_id">Kategori Berita</label>
        @foreach($categories as $ct)
            <div class="custom-control custom-switch">
              <input multiple name="category_id[]" type="checkbox" class="custom-control-input" value="{{ $ct->id }}" id="{{ $ct->nama_kategori }}">
              <label class="custom-control-label" for="{{ $ct->nama_kategori }}">#{{ $ct->nama_kategori }}</label>
            </div>
        @endforeach
      </div>
      <div class="form-group">
        <label for="tag_id">Tagar Berita</label>
          @foreach($tags as $tg)
            <div class="custom-control custom-switch">
              <input multiple name="tag_id[]" type="checkbox" class="custom-control-input" value="{{ $tg->id }}" id="{{ $tg->nama_tags }}">
              <label class="custom-control-label" for="{{ $tg->nama_tags }}">#{{ $tg->nama_tags }}</label>
            </div>
          @endforeach
      </div>
      <div class="form-group">
        <label for="penulis">Penulis</label>
        <input type="text" class="form-control" name="penulis" placeholder="Penulis Berita" value="{{ old('penulis') }}">
      </div>
      <div class="form-group">
        <label for="penggalan">Penggalan</label>
        <input type="text" class="form-control" name="penggalan" placeholder="Penggalan Berita" value="{{ old('penggalan') }}">
      </div>
      <div class="form-group">
        <label for="tanggal">Tanggal</label>
        <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d') }}">
      </div>
      <div class="form-group row">
        <div class="col-sm-2">Gambar Berita</div>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
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
      <div class="col-sm-3 mt-2">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<script src="{{ url('backend/js/ckeditor/ckeditor.js') }}"></script>

<script>
  CKEDITOR.replace( 'konten' );
</script>
@endsection