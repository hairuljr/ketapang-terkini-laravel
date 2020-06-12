@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Kategori</h1>
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
      <form action="{{ route('kategori-berita.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" placeholder="Nama Kategori Berita" value="{{ old('nama_kategori') }}">
      </div>

    <div class="row align-items-center justify-content-center mt-4">
      <div class="col-sm-3">
        <a href="{{ url('admin/kategori-berita') }}" class="btn btn-secondary">Kembali</a>
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