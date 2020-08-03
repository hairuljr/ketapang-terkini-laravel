@extends('layouts.admin')

@section('content')
    <!-- Begin Page Content -->
<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Edit Berita</h1>
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
    <div class="card-body col-md-12">
      <form action="{{ route('kelola-berita.update', $item->id) }}" method="post" enctype="multipart/form-data">
      @method('PUT')
        @csrf
        <div class="form-group">
          <label for="judul">Judul</label>
          <input type="text" class="form-control" name="judul" value="{{ old('judul') ?? $item->judul }}">
        </div>
        <div class="form-group">
          <label for="category_id">Kategori Berita</label>
          <select multiple name="category_id[]" required class="form-control select2">
              @foreach($item->categories as $cat)
                <option selected disabled value="{{ $cat->id }}">{{ $cat->nama_kategori }}</option>
              @endforeach
              @foreach($categories as $kb)
                  <option value="{{ $kb->id }}">
                      {{ $kb->nama_kategori }}
                  </option>
              @endforeach
          </select>
        </div>
        <div class="form-group">
          <label for="tag_id">Tagarnya</label>
          @foreach($item->tags as $tag)
            <div class="custom-control custom-switch">
              <input disabled checked type="checkbox" class="custom-control-input">
              <label class="custom-control-label">#{{ $tag->nama_tags }}</label>
            </div>
          @endforeach
          <hr>
          <label for="tag_id">Pilih Tagar (jika ingin ubah)</label>
          @foreach($tags as $tg)
            <div class="custom-control custom-switch">
              <input multiple name="tag_id[]" type="checkbox" class="custom-control-input" value="{{ $tg->id }}" id="{{ $tg->id }}">
              <label class="custom-control-label" for="{{ $tg->id }}">#{{ $tg->nama_tags }}</label>
            </div>
          @endforeach
        </div>
        <div class="form-group">
          <label for="penulis">Penulis</label>
          <input type="text" class="form-control" name="penulis" placeholder="Penulis Berita" value="{{ old('penulis') ?? $item->penulis }}">
        </div>
        <div class="form-group">
          <label for="penggalan">Penggalan</label>
          <input type="text" class="form-control" name="penggalan" placeholder="Penggalan Berita" value="{{ old('penggalan') ?? $item->penggalan }}">
        </div>
        <div class="form-group">
          <label for="tanggal">Tanggal</label>
          <input type="date" class="form-control" name="tanggal" value="{{ old('tanggal') ?? $item->tanggal }}">
        </div>
        <div class="form-group row">
          <div class="col-sm-2">Gambar Berita</div>
          <div class="col-sm-10">
              <div class="row">
                <div class="col-sm-4 mb-4" id="galley">
                  <img src="{{ Storage::url($item->gambar) }}" class="img-thumbnail">
                </div>
                  <div class="col-sm-8">
                    <div class="input-images-all mb-4">
                      <div class="input-field">
                          <div class="input-images-1" style="padding-top: .5rem;"></div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
        <div class="form-group">
          <textarea id="konten" class="form-control" name="konten" rows="10" cols="50">{!! old('konten') ?? $item->konten !!}</textarea>
        </div>

    <div class="row align-items-center justify-content-center mt-4">
      <div class="col-sm-3">
        <a href="{{ url('admin/kelola-berita') }}" class="btn btn-secondary">Kembali</a>
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
<script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

<script>
  CKEDITOR.replace('konten');
</script>
@endsection