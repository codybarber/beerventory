@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="flex-center position-ref">
            <h1>Your Beerventory</h1>
        </div>
    </div>
    <div class=" beerventory-page">
        @foreach ($user_beers as $beer)

        <div class="beer-card" data-beer="basement" style="background-image: url('{{ $beer->beer_label }}')">
            <div class="beer-card__overlay"></div>
            <!-- <div class="beer-card__share">
                <span class="beer-card__icon">
                    {{ $beer->abv }}% ABV
                </span>
                <span class="beer-card__icon">
                  40 IBU
                </span>
                <span class="beer-card__icon">

                </span>
            </div> -->
            <div class="beer-card__content">
                <div class="beer-card__header">
                    <h3 class="beer-card__title">{{ $beer->name }}</h3>
                    <h4 class="beer-card__info">{{ $beer->brewery_name }}</h4>
                </div>
                <p class="beer-card__desc">
                    {{ $beer->style }}<br>
                    {{ $beer->abv }}% ABV
                </p>
                <div class="text-left">
                    <h6 class="text-center">Quantity</h6>
                    <button class="btn btn-outline beer-card__button quantity-button" type="button">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button class="btn btn-outline beer-card__button" type="button">
                        {{ $beer->quantity }}
                    </button>
                    <button class="btn btn-outline beer-card__button quantity-button" type="button">
                        <i class="fas fa-plus"></i>
                    </button>
                </div>
                <div class="">
                    <a href="{{ url('beers/' . $beer->id) }}">View Beer</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
