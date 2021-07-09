<div class="card border rounded mb-2">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-10">
                <a href="{{ $lweet->user->profilePath() }}">
                    <img class="rounded-circle" src="{{ $lweet->user->profile }}" alt="profile" width="50" height="50">
                    <h4 class="card-title">{{ $lweet->user->name }}</h4>
                </a>
                <h6 class="text-muted card-subtitle mb-2">{{ $lweet->created_at->diffForHumans() }}</h6>
                <p class="card-text">
                    @if ($lweet->matchMention())
                        <a href="/profiles/{{ $lweet->stripString() }}">{{ $lweet->body }}</a>
                    @else
                        {{ $lweet->body }}
                    @endif
                </p>
            </div>
            @if ($lweet->user->is(auth()->user()))
                <div class="col-sm-2">
                    <a href="{{ route('lweets.edit', $lweet) }}" class="pr-2 btn">
                        <svg class="text-primary" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-pencil" style="color: rgb(0,0,0);">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4"></path>
                            <line x1="13.5" y1="6.5" x2="17.5" y2="10.5"></line>
                        </svg>
                    </a>
                    <a href="" class="btn">
                        <svg class="text-danger" xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-trash" style="color: rgb(0,0,0);">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="4" y1="7" x2="20" y2="7"></line>
                            <line x1="10" y1="11" x2="10" y2="17"></line>
                            <line x1="14" y1="11" x2="14" y2="17"></line>
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                        </svg>
                    </a>
                </div>
            @endif
            @if ($lweet->image)
                <div class="pb-3">
                    <img class="rounded img-fluid border" src="{{ $lweet->image }}" />
                </div>
            @endif
        </div>
        <div style="justify-content: space-between;display: flex;">
            <form method="POST" action="{{ route('lweets.relweet.store', $lweet) }}">
                @csrf
                
                <button type="submit" class="btn @if ($lweet->isRelweetedBy(auth()->user())) text-primary @else text-dark @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-repeat">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M4 12v-3a3 3 0 0 1 3 -3h13m-3 -3l3 3l-3 3"></path>
                        <path d="M20 12v3a3 3 0 0 1 -3 3h-13m3 3l-3-3l3-3"></path>
                    </svg> @if ($lweet->relweets) {{ $lweet->relweets }} @else 0 @endif
                </button>
            </form>

            <form method="POST" action="{{ route('lweets.like.store', $lweet) }}">
                @csrf
                
                <button type="submit" class="btn @if ($lweet->isLikedBy(auth()->user())) text-danger @endif">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-heart">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M19.5 13.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
                    </svg> @if ($lweet->likes) {{ $lweet->likes }} @else 0 @endif
                </button>
            </form>
        </div>
    </div>
</div>