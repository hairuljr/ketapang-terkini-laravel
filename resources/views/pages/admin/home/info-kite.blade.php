@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Info Kite</h1>
  </div>

  <div class="row">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered table-hover" width="100%" cellspacing="0">
          <thead class="thead-light">
            <tr>
              <th>No</th>
              <th>Nama Kategori Info</th>
              <th>Gambar Info</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @forelse ($items as $item)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $item->nama_kat_info }}</td>
              <td><img class="img-thumbnail" width="200px" src="{{ Storage::url($item->gambar) }}"></td>
              <td>
                <a href="{{ route('info-kite.edit', $item->id) }}" class="btn btn-info">
                <i class="fa fa-pencil-alt"></i></a>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="4" class="text-center">Data Kosong</td>
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