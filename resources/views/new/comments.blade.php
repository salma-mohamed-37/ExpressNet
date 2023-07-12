<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
    <link rel=stylesheet href="{{ asset('css/profile.css') }}" >
</head>
<body>
    <div class=profile>
        <h1 style="color :  #cc0099"> People who commented on the post</h1>
        <div style="font-size: larger;" id=comments>
            @foreach ($data as $comment)
            <div class=comment>
                <b>{{$comment->name}} </b> <br/>
                {{$comment->content}} <br/>
                <span class=date>{{$comment->created_at}}</span> <br/>
            </div>
            <br/>

            @endforeach
        </div>
    </div>

</body>
</html>
