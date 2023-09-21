<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}" />
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}" />
    <title>Login</title>
</head>
<body>
    <div class=container>
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email Address -->
            <div>
                <label for="email">Email</label> <br/>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus  autocomplete="username" />
                @if ($errors->has('email'))
                    <p class="errorMessage">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <!-- Password -->
            <div>
                <label for="password">Password </label> <br/>
                <input id="password" type="password" name="password" value="{{ old('password') }}"required autocomplete="current-password" />
                @if ($errors->has('password'))
                    <p class="errorMessage">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <!-- Remember Me -->
            <div>
                <label for="remember_me">
                <input id="remember_me" type="checkbox"name="remember">
                <span>Remeber me</span>
                </label>
            </div>

            <div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}">Forget your password ?</a>
                @endif

                <input type="submit" value="Log in" />
            </div>
        </form>
    </div>
</body>
</html>
