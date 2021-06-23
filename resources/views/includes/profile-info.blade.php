<div class="container pl-5">
    <div class="row">
        <div class="col-sm-6">
            <img class="rounded-circle" src="{{ $user->profile }}" alt="your profile" width="60" height="60">
            <h4>{{ $user->name }}</h4>
            <p cl>Joined {{ $user->created_at->diffForHumans() }}</p>
        </div>
        <div class="col-sm-6" align="right">
            @if (! auth()->user()->authorizeProfile($user))
                <form method="POST" action="{{ route('follow.store', $user) }}">
                    @csrf
                    
                    <button href="" type="submit" class="btn rounded-pill btn-primary">
                        {{ auth()->user()->isFollowing($user) ? 'Unfollow' : 'Follow' }}
                    </button>
                </form>
            @endif
            
            @if (auth()->user()->authorizeProfile($user))
                <a href="{{ route('profiles.edit', $user) }}" class="btn rounded-pill btn-secondary">Edit Profile</a>
            @endif
        </div>
        <div class="col-sm-12">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Id itaque fugit, amet magnam molestiae dignissimos tenetur adipisci vero in deserunt sed, repellendus temporibus doloremque exercitationem laboriosam eaque aspernatur voluptatibus veritatis.</p>
        </div>
    </div>
</div>

<div class="card mb-4 mt-2">
    <div class="card-body">
        <ul class="nav nav-pills nav-fill">
            <li class="nav-item">
              <a class="nav-link {{ Request::path() === 'profiles/' . $user->username ? 'active' : '' }}" href="{{ route('profiles.show', $user) }}">Timeline</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Relweets</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::path() === 'profiles/' . $user->username . '/likes' ? 'active' : '' }}" href="{{ route('likes.index', $user) }}">Likes</a>
              </li>
        </ul>
    </div>
</div>