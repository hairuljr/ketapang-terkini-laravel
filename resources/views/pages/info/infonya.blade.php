@extends('layouts.app')

@section('title')
    Info Detail
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{url('frontend/images/bg_1.png')}}')">
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 ftco-animate">
        <a href="{{ Storage::url($items->gambar) }}" class="image-popup">
          <img style="height: 400px; width: 500px" src="{{ Storage::url($items->gambar) }}" class="img-fluid img-thumbnail" />
        </a>
      </div>
      <div class="col-lg-6 product-details pl-md-3 ftco-animate">
        <h3>{{ $items->judul }}</h3>
        <div class="rating d-flex">
          <p class="text-left mr-2">
            <a href="#" class="mr-2">{{ $items->rating }}.0</a>
            <?php
            for ($x = 1; $x <= $items->rating; $x++) {
              echo '<a class="mr-1" href="#"><span class="ion-ios-star"></span></a>';
            }
            for ($x = 1; $x <= 5 - $items->rating; $x++) {
              echo '<a class="mr-1" href="#"><span class="ion-ios-star-outline"></span></a>';
            }
            ?>
          </p>
          <p class="text-left mr-4">
            <a href="#" class="mr-2" style="color: #000;">{{ $items->jml_rating }}<span style="color: #bbb;"> Rating</span></a>
          </p>
        </div>
        <p>
          {{ $items->keterangan }}
        </p>
        <p>
          <a href="{{ url('info')}}" class="btn btn-primary py-2 px-3">Kembali</a>
        </p>
        {!! $items->links !!}
      </div>
    </div>
  </div>
</section>
@endsection