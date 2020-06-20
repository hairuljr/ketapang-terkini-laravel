@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Info Fashion</h1>
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
    <div class="card-body col-md-6">
      <form action="{{ route('info-fashion.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
      @csrf
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" name="judul" value="{{ $item->judul }}">
      </div>
      <div class="form-group">
        <label for="links">Link Embed Google Maps</label>
        <p><i><b>*</b>Link didapat dengan fitur sematkan Peta dari Google Maps<br> Silahkan cari tutornya di Google yaa kalau belum tau.</i></p>
        <input type="text" class="form-control" name="links" placeholder="Sematkan peta dalam ukuran Kecil" value="{{ $item->links }}">
      </div>
      <div class="form-group">
        <label for="rating">Rating</label>
        <input type="number" class="form-control" max="5" min="1" name="rating" value="{{ $item->rating }}">
      </div>
      <div class="form-group">
        <label for="jml_rating">Jumlah Rating</label>
        <input type="number" class="form-control" name="jml_rating" value="{{ $item->jml_rating }}">
      </div>
      <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="keterangan" cols=70 rows="5">{{ $item->keterangan }}</textarea>
      </div>
      <input type="hidden" class="form-control" name="id_kat_info" value="1">

      <div class="form-group row">
        <div class="col-sm-3">Gambar Info</div>
        <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-4 mb-4">
                <img src="{{ Storage::url($item->gambar) }}" class="img-thumbnail">
              </div>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar" required>
                        <label class="custom-file-label" for="gambar">Pilih gambar</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center justify-content-center mt-4">
      <div class="col-sm-3">
        <a href="{{ url('admin/info-fashion') }}" class="btn btn-secondary">Kembali</a>
      </div>
      <div class="col-sm-3">
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection