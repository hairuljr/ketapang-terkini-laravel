@extends('layouts.app')

@section('title')
    Surat Pembaca
@endsection

@section('content')
<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row">
        <div class="col-lg-8 ftco-animate">
          <p style="color: #8dc455;" class="text-uppercase">{{ $items->ditujukan }}</p>
          <p style="font-size: 30px; font-weight: 500; line-height: 35px;" class="mb-2 text-muted">
            {{ $items->judul_surat }}
          </p>
          <p>{{ \Carbon\Carbon::parse($items->created_at)->translatedFormat('l, d F Y | H:s'). ' WIB' }}</p>
          <p>
            {!! $items->isi_surat !!}
          </p>
          <p style="font-size: 18px; font-weight: 500" class="mb-0 text-muted text-uppercase">{{ $items->nama_lengkap }}</p>
          <p style="font-size: 15px; font-weight: 300" class="mt-0 text-muted font-italic">{{ $items->kelurahan }}, {{ $items->kecamatan }}</p>
        </div>
        
      <!-- side kanan berita-->
        <!-- Berita Sebelumnya -->
        <div class="col-lg-4 sidebar ftco-animate">
        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Surat Lainnya</h3>
          @foreach ($surat_lainnya->take(2) as $item)
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
      {{-- Kirim Tanggapan --}}
      <div class="row">
        <div class="col-lg-8">
        <div class="card">
          <h5 class="card-header">Beri Tanggapan Atas Surat Ini</h5>
          <div class="card-body">
            <p class="card-text">Silakan kirim surat Anda melalui form di bawah ini. Mengingat banyaknya surat yang masuk, admin mengutamakan surat yang ditulis dengan baik dan disertai dengan identitas yang jelas. Semua field harus diisi!.</p>
            <form action="{{ action('KirimTanggapanController@kirim') }}" method="POST">
              @csrf
              <input type="hidden" name="surat_id" value="{{ $items->surat_id }}">
              <input type="hidden" name="judul_surat" value="{{ $items->judul_surat }}">
              <div class="form-group">
                <label for="nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
              </div>
              <div class="form-group">
                <label for="institusi">Nama Institusi/Perusahaan/Lembaga</label>
                <input type="text" class="form-control" id="institusi" name="institusi">
              </div>
              <div class="form-group">
                <label for="no_telp_institusi">Telp Perusahaan (untuk verifikasi)</label>
                <input type="text" class="form-control" id="no_telp_institusi" name="no_telp_institusi" maxlength="15">
              </div>
              <div class="form-group">
                <label for="alamat_lengkap">Alamat Lengkap</label>
                <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap">
              </div>
              <div class="form-group">
                <label for="kota">Kota</label>
                <input type="text" class="form-control" id="kota" name="kota">
              </div>
              <div class="form-group">
                <label for="no_hp">No Telp/HP</label>
                <input type="text" class="form-control" id="no_hp" name="no_hp" maxlength="15">
              </div>
              <div class="form-group">
                <label for="isi_tanggapan">Judul Pengaduan : <i>{{ $items->judul_surat }}</i></label>
                <textarea class="form-control" id="isi_tanggapan" name="isi_tanggapan" rows="5"></textarea>
              </div>
              <button type="reset" class="btn btn-danger">Reset</button>
              <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
      </div>
    </div>
    </div>
    {{-- End Kirim Tanggapan --}}
    </div>
  </div>
</section>
<!-- .section -->
@endsection