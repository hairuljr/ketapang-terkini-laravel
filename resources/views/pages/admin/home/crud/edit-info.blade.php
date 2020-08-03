@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Info</h1>
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
      <form action="{{ route('info-kite.update', $item->id) }}" method="post" enctype="multipart/form-data">
      @method('PUT')
        @csrf
      <div class="form-group">
        <label for="nama_kat_info">Nama Kategori Info</label>
        <input type="text" class="form-control" name="nama_kat_info" placeholder="Nama Kategori Info" value="{{ $item->nama_kat_info }}">
      </div>
    <div class="form-group row">
      <div class="col-sm-12">
        <div class="input-images-all mb-4">
          <div class="input-field">
              <div class="input-images-1" style="padding-top: .5rem;"></div>
          </div>
        </div>
      </div>
    </div>
    <div class="row align-items-center justify-content-center mt-4">
      <div class="col-sm-3 my-2">
        <a href="{{ url('admin/info-kite') }}" class="btn btn-secondary">Kembali</a>
      </div>
      <div class="col-sm-3">
        <button type="submit" class="btn btn-primary">Edit</button>
      </div>
    </div>
      </form>
    </div>
    <div class="col-md-6">
      <div class="col-sm-12 mb-4" id="galley">
        <img src="{{ Storage::url($item->gambar) }}" class="img-thumbnail" style="max-height: 350px; object-fit: cover;">
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection