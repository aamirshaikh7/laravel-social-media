@extends('layouts.app')

@include('includes.cover')

@section('content')
    <div class="p-5">
        @include ('includes.publish')
    </div>
    
    @include('includes.timeline')
@endsection
