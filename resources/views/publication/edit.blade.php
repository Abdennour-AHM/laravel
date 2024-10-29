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
    <form method="post" action="{{route('publications.update',$publication->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    <div class="mb-3 m-5">
        <div>
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{old('title',$publication->title)}}" class="form-control"/>
            @error('title')
                <div class="text-danger">
                    {{$message}}
                </div>  
            @enderror
        </div>
        <div>
            <label class="form-label">Bio</label>
            <textarea type="password" name="body" class="form-control">{{old('body',$publication->body)}}</textarea>
            @error('body')
                <div class="text-danger">
                    {{$message}}
                </div>  
            @enderror
        </div>
        <div>
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control"/>
        </div>
        <div class="m-2">
            <image src={{asset('storage/'.$publication->image)}} />
        </div>
        <div>
            <button class="btn btn-primary my-2 w-100 center">Update</button>
        </div>
    </div>
    </form>
</x-master>

