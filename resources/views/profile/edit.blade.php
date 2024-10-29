<x-master title="create">
    @if($errors->any())
        <x-alert type="danger">
            <h6>Errors :</h6>
            <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
            </ul>
        </x-alert>
    @endif
    <form method="POST" action="{{route('profiles.update',$profile->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
    <div class="mb-3 m-5">
        <div>
            <label class="form-label">Name</label>
            <input type="text" name="name" value="{{old('name',$profile->name)}}" class="form-control"/>
            @error('name')
                <div class="text-danger">
                    {{$message}}
                </div>  
            @enderror
        </div>
        <div>
            <label class="form-label">Email</label>
            <input type="text" name="email" value="{{old('email',$profile->email)}}" class="form-control"/>
            @error('email')
                <div class="text-danger">
                    {{$message}}
                </div>  
            @enderror
        </div>
        <div>
            <label class="form-label">Password</label>
            <input type="password" name="password" value="{{old('password')}}" class="form-control"/>
            @error('password')
                <div class="text-danger">
                    {{$message}}
                </div>  
            @enderror
            <label class="form-label">Confirm your password</label>
            <input type="password" name="password_confirmation" class="form-control"/>
        </div>
        <div>
            <label class="form-label">Bio</label>
            <textarea type="password" name="bio" class="form-control">{{old('bio',$profile->bio)}}</textarea>
            @error('bio')
                <div class="text-danger">
                    {{$message}}
                </div>  
            @enderror
        </div>
        <div>
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control"/>
        </div>
        <div>
            <button class="btn btn-primary my-2 w-100 center">Update</button>
        </div>
    </div>
    </form>
</x-master>

