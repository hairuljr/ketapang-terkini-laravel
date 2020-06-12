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
            for ($x = 1; $x <= 4; $x++) {
              echo '<a class="mr-1" href="#"><span class="ion-ios-star"></span></a>';
            }
            for ($x = 1; $x <= 5 - 4; $x++) {
              echo '<a class="mr-1" href="#"><span class="ion-ios-star-outline"></span></a>';
            }
            ?>
          </p>
          <p class="text-left mr-4">
            <a href="#" class="mr-2" style="color: #000;">{{ $items->jml_rating }}> <span style="color: #bbb;">Rating</span></a>
          </p>
        </div>
        <p>
          {{ $items->keterangan }}
        </p>
        <p>
          <a href="{{ url('info')}}" class="btn btn-primary py-2 px-3">Kembali</a>
        </p>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d811.3015222689248!2d109.98536478746828!3d-1.8630586758644008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e0518246fcc8edf%3A0x452050502a61bd02!2sKeraton%20Kerajaan%20Matan%20Tanjungpura!5e1!3m2!1sid!2ssg!4v1589607923328!5m2!1sid!2ssg" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>
  </div>
</section>
@endsection