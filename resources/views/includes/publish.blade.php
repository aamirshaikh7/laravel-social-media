<h1 class="display-5">What's on your mind?</h1>
<form method="POST" action="{{ route('lweets.store') }}" enctype="multipart/form-data">
    @csrf

    <textarea name="body" class="border rounded form-control mb-1" rows="6" maxlength="500"></textarea>
    @error ('body')
        <p class="text-danger">{{ $message }}</p>
    @enderror
    <a href="{{ auth()->user()->profilePath() }}">
        <img class="rounded-circle" src="{{ auth()->user()->profile }}" alt="your profile" width="50" height="50">
    </a>
    <div class="form-group">
        <input value="{{ $user->image ?? '' }}" class="mb-2 border rounded border-dark form-control" type="file" name="image" placeholder="Add an image" style="background: rgba(255,255,255,0);" />
        
        @error ('image')
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>
    <button class="btn btn-primary border rounded-pill float-end" type="submit">Lweet it</button>
</form>