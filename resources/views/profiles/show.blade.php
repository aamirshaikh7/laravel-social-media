@extends('layouts.app')

@section('content')
    <div class="container pb-6">
        <div class="row">
            <div class="col-sm-6">
                <img class="rounded-circle" src="{{ $user->profile }}" alt="your profile" width="50" height="50">
                <h4>{{ $user->name }}</h4>
                <p cl>Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>
            <div class="col-sm-6" align="right">
                <a href="" class="btn rounded-pill btn-primary">Follow</a>
                <a href="" class="btn rounded-pill btn-secondary">Edit Profile</a>
            </div>
            <div class="col-sm-12">
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id itaque fugit, amet magnam molestiae dignissimos tenetur adipisci vero in deserunt sed, repellendus temporibus doloremque exercitationem laboriosam eaque aspernatur voluptatibus veritatis.</p>
            </div>
        </div>
    </div>

    @include('includes.timeline', ['lweets' => $user->lweets])
@endsection