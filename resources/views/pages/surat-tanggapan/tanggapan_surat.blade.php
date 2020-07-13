@extends('layouts.app')

@section('title')
    Tanggapan Surat
@endsection

@section('content')
<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
        <div class="col-lg-8 ftco-animate">
          @foreach ($surat_pembaca as $item)
          <p style="color: #8dc455;" class="text-uppercase">{{ $item->ditujukan }}</p>
          <p style="font-size: 30px; font-weight: 500; line-height: 35px;" class="mb-2 text-muted">
            {{ ucwords(str_replace('-', ' ', $item->slug)) }}
          </p>
          <p>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y | H:s'). ' WIB' }}</p>
          <p>
            {!! $item->isi_surat !!}
          </p>
          <p style="font-size: 18px; font-weight: 500" class="mb-0 text-muted text-uppercase">{{ $item->nama_lengkap }}</p>
          <p style="font-size: 15px; font-weight: 300" class="mt-0 text-muted font-italic">{{ $item->kelurahan }}, {{ $item->kecamatan }}</p>
          @endforeach
        <hr>
          @foreach ($tanggapan as $item)
          <p style="color: #8dc455;" class="text-uppercase">{{ $item->institusi }}</p>
          <p style="font-size: 30px; font-weight: 500; line-height: 35px;" class="mb-2 text-muted">
            {{ ucwords(str_replace('-', ' ', $item->slug)) }}
          </p>
          <p>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y | H:s'). ' WIB' }}</p>
          <p>
            {!! $item->isi_tanggapan !!}
          </p>
          <p style="font-size: 18px; font-weight: 500" class="mb-0 text-muted text-uppercase">{{ $item->nama_lengkap }}</p>
          <p style="font-size: 15px; font-weight: 300" class="mt-0 text-muted font-italic">{{ $item->kota }}</p>
          @endforeach
        </div>

        
      <!-- side kanan berita-->
        <!-- Berita Sebelumnya -->
        <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Surat Lainnya</h3>
          @foreach ($tanggapan as $item)
          <div class="block-21 mb-4 d-flex">
              <div class="text">
                <h3 class="heading-1">
                  <a style="font-size: 15px; font-weight: 400" class="mb-1 text-muted" href="{{ route('surat-tanggapan-detail', $item->slug) }}">{{ $item->judul_surat }}</a>
                </h3>
                <div class="meta">
                  <div>
                    <a><span class="icon-calendar"></span> {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y | H:s'). ' WIB' }}</a>
                  </div>
                  <div>
                    <a><span class="icon-person"></span> {{ $item->nama_lengkap }}</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
            <p>
              <a style="font-size: 12px;" href="{{ route('surat-tanggapan') }}" class="btn btn-primary py-2 px-3">Lihat Semua</a>
            </p>
        </div>
      </div>
    </div>
  
    </div>
  </div>
</section>
<!-- .section -->
@endsection