@extends('layouts.app')

@section('content')
<div class="flex-center position-ref">
    <div class="content">
        <ul class="list-unstyled links">
            @foreach ($beers as $beer)
            <li class="links">
                <a href="{{ url('beers/' . $beer->id) }}">{{$beer->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
