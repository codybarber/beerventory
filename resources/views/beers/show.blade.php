@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <h1>{{ $beer->name }}</h1>
        <h2>{{ $beer->brewery }}</h2>
    </div>
</div>
@endsection
