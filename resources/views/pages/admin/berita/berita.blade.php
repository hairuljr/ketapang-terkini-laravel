@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kelola Berita</h1>
    <a href="{{ route('kelola-berita.create') }}" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Berita
  </a>
  </div>

  <div class="row">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Penulis</th>
              <th>Tanggal Terbit</th>
              <th>Kategori</th>
              <th>Gambar</th>
              <th>Konten</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @forelse ($items as $item)
              <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $item->judul }}</td>
              <td>{{ $item->penulis }}</td>
              <td>{{ $item->tanggal }}</td>
              <td>{{ $item->nama_kategori }}</td>
              <td><img class="img-thumbnail" width="200px" src="{{ Storage::url($item->gambar) }}"></td>
              <td>{!! Str::limit($item->konten,80) !!}</td>
              <td>
                <a href="{{ route('kelola-berita.edit', $item->id) }}" class="btn btn-info mb-2">
                <i class="fa fa-pencil-alt"></i></a>
                <form action="{{ route('kelola-berita.destroy', $item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button onclick="return confirm('Anda Yakin Hapus Data ini?')" class="btn btn-danger">
                  <i class="fa fa-trash"></i>
                </button>
                </form>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="8" class="text-center">Data Kosong</td>
            </tr>
            @endforelse
          </tbody>
        </table>
    </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
@endsection