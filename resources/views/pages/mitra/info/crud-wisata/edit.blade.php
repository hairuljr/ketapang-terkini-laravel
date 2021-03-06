@extends('layouts.mitra')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Info Wisata</h1>
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
      <form action="{{ route('wisata.update', $item->id) }}" method="post" enctype="multipart/form-data">
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
        <textarea id="konten" class="form-control" name="keterangan" rows="10" cols="50">{!! $item->keterangan !!}</textarea>
      </div>
      <input type="hidden" class="form-control" name="id_kat_info" value="3">

      <div class="form-group row">
        <div class="col-sm-3">Cover</div>
        <div class="col-sm-9">
            <div class="row">
              <div class="col-sm-4 mb-4">
                <img src="{{ Storage::url($item->cover) }}" class="img-thumbnail">
              </div>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="cover" name="cover" required>
                        <label class="custom-file-label" for="cover">Pilih cover</label>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-3">Gambar Info</div>
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-12">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="gambar" name="gambar[]" multiple="true">
                        <label class="custom-file-label" for="gambar">Pilih Banyak Gambar</label>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div>
    <div class="card-body col-md-3">
      <table class="table table-responsive table-hover">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Gambar Info</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($foto_image as $item)
            @php
              $imagesImploded = $item->nama_foto;
              $imagesExploded = explode('|', $imagesImploded);
            @endphp
            @php
               $i = 1;
            @endphp 
            @foreach(array_slice($imagesExploded, 0,4) as $image)
            <tr>
              <td>{{ $i++ }}</td>
              <td><img src="{{ Storage::url(trim($image)) }}" class="img-thumbnail" width="150px;"></td>
            </tr>
            @endforeach
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-body col-md-3">
      <table class="table table-responsive table-hover">
        <thead class="thead-light">
          <tr>
            <th>No</th>
            <th>Gambar Info</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($foto_image as $item)
            @php
              $imagesImploded = $item->nama_foto;
              $imagesExploded = explode('|', $imagesImploded);
            @endphp
            @php
               $i = 5;
            @endphp 
            @foreach(array_slice($imagesExploded, 4,10) as $image)
            <tr>
              <td>{{ $i++ }}</td>
              <td><img src="{{ Storage::url(trim($image)) }}" class="img-thumbnail" width="150px;"></td>
            </tr>
            @endforeach
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="row align-items-center justify-content-center">
    <div class="col-sm-3 mb-2">
      <a href="{{ url('mitra/wisata') }}" class="btn btn-secondary mx-4">Kembali</a>
      <button type="submit" class="btn btn-primary">Edit</button>
    </div>
  </div>
</form>
</div>
<script src="{{ url('backend/js/ckeditor/ckeditor.js') }}"></script>

<script>
  CKEDITOR.replace( 'konten' );
</script>
<!-- /.container-fluid -->
@endsection