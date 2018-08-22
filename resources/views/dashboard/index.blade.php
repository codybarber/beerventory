@extends('layouts.app')

@section('content')
{{-- <div class="flex-center position-ref">
    <div class="content">
        <h1>Your Inventory</h1>
        @foreach ($user_beers as $beer)
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{$beer->beer_label}}" alt="Beer label">
            <div class="card-body">
                <h4 class="card-title">{{$beer->name}}</h4>
                <h6 class="card-subtitle">{{$beer->brewery_name}}</h6>
                <p class="card-text">{{$beer->style}}</p>
                <p class="card-text">{{$beer->abv}}%</p>
                <a href="{{ url('beers/' . $beer->id) }}" class="btn btn-primary">Details</a>
            </div>
        </div>
        @endforeach
    </div>
</div> --}}
<div class="container">
    <div class="row">
        <div class="flex-center position-ref">
            <h1>Your Inventory</h1>
        </div>
    </div>
    <div class="row">
        @foreach ($user_beers as $beer)
        <div class="col-sm-3">
            <div class="card beer-card" style="width: 10rem; min-height: 300px; max-height: 300px;">
                <img class="card-img-top beer-card-image" src="{{$beer->beer_label}}" alt="Beer label" style="opacity: 0.25; filter: alpha(opacity=25); no-repeat;">
                {{-- <div class="card-img-overlay" style="color: #222222;"> --}}
                    <h4 class="card-title">{{$beer->name}}</h4>
                    <h6 class="card-subtitle">{{$beer->brewery_name}}</h6>
                    <p class="card-text">{{$beer->style}}</p>
                    <p class="card-text">{{$beer->abv}}%</p>
                    <a href="{{ url('beers/' . $beer->id) }}" class="btn btn-primary">Details</a>
                {{-- </div> --}}
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
