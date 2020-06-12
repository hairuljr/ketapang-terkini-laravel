@extends('layouts.app')

@section('title')
    Info Kuliner
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{url('frontend/images/bg_1.png')}}')">
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 mb-5 text-center">
        <ul class="product-category">
          <li><a href="{{ route('info') }}">Semua</a></li>
          <li><a href="{{ route('fashion') }}">Fashion</a></li>
          <li><a href="{{ route('kuliner') }}" class="active">Kuliner</a></li>
          <li><a href="{{ route('wisata') }}">Wisata</a></li>
          <li><a href="{{ route('jasa') }}">Jasa</a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      @foreach ($items as $item)
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="{{ route('info-detail', $item->slug) }}" class="img-prod" style="height: 250px;">
            <img width="300px" height="250px" class="img-fluid" src="{{ Storage::url($item->gambar) }}">
          </a>
          <div class="text py-3 pb-4 px-3 text-center">
            <h3><a href="{{ route('info-detail', $item->slug) }}">{{ $item->judul}}</a></h3>
          </div>
        </div>
      </div>
      @endforeach
        
    </div>

    <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          
          
        </div>
      </div>
    </div>
  </div>
</section>
@endsection