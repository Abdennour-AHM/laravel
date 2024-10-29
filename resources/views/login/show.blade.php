<x-master title="create">
    <div class="container w-75 my-2 bg-light p-5">
    <h2>Login :</h2>
    <form method="POST" action="{{route('login')}}">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" id="email" name="email" value="{{old('email')}}" class="form-control"/>
            @error('email')
               <span class="text-danger">{{$message}}</span> 
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control"/>
        </div>
       
        <div  class="d-grid">
            <button class="btn btn-primary my-2 w-100 center">Login</button>
        </div>
    
    </form>
</div>
</x-master>

