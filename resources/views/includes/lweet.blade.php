<div class="card border rounded mb-2">
    <div class="card-body">
        <img src="https://i.pravatar.cc/50?u={{ $lweet->user->email }}" alt="">
        <h4 class="card-title">{{ $lweet->user->name }}</h4>
        <h6 class="text-muted card-subtitle mb-2">1 min ago</h6>
        <p class="card-text">{{ $lweet->body }}</p><a class="card-link" href="#" style="color: var(--bs-teal);"><i class="icon-like"></i>&nbsp;2</a><a class="card-link" href="#" style="color: var(--bs-primary);"><i class="icon-dislike"></i>&nbsp;0</a>
    </div>
</div>