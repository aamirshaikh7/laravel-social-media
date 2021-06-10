<div class="p-5 list-group">
    <h1 class="display-5 text-start">Following</h1>
    @auth
        @forelse (auth()->user()->follows as $following)
            <a href="{{ $following->profilePath() }}" class="list-group-item list-group-item-action" href="#">
                <img class="rounded-circle" src="{{ $following->profile }}" alt="profile" width="50" height="50">
                <h4 class="card-title">{{ $following->name }}</h4>
            </a>
        @empty
            <a class="list-group-item list-group-item-action user-select-none">
                <h4 class="lead card-title">You are not following anyone at this moment !</h4>
            </a>
        @endforelse
    @endauth
</div>