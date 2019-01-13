@extends('layouts.app')

@section('content')
<div class="flex-center position-ref">
    <div class="content">
        <beer-component untappd_token="{{ $user_info[0]->untappdtoken }}"></beer-component>
    </div>
</div>
@endsection

