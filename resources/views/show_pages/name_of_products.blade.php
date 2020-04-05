@extends('main')

@section('title')

    buy products


@endsection

@section('styles')

    <style>

        #main , .custom_2{


            width : 70%;
            margin : 50px auto;

        }
        .custom{

            margin-bottom : 50px;


        }
        .form-group{

            margin : 20px 0px;


        }

    </style>


@endsection

@section('main')

@php

    use App\Product;

    $ids = [];

    if(session()->has('cart')){

    foreach (session('cart') as $key => $value) {

        array_push($ids , Product::find($value));

    }

}

@endphp

@if(session()->has('success_message'))
    <div class="alert alert-success custom_2 text-center">

        {{session('success_message')}}

    </div>
@endif

<div id="main">

    <form action="{{route('mail')}}" method="post">

        @csrf

        <h2 class="text-center custom">buy products</h2>

        <select class="custom-select">

            <option disabled selected>products you added</option>

            @if($ids)

                @foreach ($ids as $id)


                    <option value="{{$id->id}}">{{$id->name}}</option>



                @endforeach

            @endif



        </select>

        <div class="form-group">

            <label for="name">name</label>
            <input type="text" name="name" id="name" placeholder="name" class="form-control">

        </div>

        <div class="form-group">

            <label for="email">email</label>
            <input type="text" name="email" id="email" placeholder="name" class="form-control">

        </div>

        <div class="form-group">

            <input type="submit" value="buy" class="btn btn-lg btn-primary">

        </div>

    </form>


</div>

@endsection
