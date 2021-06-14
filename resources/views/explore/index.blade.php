@include('includes.cover')
<x-app>
    <div class="container pl-5">
        <h1 class="display-5">Explore</h1>
        @foreach ($users as $user)
            <a href="{{ $user->profilePath() }}" class="list-group-item list-group-item-action" href="#">
                <img class="rounded-circle" src="{{ $user->profile }}" alt="profile" width="50" height="50">
                <h4 class="card-title">{{ $user->name }}</h4>
            </a>
        @endforeach
    </div>
</x-app>