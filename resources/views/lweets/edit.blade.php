<x-app>
    <div class="p-5">
        <h2 class="text-capitalize pb-4">Edit Lweet</h2>
        <div class="row">
            <div class="col-lg-8">
                <form class="pt-2" method="POST" action="{{ route('lweets.update', $lweet) }}" enctype="multipart/form-data">
                    @csrf
                    @method ('PUT')
                    
                    <div class="form-group">
                        <input value="{{ $lweet->body }}" class="border rounded border-dark form-control" type="text" name="body" placeholder="Body" style="background: rgba(255,255,255,0);" />
                        
                        @error ('body')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img class="img-fluid" width="600px" height="50px" src="{{ $lweet->image }}" alt="image">
                        <input value="{{ $lweet->image }}" class="mt-2 border rounded border-dark form-control" type="file" name="image" placeholder="Image" style="background: rgba(255,255,255,0);" />

                        @error ('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
                        <button class="btn btn-primary text-light" type="submit">
                            Update Lweet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>