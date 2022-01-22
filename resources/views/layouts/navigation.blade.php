<nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgb(255, 92, 0);">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{Storage::url("TeatanFULL.png")}}" alt="" style="width: 35%">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">


                @if(Auth::guest())
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/register')}}" style="color: black">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/login')}}" style="color: black">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/about-us')}}" style="color: black">About Us</a>
                    </li>
                @elseif(Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false"
                                    style="border-color: transparent; background-color: transparent; color: black">
                                Manage
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ route('show-drink') }}">Manage Drink</a></li>
                                <li><a class="dropdown-item" href="{{ route('show-user')}}">Manage User</a></li>
                            </ul>
                        </div>
                    </li>

                @elseif(Auth::user()->role == 'user')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('show-item')}}" style="color: black">View Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('show-transactions')}}" style="color: black">View Transaction History</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/about-us')}}" style="color: black">About Us</a>
                    </li>
                    
                @endif

                @if(Auth::user())
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('show-profile')}}"
                           style="color: black">Hello, {{\Illuminate\Support\Facades\Auth::user()->name}}</a>
                    </li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Log Out</button>
                        </div>
                    </form>
                @endif


            </ul>
        </div>
    </div>
</nav>
