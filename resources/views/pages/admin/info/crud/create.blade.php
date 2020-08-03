@extends('layouts.admin')

@section('content')
@php
    $link = request()->segment(2);
    $pecah = explode("-", $link);
    if ($pecah[1] === 'fashion') {
      $val = 1;
    } elseif ($pecah[1] === 'kuliner') {
      $val = 2;
    } elseif ($pecah[1] === 'wisata') {
      $val = 3;
    } elseif ($pecah[1] === 'jasa') {
      $val = 4;
    } else {
      $val = null;
    }
  @endphp
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Tambah Info {{ Str::ucfirst($pecah[1]) }}</h1>
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
      <form action="{{ route($link.'.store') }}" name="form-example-1" id="form-example-1" method="post" enctype="multipart/form-data">
        @csrf
      <input type="hidden" class="form-control" name="id_kat_info" value="{{ $val }}">
      {{-- Memasukkan Form Tambah --}}
      @include('pages.admin.info.crud.form-add-info')
      </form>
    </div>
  </div>

</div>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'konten' );
</script>
<!-- /.container-fluid -->
@endsection