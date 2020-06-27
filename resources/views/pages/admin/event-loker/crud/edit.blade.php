@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Event / Loker {{ $item->judul }}</h1>
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
      <form action="{{ route('event-loker.update', $item->id) }}" method="post" enctype="multipart/form-data">
      @method('PUT')
        @csrf
      <div class="form-group">
        <label for="judul">Judul</label>
        <input type="text" class="form-control" name="judul" placeholder="Judul Event / Loker" value="{{ $item->judul }}">
      </div>

      <div class="form-group row">
        <div class="col-sm-4">Gambar Event / Loker</div>
        <div class="col-sm-8">
            <div class="row">
              <div class="col-sm-4 mb-4">
                <img src="{{ Storage::url($item->gambar) }}" class="img-thumbnail">
            </div>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input value="{{ $item->gambar }}" type="file" class="custom-file-input" id="gambar" name="gambar">
                        <label class="custom-file-label" for="gambar">Pilih gambar</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row align-items-center justify-content-center mt-4">
      <div class="col-sm-3">
        <a href="{{ url('admin/event-loker') }}" class="btn btn-secondary">Kembali</a>
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