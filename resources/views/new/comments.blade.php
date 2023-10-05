<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
    <link rel=stylesheet href="{{ asset('css/likes&comments.css') }}" >
</head>
<body>
    <div class=likesAndComments>
        <span class=title> People who commented on the post</span> <br/><br/>
        <div  id=comments>
            @foreach ($data as $comment)
            <div class=commentDetails>
                <span class=name>{{$comment->name}} </span><br/>
                {!! $comment->content !!} <br/>
                <span class=date>{{$comment->created_at}}</span> <br/>
            </div>


            @endforeach
        </div>
    </div>

</body>
</html>
