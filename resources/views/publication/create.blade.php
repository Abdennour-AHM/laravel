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
    <form method="POST" action="{{route('publications.store')}}" enctype="multipart/form-data">
        @csrf
    <div class="mb-3 m-5">
        <div>
            <label class="form-label">Title</label>
            <input type="text" name="title" value="{{old('title')}}" class="form-control"/>
            @error('title')
                <div class="text-danger">
                    {{$message}}
                </div>  
            @enderror
        </div>
        <div>
            <label class="form-label">Bio</label>
            <textarea type="password" name="body" class="form-control">{{old('body')}}</textarea>
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
        <div>
            <button class="btn btn-primary my-2 w-100 center">Add</button>
        </div>
    </div>
    </form>
</x-master>

