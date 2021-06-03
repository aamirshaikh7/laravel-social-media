<div class="p-5 list-group">
    <h1 class="display-5 text-start">Following</h1>
    @auth
        @forelse (auth()->user()->follows as $following)
        <a href="{{ route('profiles.show', $following) }}" class="list-group-item list-group-item-action" href="#">
            <img class="rounded-circle" src="{{ $following->profile }}" alt="">
            <h4 class="card-title">{{ $following->name }}</h4>
        </a>
        @empty
            <p>You are not following anyone at this moment</p>
        @endforelse
    @endauth
</div>