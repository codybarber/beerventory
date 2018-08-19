@extends('layouts.app')

@section('content')
<div class="flex-center position-ref">
    <div class="content">
        <h1>Your Collection</h1>
        <ul class="list-unstyled">
            @foreach ($user_beers as $beer)
            <li class="links">
                <a href="{{ url('beers/' . $beer->id) }}">{{$beer->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
