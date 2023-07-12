<!DOCTYPE html>
<html lang="en">
<head>
    <title>Explore</title>
    <link rel=stylesheet href="{{ asset('css/profile.css') }}" >
</head>
<body>
    @extends('new.navbar')
    @section('content')
        <div class=profile>

            @foreach ($posts as $post)
                <div class=post>
                    {{$post['user']}} posted <br/> <br/>

                    <div class=postContent>
                        {{$post['post']->content}}
                    </div>

                    <span class="react"  onclick="like('{{ $post['post']->id }}')" id='react-{{ $post['post']->id }}'><i class="fa-solid fa-thumbs-up"></i> <br>
                    @if ($post['isLiked']) liked @else like @endif
                </span>

                <br/>

                <span class="react" id='likes-{{ $post['post']->id }}'>
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
