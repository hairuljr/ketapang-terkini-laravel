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
    <h1 class="h3 mb-0 text-gray-800">Edit Info {{ Str::ucfirst($pecah[1]) }}</h1>
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

  @php
    $link = request()->segment(2);
  @endphp
  <div class="row" id="galley">
    <div class="card-body col-md-6">
      <form action="{{ route($link.'.update', $item->id) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
      @csrf
      <input type="hidden" class="form-control" name="id_kat_info" value="{{ $val }}">
      @include('pages.admin.info.crud.form-edit-info')
      </form>
    </div>
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
  CKEDITOR.replace( 'konten' );
</script>
<!-- /.container-fluid -->
@endsection