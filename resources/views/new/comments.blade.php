<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
    <link rel=stylesheet href="{{ asset('css/likes&comments.css') }}" >
</head>
<body>
    <div class=likesAndComments>
        <div class=title>
            <span> Total comments are <span style="color:black">{{$total}} </span>comments</span> <br/>
            <span>The comments on the post </span>
        </div>
        <div  id=comments>
            @foreach ($comments as $comment)
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
