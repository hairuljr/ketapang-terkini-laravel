@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Event / Loker</h1>
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
    <div class="card-body col-md-8">
      <form action="{{ route('event-loker.store') }}" method="post" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Judul Event / Loker" value="{{ old('judul') }}">
      </div>
      <div class="form-group">
        <label for="jenis">Jenis</label>
        <select name="jenis" id="jenis" class="form-control">
          <option disabled selected>~ Pilih Jenis ~</option>
          <option value="EVENT">Event</option>
          <option value="LOKER">Loker</option>
        </select>
      </div>
      <div class="form-group">
        <label for="maps">Link Embed Google Maps</label>
        <p><i><b>*</b>Link didapat dengan fitur sematkan Peta dari Google Maps.</i></p>
        <a class="btn btn-sm btn-outline-success mb-2 pull-right" href="http://shorturl.at/yFHO1" target="_blank" rel="noopener noreferrer">Ke Gmaps</a>
        <input type="text" class="form-control" name="maps" placeholder="Sematkan peta dalam ukuran Kecil" value="{{ old('maps') }}">
      </div>
      <div class="form-group">
        <textarea id="deskripsi" class="form-control" name="deskripsi" rows="10" cols="50">{{ old('deskripsi') }}</textarea>
      </div>

      <div class="input-images-all mb-4">
        <div class="input-field">
            <label class="active">Gambar Event / Loker</label>
            <div class="input-images-1" style="padding-top: .5rem;"></div>
        </div>
      </div>
      <div class="row align-items-center justify-content-center mt-4">
        <div class="col-sm-3">
          <a href="{{ url('admin/event-loker') }}" class="btn btn-secondary mb-2">Kembali</a>
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
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'deskripsi' );
</script>
@endsection