@extends('layouts.app')

@include('cover')

@section('content')
    <div class="p-5">
        @include ('includes.publish')
    </div>
    <div>
        @foreach ($lweets as $lweet)
            @include ('includes.lweet')
        @endforeach
    </div>
@endsection
