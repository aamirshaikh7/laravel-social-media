<div class="p-5 list-group">
    <a class="list-group-item list-group-item-action" href="{{ route('home') }}">Home</a>
    <a class="list-group-item list-group-item-action" href="#">Notifications</a>
    <a class="list-group-item list-group-item-action" href="{{ route('explore.index') }}">Explore</a>
    <a class="list-group-item list-group-item-action" href="{{ route('profiles.show', auth()->user()) }}">Profile</a>
    <a class="list-group-item list-group-item-action" href="#">More</a>
    <form method="POST" action="/logout">
        @csrf

        <button class="list-group-item list-group-item-action" type="submit">Logout</button>
    </form>
</div>
