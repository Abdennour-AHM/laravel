
<x-master title="profile details">
    <div class="container-fluid">
        <div class="row">
            <div class="card py-3 my-3">
                <img class="card-img-top w-25 mx-auto" src="{{asset('storage/'.$profile->image)}}" alt="Title" />
                <div class="card-body text-center">
                    <h4 class="card-title">#{{$profile->id}} - {{$profile->name}}</h4>
                    <h6 class="card-title">Created at : {{$profile->created_at->format('d-m-y')}}</h6>
                    <h6 class="card-title"><a href="mailto{{$profile->email}}">{{$profile->email}}</a></h6>
                    <p class="card-text">{{$profile->bio}}</p>
                </div>
            </div>
            
        </div>
        <div class="row">
            <h1>Publications:</h1>
            @foreach($profile->publications as $publication)
            <x-publication :canUpdate="Auth::user()->id === $publication->profile_id" :publication="$publication"/>
            @endforeach
        </div>
    </div>
</x-master>
