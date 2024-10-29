<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <li class="nav-item">
                <a class="nav-link" href="{{ route('homepage') }}">Home Page</a>
            </li>

            @guest
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login.show') }}">Login</a>
              </li>
            @endguest

            <li class="nav-item">
                <a class="nav-link" href="{{ route('profiles.index') }}">All Profiles</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('settings.index') }}">My details</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('profiles.create') }}">Add profile</a>
            </li>

            @auth
                <li class="nav-item">
                <a class="nav-link" href="{{ route('publications.create') }}">Add publication</a>
            </li>
            @endauth
            
        </ul>
        
        @auth
          <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  {{auth()->user()->email}}
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="{{ route('login.logout') }}">Logout</a>
              </div>
          </div>
        @endauth
    </div>
</nav>
