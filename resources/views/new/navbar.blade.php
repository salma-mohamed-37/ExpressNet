<!DOCTYPE html>
<html lang="en">
<head>
    <link rel=stylesheet href="{{ asset('css/navbar.css') }}" >
</head>
<body>
    <div class=navbar>
       <span style="font-weight:bold">ExpressNet</span>

       @if (Route::has('login'))
        @auth
            @if (Route::is('profilePosts'))
                 <input type=button value="Profile settings" class=navbarButtons onclick="window.location.href=&quot;{{ route('profile.edit') }}&quot;" />
            @endif
            <form method="POST" action="{{ route('logout') }}" style="display: inline-block; float: right;">
                @csrf
                <input type="submit" value='Log out' class=navbarButtons />
            </form>
            <input type=button value=Explore class=navbarButtons onclick="window.location.href=&quot;{{ route('dashboard') }}&quot;"/>
            <input type=button value="Your profile" class=navbarButtons onclick="window.location.href=&quot;{{ route('profilePosts') }}&quot;"/>
        @else
            <input type=button value="Log in" class=navbarButtons onclick="window.location.href=&quot;{{ route('login') }}&quot;" />
            <input type=button value="Register" class=navbarButtons onclick="window.location.href=&quot;{{ route('register') }}&quot;"/>
        @endauth
    @endif
    </div>
    @section('content')

    @show
</body>
</html>
