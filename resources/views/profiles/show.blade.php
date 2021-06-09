<x-app>
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

    @include('includes.timeline', ['lweets' => $user->lweets])
</x-app>