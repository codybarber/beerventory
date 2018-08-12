@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <ul>
            @foreach ($beers as $beer)
            <li>
                <a href="{{ url('beers/' . $beer->id) }}">{{$beer->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
