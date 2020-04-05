@extends('main')


@section('title')

    form_products

@stop

@section('styles')


    <style>

        form{

            width : 90%;
            margin : 50px auto;

        }

    </style>


@endsection

@php

    session()->put('lang');

@endphp


@section('main')

<form method="POST" action="{{route('store_products')}}" enctype="multipart/form-data">
    @csrf
    <h1>form product store</h1>
      <div class="form-group">
        <label for="inputEmail4">name</label>
        <input type="text" class="form-control" name="name" id="inputEmail4" placeholder="product_name">
      </div>
      <div class="form-group">
        <label for="inputPassword4">price</label>
        <input type="text" name="price" class="form-control" id="inputPassword4" placeholder="product_price">
      </div>
    <div class="form-group">
        <label for="product_image">image</label>
        <input type="file" name="image" id="product_image" class="form-control">
    </div>
    <div class="form-group">
        <input type="submit" value="Store" class="btn btn-primary btn-lg">
    </div>
  </form>

@endsection
