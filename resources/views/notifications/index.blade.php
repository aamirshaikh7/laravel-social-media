@include('includes.cover')
<x-app>
    <div class="p-5">
        <h1 class="display-5 text-start">Notifications</h1>
        <ul class="notifications" style="list-style-type: none; padding: 0; margin:0">
			@forelse ($notifications as $notification)
				<li class="notification">
					<div class="alert alert-dark" role="alert">
						<div class="media">
							<div class="media-left">
								<div class="media-object">
									<img src="{{ $notification->data['user']['profile'] }}" class="img-circle" alt="Profile" width="60" height="60">
								</div>
							</div>
							<div class="media-body" style="padding-left: 10px">
									<strong class="notification-title"><a href="profiles/{{ $notification->data['user']['username'] }}">{{ $notification->data['user']['username'] }}</a>
										@if ($notification->type === 'App\Notifications\Followed') followed you</strong>@endif
								<div class="notification-meta">
									<small class="timestamp">{{ $notification->created_at->diffForHumans() }}</small>
								</div>
							</div>
						</div>
					</div>
				</li>
			@empty
				<p>No Notifications</p>
			@endforelse
      	</ul>
    </div>
</x-app>