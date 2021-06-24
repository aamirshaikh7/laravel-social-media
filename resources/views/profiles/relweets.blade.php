<x-app>
    @include ('includes.profile-info')

    @include('includes.timeline', ['lweets' => $lweets])
</x-app>