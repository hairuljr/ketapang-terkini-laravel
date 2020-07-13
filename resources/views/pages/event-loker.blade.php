@extends('layouts.app')

@section('title')
    Event & Loker
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{url('frontend/images/bg_3.jpg')}}')"></div>

<section class="ftco-section testimony-section">
  <div class="container">
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Event</span>
        <h3 class="mb-4">
          Info Event Terbaru<br />
          yang ada di Ketapang
        </h3>
      </div>
    </div>
    <div class="row ftco-animate" id="galley">
      @forelse ($event as $item)
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="#galley" class="img-prod" style="height: 250px;">
            <img width="300px" class="img-fluid" src="{{ Storage::url($item->gambar) }}">
            <div class="text py-3 pb-4 px-3 text-center">
              <h3>{{ $item->judul }}</h3>
            </div>
          </a>
        </div>
      </div>
      @empty
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="#" class="img-prod" style="height: 250px;">
            <img width="300px" class="img-fluid" src="{{ url('frontend/images/default-thumbnail.jpg') }}">
            <div class="text py-3 pb-4 px-3 text-center">
              <h3>Info Event lagi gada nih</h3>
            </div>
          </a>
        </div>
      </div>
      @endforelse     
    </div>

    {{-- START LOKER --}}
    <div class="row justify-content-center mb-5 pb-3">
      <div class="col-md-7 heading-section ftco-animate text-center">
        <span class="subheading">Loker</span>
        <h3 class="mb-4">
          Info Loker Terbaru<br />
          yang ada di Ketapang
        </h3>
      </div>
    </div>
    <div class="row ftco-animate" id="galley">
      @forelse ($loker as $item)
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="#galley" class="img-prod" style="height: 250px;">
            <img width="300px" class="img-fluid" src="{{ Storage::url($item->gambar) }}">
            <div class="text py-3 pb-4 px-3 text-center">
              <h3>{{ $item->judul }}</h3>
            </div>
          </a>
        </div>
      </div>
      @empty
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="#" class="img-prod" style="height: 250px;">
            <img width="300px" class="img-fluid" src="{{ url('frontend/images/default-thumbnail.jpg') }}">
            <div class="text py-3 pb-4 px-3 text-center">
              <h3>Info Loker lagi gada nih</h3>
            </div>
          </a>
        </div>
      </div>
      @endforelse     
    </div>

    <div class="row mt-5">
      <div class="col text-center">
        <div class="block-27">
          <ul>
            <li class="mx-1">{{ $items->links() }}</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection