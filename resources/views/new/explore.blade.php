<!DOCTYPE html>
<html lang="en">
<head>
    <title>Explore</title>
    <link rel=stylesheet href="{{ asset('css/profile.css') }}" >
    <script src="https://kit.fontawesome.com/bdc1a26774.js" crossorigin="anonymous"></script>
</head>
<body>
    @extends('new.navbar')
    @section('content')
        <main class=profile>
         @foreach ($posts as $post)
        <div class=post>
            <div class=title>
                {{$post['user']}} posted
            </div>
            <br/><br/>

            <div class=postContent>{!! $post['post']->content !!}</div>

            <div class="react-container">
                <p class="react">
                    <span onclick="like('{{ $post['post']->id }}')"> <i class="fa-solid fa-thumbs-up"></i> <br/><span  id='like-{{ $post['post']->id }}'> @if ($post['isLiked']) liked @else like @endif</span><br/></span>
                    <a href="/likes/{{ $post['post']->id }}">Likes</a>
                </p>
                <p class="react">
                    <span onclick="viewCommentBox({{ $post['post']->id }})"><i class="fa-solid fa-comment"></i> <br/>Comment</span> <br/>
                    <a href="/comments/{{ $post['post']->id }}">Comments</a>
                </p>
            </div>
            <div class="comment-container" id='comment-container-{{ $post['post']->id }}'>
                <textarea name=comment id='comment-{{ $post['post']->id }}' class="comment"></textarea>
                <input type=button class=profButton value="Comment" onclick="comment('{{$post['post']->id}}')" />
            </div>
        </div>
         @endforeach
    </main>
        <script src={{ asset('js/ajax.js') }} ></script>
        <script src={{ asset('js/profile.js') }} ></script>
    @endsection
</body>
</html>
