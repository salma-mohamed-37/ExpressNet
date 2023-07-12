<!DOCTYPE html>
<html lang="en">
<head>
    <title>Profile</title>
    <link rel=stylesheet href="{{ asset('css/profile.css') }}" >

</head>
<body>
    @extends('new.navbar')
    @section('content')

    <div class=profile>
        Hello {{auth()->user()->name}}  <br/> <br/>
        <form method=POST action=add />
        @csrf
            <textarea placeholder="Enter your post here" rows=3 name=content></textarea>
            <input type=submit value="POST" class=profButton />
        </form>
       <br/> Your Posts <br/>

        @foreach ($postData as $post)
            <div class=post>
                {{$post['user']}} posted
                <form method =GET action="delete/{{ $post['post']->id }}" style="float:right;">
                    <input type=submit value="DELETE" class=profButton />
                </form>
                <br/> <br/>

                <div class=postContent >
                    {{$post['post']->content}}
                </div>

                <span class="react"  onclick="like('{{ $post['post']->id }}')" id='react-{{ $post['post']->id }}'><i class="fa-solid fa-thumbs-up"></i> <br>
                    @if ($post['isLiked']) liked @else like @endif
                </span>
                <br/>

                <span class="react" id='likes-{{ $post['post']->id }}'  >
                     {{ $post['likes']}} Likes
                </span>
                <br/>

                <span>
                    <a href="/likes/{{ $post['post']->id }}" class="react"> view likes</a>
                </span>

                <br/>

                <span>
                    <input type=text name=comment id='comment-{{ $post['post']->id }}'/>
                    <input type=button class=profButton value="COMMENT" onclick="comment('{{$post['post']->id}}' )" />
                </span>

                <br/>

                <span>
                    <a href="/comments/{{ $post['post']->id }}" class="react"> view Comments</a>
                </span>
            </div>
        @endforeach
    </div>

    <script src={{ asset('js/ajax.js') }} ></script>
    @endsection

</body>
</html>
