<div class="col-sm-4">
    <div class="card m-1">
        <img class="card-img-top" src="{{asset('storage/'.$profile->image)}}" alt="Card image cap" />
        <div class="card-body">
            <h4 class="card-title">{{ $profile->name }}</h4>
            <p class="card-text">{{ $profile->email }}</p>
        </div>
        <a href="{{route('profiles.show',$profile->id )}}" class="stretched-link"></a>

        <div class="card-foot border-top py-3 px-3 bg-light" style="z-index: 9">
            <form action="{{route('profiles.destroy',$profile->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm float-end">Delete</button>
            </form>
            <form action="{{route('profiles.edit',$profile->id)}}" method="GET">
                @csrf
                <button class="btn btn-primary btn-sm float-end mx-2">Update</button>
            </form>
        </div>

    </div>
  
</div>
