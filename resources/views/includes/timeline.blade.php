<div>
    @forelse ($lweets as $lweet)
        @include ('includes.lweet')
    @empty
        <a class="list-group-item list-group-item-action user-select-none">
            <h4 class="lead card-title">No lweets at this moment !</h4>
        </a>
    @endforelse
    <div align="center pt-2">
        {{ $lweets->links() }}
    </div>
</div>