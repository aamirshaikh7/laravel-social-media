<div class="card border rounded mb-2">
    <div class="card-body">
        <a href="{{ $lweet->user->profilePath() }}">
            <img class="rounded-circle" src="{{ $lweet->user->profile }}" alt="profile" width="50" height="50">
            <h4 class="card-title">{{ $lweet->user->name }}</h4>
        </a>
        <h6 class="text-muted card-subtitle mb-2">{{ $lweet->created_at->diffForHumans() }}</h6>
        <p class="card-text">{{ $lweet->body }}</p><a class="card-link" href="#" style="color: var(--bs-teal);"><i class="icon-like"></i>&nbsp;2</a><a class="card-link" href="#" style="color: var(--bs-primary);"><i class="icon-dislike"></i>&nbsp;0</a>
    </div>
</div>