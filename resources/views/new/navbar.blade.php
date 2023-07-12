<!DOCTYPE html>
<html lang="en">
<head>
    <link rel=stylesheet href="{{ asset('css/navbar.css') }}" >
    <script src="https://kit.fontawesome.com/bdc1a26774.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class=navbar>
       <span style="font-weight:bold"><i class="fa-solid fa-earth-americas"> </i> ExpressNet</span>

       @if (Route::has('login'))
        @auth
            <a href= {{route('profile.edit')}} class=navbarButtons>Profile</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline-block; float: right;">
                @csrf
                <input type="submit" value='Log Out ||' class=navbarButtons >
            </form>
            <a href= '/explore' class=navbarButtons>Explore ||</a>
            <a href= '/dashboard' class=navbarButtons>Your Posts ||</a>
        @else
            <a href="{{ route('login') }}" class=navbarButtons > Log in</a>
            <a href="{{ route('register') }}" class=navbarButtons >Register || </a>
        @endauth
    @endif
    </div>
    @section('content')

    @show
</body>
</html>
