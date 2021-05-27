@extends('layouts.app')

@section('content')
<div class="row" id="body">
    <div class="col-sm-12 col-lg-3">
        <section>
            <div class="container">
                @include ('includes.sidebar-links')
            </div>
        </section>
    </div>

    <div class="col-sm-12 col-lg-6">
        <section>
            <div class="container">
                <div class="p-5">
                    @include ('includes.publish')
                </div>
                <div>
                    @include ('includes.lweet')
                </div>
            </div>
        </section>
    </div>

    <div class="col-sm-12 col-lg-3">
        <section>
            <div class="container">
                @include ('includes.friends-list')
            </div>
        </section>
    </div>
</div>
@endsection
