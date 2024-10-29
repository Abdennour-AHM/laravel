<div class="card bg-light m-2">
    <div class="card-body">
        
        @can('update', $publication)
            <a class="btn btn-primary float-end btn-sm" href="{{route('publications.edit',$publication->id)}}">Edit</a>  
        @endcan
        @can('delete', $publication)
            <form method="POST" action="{{route('publications.destroy',$publication->id)}}">
                @csrf
                @method("delete")
                <button onclick="return confirm('Are you sure you want to delete this publication?')" class="btn btn-danger btn-sm float-end mx-2">Delete</button>
            </form>
        @endcan
      

        <blockquote class="blockquote mb-0">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-md-4">
                        <div class="position-relative">
                            <img src="{{asset('storage/'.$publication->profile->image)}}" alt="">
                            <p>{{$publication->profile->name}}</p>

                            <a href="{{route('profiles.show',$publication->profile->id )}}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <p>{{$publication->title}}</p>
            <p>{{$publication->body}}</p>
            <footer class="blockquote-footer">
                <image src={{asset('storage/'.$publication->image)}} />
            </footer>
        </blockquote>
    </div>
</div>
