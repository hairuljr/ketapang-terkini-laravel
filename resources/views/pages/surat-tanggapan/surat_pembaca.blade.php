@extends('layouts.app')

@section('title')
    Surat & Tanggapan
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{ url('frontend/images/bg_3.jpg') }}"></div>

<section class="ftco-section ftco-degree-bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Surat & Tanggapan</span>
        <h2 class="mb-5">
          Surat Pembaca
        </h2>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-8 ftco-animate">
        <div class="row">
          {{-- @foreach ($surat_pembaca as $item) --}}
            <div class="col-md-12 d-flex ftco-animate">
              <div class="blog-entry align-self-stretch d-md-flex">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="pills-surat-tab" data-toggle="pill" href="#pills-surat" role="tab" aria-controls="pills-surat" aria-selected="true">Surat Pembaca</a>
                  </li>
                  <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pills-tanggapan-tab" data-toggle="pill" href="#pills-tanggapan" role="tab" aria-controls="pills-tanggapan" aria-selected="false">Tanggapan Surat</a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-md-10 ftco-animate">
                <div class="tab-content" id="pills-tabContent">
                  {{-- Surat Pembaca --}}
                  <div class="tab-pane fade show active" id="pills-surat" role="tabpanel" aria-labelledby="pills-surat-tab">
                    @foreach ($surat_pembaca as $item)
                    <p style="color: #8dc455;" class="text-uppercase">{{ $item->ditujukan }}</p>
                    <a href="{{ route('surat-tanggapan-detail', $item->slug) }}" style="font-size: 18px; font-weight: 500" class="text-muted">{{ $item->judul_surat }}</a>
                    <p>{{ Str::limit($item->isi_surat, 180) }}</p>
                    <p>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y | H:s'). ' WIB' }}</p>
                    <hr>
                    @endforeach
                    {{-- Pagination --}}
                      <div class="row mt-5">
                        <div class="col text-center">
                          <div class="block-27">
                            <ul>
                              <li class="mx-1">{{ $surat_pembaca->links() }}</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    {{-- end pagination --}}
                    
                    {{-- Kirim Surat --}}
                    <div class="row ml-1 mt-5 ftco-animate">
                      <div class="card">
                        <h5 class="card-header">Kirim Surat Anda</h5>
                        <div class="card-body">
                          <p class="card-text">Isi form di bawah ini dengan data dan identitas diri Anda secara lengkap. Redaksi mengutamakan surat yang ditulis dengan identitas yang jelas.</p>
                          <form action="{{ action('KirimSuratController@kirim') }}" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="nama_lengkap">Nama Lengkap</label>
                              <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap">
                            </div>
                            <div class="form-group">
                              <label for="alamat_lengkap">Alamat Lengkap</label>
                              <input type="text" class="form-control" id="alamat_lengkap" name="alamat_lengkap">
                            </div>
                            <div class="form-group">
                              <label for="kelurahan">Kelurahan</label>
                              <input type="text" class="form-control" id="kelurahan" name="kelurahan">
                            </div>
                            <div class="form-group">
                              <label for="kecamatan">Kecamatan</label>
                              <input type="text" class="form-control" id="kecamatan" name="kecamatan">
                            </div>
                            <div class="form-group">
                              <label for="no_hp">No Telp/HP</label>
                              <input type="text" class="form-control" id="no_hp" name="no_hp" maxlength="15">
                            </div>
                            <div class="form-group">
                              <label for="judul_surat">Judul Surat</label>
                              <input type="text" class="form-control" id="judul_surat" name="judul_surat">
                            </div>
                            <div class="form-group">
                              <label for="ditujukan">Ditujukan Kepada</label>
                              <input type="text" class="form-control" id="ditujukan" name="ditujukan">
                            </div>
                            <div class="form-group">
                              <label for="isi_surat">Isi Surat</label>
                              <textarea class="form-control" id="isi_surat" name="isi_surat" rows="5"></textarea>
                            </div>
                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" class="btn btn-primary">Kirim</button>
                          </form>
                      </div>
                    </div>
                  </div>
                  {{-- End Kirim surat --}}
                  </div>
                  
                  {{-- Tanggapan Surat --}}
                  <div class="tab-pane fade" id="pills-tanggapan" role="tabpanel" aria-labelledby="pills-tanggapan-tab">
                    @foreach ($tanggapan_surat as $item)
                    <p style="color: #8dc455;" class="text-uppercase">{{ $item->institusi }}</p>
                    <a href="{{ route('tanggapan-detail', $item->slug) }}" style="font-size: 18px; font-weight: 500" class="text-muted">{{ ucwords(str_replace('-', ' ', $item->slug)) }}</a>
                    <p>{{ Str::limit($item->isi_tanggapan,150) }}</p>
                    <p>{{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l, d F Y | H:s'). ' WIB' }}</p>
                    <hr>
                    @endforeach
                    {{-- Pagination --}}
                      <div class="row mt-5">
                        <div class="col text-center">
                          <div class="block-27">
                            <ul>
                              <li class="mx-1">{{ $tanggapan_surat->links() }}</li>
                            </ul>
                          </div>
                        </div>
                      </div>
                    {{-- end pagination --}}
                  </div>
                </div>
              </div>
            </div>
        </div>

      </div>
      <!-- .col-md-8 -->
      <div class="col-lg-4 sidebar ftco-animate">

        <!-- Tanggapan Surat -->
        <div class="sidebar-box ftco-animate">
          <h3 class="heading">Tanggapan Terbaru</h3>
          @foreach ($tanggapan as $item)
            <div class="block-21 mb-4 d-flex">
              <div class="text">
                <h3 class="heading-1">
                  <a style="font-size: 15px; font-weight: 500; line-height: 5px;" class="text-muted" href="{{ route('surat-tanggapan-detail', $item->slug) }}">{{ $item->judul_surat }}</a>
                </h3>
                <div class="meta">
                  <div>
                    <a><span class="icon-calendar"></span> {{ \Carbon\Carbon::parse($item->updated_at)->translatedFormat('l, d F Y | H:s'). ' WIB' }}</a>
                  </div>
                  <div>
                    <a><span class="icon-person"></span> {{ $item->institusi }}</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach  
        </div>
      </div>
    </div>
  </div>
</section>
<!-- .section -->
@endsection