@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Event & Loker</h1>
    <a href="{{ route('event-loker.create') }}" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Event & Loker
  </a>
  </div>

  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table id="dataTable" class="table table-bordered table-hover" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Judul</th>
              <th>Jenis</th>
              <th>Deskripsi</th>
              <th>Gambar</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody id="galley">
            <?php $i = 1; ?>
            @forelse ($items as $item)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $item->judul }}</td>
              <td>{{ $item->jenis }}</td>
              <td>{!! $item->deskripsi !!}</td>
              <td><img class="img-thumbnail" width="200px" src="{{ Storage::url($item->gambar) }}"></td>
              <td>
                <a href="{{ route('event-loker.edit', $item->id) }}" class="btn btn-info my-1">
                <i class="fa fa-pencil-alt"></i></a>
                <form action="{{ route('event-loker.destroy', $item->id) }}" method="POST" class="d-inline">
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
              <td colspan="6" class="text-center">Data Kosong</td>
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