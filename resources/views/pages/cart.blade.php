@extends('layouts.dashboard')


@section('title')
    Cart
@endsection

@section('content')
<div class="container-fluid">
  <div class="page-titles">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ route('tool-all') }}">Alat</a></li>
      <li class="breadcrumb-item active"><a href="{{ route('cart') }}">Cart</a></li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
              @foreach ($carts as $cart)
                
                <img src="{{ $cart->product->galleries->first()->photos }}" alt="">

                  {{ $cart->product->name }}, {{ $cart->total }},
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
