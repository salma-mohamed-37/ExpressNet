<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('css/auth.css')}}" />
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}" />
    <title>Register</title>
</head>
<body>
    <div class=container>

        <form method="POST" action="{{ route('register') }}">
            <h2 style="text-align: center;">Registration Form</h2>
            @csrf

            <!-- Name -->
            <div>
                <label for="name">Name</label> <br/>
                <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                @if ($errors->has('name'))
                    <p class="errorMessage">{{ $errors->first('name') }}</p>
                @endif
            </div>

            <!-- Email Address -->
            <div>
                <label for="email">Email</label> <br/>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                @if ($errors->has('email'))
                    <p class="errorMessage">{{ $errors->first('email') }}</p>
                @endif
            </div>

            <!-- Password -->
            <div>
                <label for="password">Password </label> <br/>
                <input id="password" type="password" name="password" value="{{ old('password') }}" required autocomplete="new-password" />
                @if ($errors->has('password'))
                    <p class="errorMessage">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation">Confirm password </label> <br/>
                <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password" />
                @if ($errors->has('password'))
                    <p class="errorMessage">{{ $errors->first('password') }}</p>
                @endif
            </div>

            <div>
                <a href="{{ route('login') }}"> Already registered?</a>
                <input type="submit" value="Register" />
            </div>
        </form>
    </div>
</body>

