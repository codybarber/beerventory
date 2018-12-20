@extends('layouts.app')

@section('content')
<div class="flex-center position-ref">
    <div class="content">
        <search-component untappd_token="{{ $user_info[0]->untappdtoken }}"></search-component>
    </div>
</div>
@endsection
