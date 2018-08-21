@extends('layouts.app')

@section('content')
<div class="flex-center position-ref">
    <div class="content">
        <a href="{{ url()->previous() }}">Go back to Dashboard</a>
        <h1>{{ $beer->name }}</h1>
        <h2>{{ $beer->brewery_name }}</h2>
        <h3>{{ $beer->abv }}% abv</h3>
    </div>
</div>
@endsection
