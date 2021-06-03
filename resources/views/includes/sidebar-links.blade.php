<div class="p-5 list-group">
    <a class="list-group-item list-group-item-action" href="{{ route('home') }}">Home</a>
    <a class="list-group-item list-group-item-action" href="#">Notifications</a>
    <a class="list-group-item list-group-item-action" href="#">Messages</a>
    <a class="list-group-item list-group-item-action" href="#">Explore</a>
    <a class="list-group-item list-group-item-action" href="{{ route('profiles.show', auth()->user()) }}">Profile</a>
    <a class="list-group-item list-group-item-action" href="#">More</a>
</div>
