@extends('layouts.app')

@section('title')
    Detail Event
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{url('frontend/images/bg_3.jpg')}}')">
</div>

<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 ftco-animate">
        <a href="{{ Storage::url($items->gambar) }}" class="image-popup">
          <img style="height: 500px; width: 500px" src="{{ Storage::url($items->gambar) }}" class="img-fluid img-thumbnail" />
        </a>
      </div>
      <div class="col-lg-6 product-details pl-md-3 ftco-animate">
        <h3>{{ $items->judul }}</h3>
        <p>
          {{ $items->deskripsi }}
        </p>
        {!! $items->maps !!}
          <p class="font-weight-bold mb-0">Bagikan {{ $jenis }} ini :</p>
          <div id="social-links">
            <ul class="d-inline-flex list-unstyled">
              <li style="font-size: 30px;" class="mx-2"><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="social-button" id=""><span class="fa fa-facebook-official"></span></a></li>
              <li style="font-size: 30px;" class="mx-2" ><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ url()->current() }}" class="social-button" id=""><span class="fa fa-twitter"></span></a></li>
              <li style="font-size: 30px;" class="mx-2" ><a href="https://wa.me/?text={{ url()->current() }}" class="social-button" id=""><span class="fa fa-whatsapp"></span></a></li>    
            </ul>
          </div>
      </div>
    </div>

  </div>
</section>
@endsection