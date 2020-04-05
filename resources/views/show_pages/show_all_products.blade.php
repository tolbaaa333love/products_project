@extends('main')

@section('title')

    @lang('front.products')


@endsection

@section('styles')


    <style>

        .card{

            margin: 50px auto;
            width : 70%;


        }

    </style>


@endsection

@section('main')

<div>

    @php
        $ar = 'ar';
        $en = 'en';
    @endphp

    <ol>
        <li><a href="{{route('change_locale' , $en)}}">english</a></li>
        <li><a href="{{route('change_locale' , $ar)}}">arabic</a></li>
    </ol>
</div>

<div class="text-center alert alert-primary card" style="color : white;font-size : 30px;">
    @lang('front.products')
</div>

@foreach ($products as $product)


<div class="col-lg-4">
    <div class="card" style="width: 18rem;">
        <img src="{{asset('uploads/'.$product->image)}}" class="card-img-top" alt="product_image" width="300px" height="400px">
        <div class="card-body text-center">
            <h5 class="card-title">Name</h5>
            <p class="card-text">{{$product->name}}</p>
            <h5 class="card-title">Price</h5>
            <p class="card-text">{{$product->price}} LE</p>
            <a href="{{route('session_store' , $product->id)}}" class="btn btn-primary">add to cart</a>
        </div>
    </div>
</div>


@endforeach


@endsection
