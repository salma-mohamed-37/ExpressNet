<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Likes</title>
    <link rel=stylesheet href="{{ asset('css/likes&Comments.css') }}" >
</head>
<body>
    <div class=likesAndComments>
        <span class=title> People who liked the post</span> <br/>
        <div id=likes>
            @foreach ($users as $user)
                <p class=likeDetails>
                    <span >{{$user->name}}</span>
                    <span class=date>{{$user->created_at}}</span>
                </p>
                <br/>
            @endforeach
        </div>
    </div>
</body>
</html>
