@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="flex-center position-ref">
            <h1>Your Beerventory</h1>
        </div>
    </div>
    <div class="row beerventory-page">
        @foreach ($user_beers as $beer)
    
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
            <a href="{{ url('beers/' . $beer->id) }}">
                <div class="beer-card row" style="">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-4">
                                <img class="beer-card-image" height="75px" weight="75px" src="{{$beer->beer_label}}" alt="Beer label" style="">
                            </div>
                            <div class="col-8">
                                <h6 class="">{{$beer->name}}</h6>
                                <span class="">{{$beer->brewery_name}}</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <p class="">{{$beer->style}}</p>
                                <p class="">{{$beer->abv}}%</p>
                            </div>
                            <div class="col-6 text-center">
                                <p class="">Quantity</p>
                                <p class="">{{$beer->quantity}}</p>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-12">
                                <a href="{{ url('beers/' . $beer->id) }}" class="btn btn-primary btn-block">Details</a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection
