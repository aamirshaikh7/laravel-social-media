<div class="p-5 list-group">
    <a class="list-group-item list-group-item-action {{ Request::path() === 'lweets' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
    <a class="list-group-item list-group-item-action {{ Request::path() === 'notifications' ? 'active' : '' }}" href="#">Notifications</a>
    <a class="list-group-item list-group-item-action {{ Request::path() === 'explore' ? 'active' : '' }}" href="{{ route('explore.index') }}">Explore</a>
    <a class="list-group-item list-group-item-action {{ Request::path() === 'profiles/' . auth()->user()->username ? 'active' : '' }}" href="{{ route('profiles.show', auth()->user()) }}">Profile</a>
    <form method="POST" action="/logout">
        @csrf

        <button class="list-group-item list-group-item-action" type="submit">Logout</button>
    </form>
</div>
