<x-app>
    <div class="container pl-5">
        <h2 class="text-capitalize pb-4">Edit profile</h2>
        <div class="row">
            <div class="col-lg-8">
                <form class="pt-2" method="POST" action="{{ $user->profilePath() }}">
                    @csrf
                    @method ('PATCH')
                    
                    <div class="form-group">
                        <input value="{{ $user->username }}" class="border rounded border-dark form-control" type="text" name="username" placeholder="Username" style="background: rgba(255,255,255,0);" />
                        
                        @error ('username')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input value="{{ $user->name }}" class="border rounded border-dark form-control" type="text" name="name" placeholder="Name" style="background: rgba(255,255,255,0);" />
                        
                        @error ('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input value="{{ $user->email }}" class="border rounded border-dark form-control" type="email" name="email" placeholder="E-mail" style="background: rgba(255,255,255,0);" />
                        
                        @error ('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="border rounded border-dark form-control" type="password" name="password" placeholder="Password" style="background: rgba(255,255,255,0);" />
                        
                        @error ('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="border rounded border-dark form-control" type="password" name="password_confirmation" placeholder="Confirm Password" style="background: rgba(255,255,255,0);" />
                        
                        @error ('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary text-light" type="submit">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>