@extends('layouts.app')

@section('content')
    <p>{{ $user->name }}</p>

    @include('includes.timeline', ['lweets' => $user->lweets])
@endsection