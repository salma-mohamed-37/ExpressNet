<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function viewMainPage()
    {
        $posts = Post::where('user_id',Auth::id())
        ->orderBy('created_at','desc')
        ->get();
        $postsData= $this->getPosts($posts);
        return view('new.profile' , ['postData' => $postsData]);
    }

    public function explore()
    {
        $posts = Post::with('user')
        ->where('user_id' ,'!=' , Auth::id())
        ->orderby('created_at','desc')->get();
        $postsData= $this->getPosts($posts);
        return view('new.explore', ['posts' => $postsData]);
    }

    public function getPosts($posts)
    {
        $postsData = [];

        foreach ($posts as $post)
        {
            $isLiked = DB::table('likes')
            ->where('post_id', $post->id)
            ->where('user_id', Auth::id())
            ->exists();

            $likes = DB::table('likes')
            ->where('post_id', $post->id)
            ->count();

            $postsData[] =
            [
                'user' => $post->user->name,
                'post' => $post,
                'isLiked'=> $isLiked,
                'likes' => $likes,
            ];
        }
        return $postsData ;
    }


    public function store(Request $request)
    {
        Post::create([
            'content'=> $request->content,
            'user_id' => Auth::user()->id

        ]);

        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return redirect()->route('dashboard');
    }
}
