@extends('layouts.app')

@section('title')
    Home
@endsection

@section('content')
      <!-- Banner -->
<section id="home-section" class="hero">
	<div class="home-slider owl-carousel">
@foreach ($banner as $item)
  <div class="slider-item" style="background-image: url('{{ Storage::url($item->gambar) }}')">
		<div class="overlay"></div>
		<div class="container">
			<div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

				<div class="col-md-12 ftco-animate text-center">
					<h1 class="mb-2">{{ $item->judul }}</h1>
					<h2 class="subheading mb-4">{{ $item->sub_judul }}</h2>
				</div>

			</div>
		</div>
	</div>
	@endforeach
      
	</div>
</section>
<!-- End Banner -->


<!-- selamat datang -->
<section class="ftco-section testimony-section">
	<div class="container">
		<div class="row justify-content-center mb-1 pb-1">
			<div class="col-md-12 heading-section ftco-animate text-center">
				<span class="subheading">Selamat Datang</span>
				<h2 class="mb-4">Informasi Ketapang</h2>
				<span class="subheading" style="color: gray;">"Menuju Kota Ketapang yang Maju, mampu beradaptasi di era Industri dengan melek Teknologi Informasi"</span>
				<p>
					<br />
			</div>
			</p>
		</div>
	</div>
</section>

<!-- Info Kite-->
<section class="ftco-section ftco-category ftco-no-pt">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-6 order-md-last align-items-stretch d-flex">
						<div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url('{{url('frontend/images/pandu.jpg')}}');">
							<div class="text text-center">
								<h2 style="color: white;">Info Kite</h2>
								<p style="color: white;">Temukan Semua Info yang Anda butuhkan <br> di Ketapang</p>
								<p><a href="{{ route('info') }}" class="btn btn-primary">Semua Info</a></p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						@foreach ($fashion as $item)
						<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url('{{ Storage::url($item->gambar) }}');">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="{{ route('fashion') }}">{{ $item->nama_kat_info }}</a></h2>
							</div>
						</div>
						@endforeach
						@foreach ($kuliner as $item)
						<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url('{{ Storage::url($item->gambar) }}');">
							<div class="text px-3 py-1">
								<h2 class="mb-0"><a href="{{ route('kuliner') }}">{{ $item->nama_kat_info }}</a></h2>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="col-md-4">
				@foreach ($wisata as $item)
				<div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url('{{ Storage::url($item->gambar) }}');">
					<div class="text px-3 py-1">
						<h2 class="mb-0"><a href="{{ route('wisata') }}">{{ $item->nama_kat_info }}</a></h2>
					</div>
				</div>
				@endforeach
				@foreach ($jasa as $item)
				<div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url('{{ Storage::url($item->gambar) }}');">
					<div class="text px-3 py-1">
						<h2 class="mb-0"><a href="{{ route('jasa') }}">{{ $item->nama_kat_info }}</a></h2>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</section>
<!-- End Info -->

<!-- Galeri Update -->
<section class="ftco-section">
	<div class="container">
		<div class="row justify-content-center mb-3 pb-3">
			<div class="col-md-12 heading-section text-center ftco-animate">
				<span class="subheading">Galeri</span>
				<h2 class="mb-4">Galeri Terbaru</h2>
				<p>Informasi Terkini Seputar Kota Ketapang</p>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="col-md-12">
			<div class="carousel-testimony owl-carousel">
				@foreach ($eventloker->take(5) as $item)
					<div class="item">
						<div class="testimony-wrap p-4 pb-5">
							<div class="product">
								<img style="height: 300px;" width="300px" class="img-fluid" src="{{ Storage::url($item->gambar) }}" />
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
				<p class="text text-center"><a href="{{ route('event-loker') }}" class="btn btn-primary">Selengkapnya</a></p>
	</div>
		
</section>
<!-- End Galeri Update -->
@endsection