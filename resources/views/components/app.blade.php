<x-master>
    <main>
        @auth
            <div class="row" id="body">
                <div class="col-sm-12 col-lg-3">
                    <section>
                        <div class="container">
                            @include ('includes.sidebar-links')
                        </div>
                    </section>
                </div>
            
                <div class="col-sm-12 col-lg-6">
                    <section>
                        <div class="container">
                            {{ $slot }}
                        </div>
                    </section>
                </div>
            
                <div class="col-sm-12 col-lg-3">
                    <section>
                        <div class="container">
                            @include ('includes.friends-list')
                        </div>
                    </section>
                </div>
            </div>
        @endauth

        @guest
            {{ $slot }}
        @endguest
    </main>
</x-master>