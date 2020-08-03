@extends('layouts.app')

@section('title')
    Berita Terkini
@endsection

@section('content')
<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
        <div class="col-lg-8 ftco-animate">
          <h2 class="mb-3">
            {{ $items->judul }}
          </h2>
          <p>
            <img width="700px" src="{{ Storage::url($items->gambar) }}" class="img-fluid" />
          </p>
          <p>
            {!! $items->konten !!}
          </p>
          <div class="tag-widget post-tag-container mb-5 mt-5">
            <div class="tagcloud">
              @foreach ($tagarnya as $item)
                <a href="{{ route('tagar', $item->slug) }}" class="tag-cloud-link">#{{ $item->nama_tags }}</a>
              @endforeach
            </div>
          </div>
        </div>
      <!-- side kanan berita-->
      <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box">
          <form action="{{ route('cari-berita') }}" class="search-form" method="GET">
            <div class="form-group">
              <input type="text" class="form-control" name="cari" placeholder="Cari..." />
              <button type="submit" class="btn icon ion-ios-search"></button>
            </div>
          </form>
        </div>

        <!-- Kolom Category -->
        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Kategori</h3>
          <ul class="categories">
            @foreach ($jml_category as $item)
            <li>
              <a href="{{ route('kategori', $item->slug) }}">{{ $item->nama_kategori }}
                <span>({{ $item->jml_kategori }})</span>
              </a>
            </li>
            @endforeach
          </ul>
        </div>

        <!-- Berita Sebelumnya -->
        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Berita Sebelumnya</h3>
          @foreach ($newsPopuler as $item)
          <div class="block-21 mb-4 d-flex">
            <a href="{{ route('berita-detail', $item->slug) }}" class="blog-img mr-4" style="background-image: url('{{ Storage::url($item->gambar) }}');"></a>
            <div class="text">
              <h3 class="heading-1">
                <a href="{{ route('berita-detail', $item->slug) }}">{{ $item->judul }}</a>
              </h3>
              <div class="meta">
                <div>
                  <a><span class="icon-calendar"></span> {{ $item->tanggal }}</a>
                </div>
                <div>
                  <a><span class="icon-person"></span> {{ $item->penulis }}</a>
                </div>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
      <p>
        <a href="{{ route('berita') }}" class="btn btn-primary ml-3 py-2 px-3">Kembali</a>
      </p>
    </div>
  </div>
</section>
<!-- .section -->
@include('pages.berita.discus')
@endsection