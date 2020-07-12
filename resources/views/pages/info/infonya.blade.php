@extends('layouts.app')

@section('title')
    Info Detail
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{url('frontend/images/bg_3.jpg')}}')">
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      {{-- start carousel --}}
      <div class="col-lg-6 mb-5">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="{{ Storage::url($items->gambar) }}" class="image-popup">
            <img style="font-size: 300px; width: 500px" class="d-block w-100" src="{{ Storage::url($items->gambar) }}" alt="First slide">
            </a>
          </div>
          <div class="carousel-item">
            <a href="{{ Storage::url($items->gambar) }}" class="image-popup">
              <img style="height: 400px; width: 500px" class="d-block w-100" src="{{ Storage::url($items->gambar) }}" alt="Second slide">
              </a>
          </div>
          <div class="carousel-item">
            <a href="{{ Storage::url($items->gambar) }}" class="image-popup">
              <img style="height: 400px; width: 500px" class="d-block w-100" src="{{ Storage::url($items->gambar) }}" alt="Third slide">
              </a>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </div>
      {{-- end carousel --}}
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
          <p class="font-weight-bold mb-0">Bagikan info ini :</p>
          <div id="social-links">
            <ul class="d-inline-flex list-unstyled">
              <li style="font-size: 30px;" class="mx-2"><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="social-button" id=""><span class="fa fa-facebook-official"></span></a></li>
              <li style="font-size: 30px;" class="mx-2" ><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ url()->current() }}" class="social-button" id=""><span class="fa fa-twitter"></span></a></li>
              <li style="font-size: 30px;" class="mx-2" ><a href="https://wa.me/?text={{ url()->current() }}" class="social-button" id=""><span class="fa fa-whatsapp"></span></a></li>    
            </ul>
          </div>
      </div>
    </div>
    <div class="row d-flex">
      <div class="col-lg-6 my-2">
        {!! $items->links !!}
      </div>
    </div>
  </div>
</section>
@endsection