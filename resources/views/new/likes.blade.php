<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Likes</title>
    <link rel=stylesheet href="{{ asset('css/profile.css') }}" >
</head>
<body>
    <div class=profile>
        <h1 style="color :  #cc0099"> People who liked the post</h1>
        <div style="font-size: larger;" id=likes>
            @foreach ($users as $user)
                {{$user->name}} <span style="float: right;">{{$user->created_at}}</span><br/>
            @endforeach
        </div>
    </div>
</body>
</html>
