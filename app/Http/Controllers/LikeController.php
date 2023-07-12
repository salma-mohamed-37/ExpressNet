<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\Like;
use App\Mail\LikeNotification;
use App\Models\Post;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function show($id)
    {
        $usersNames = DB::table('likes')
        ->join('users' ,'likes.user_id' ,'=','users.id')
        ->where('likes.post_id' , $id)
        ->select('users.name', 'likes.created_at')
        ->get() ;
        return view('new.likes' , ['users' => $usersNames]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store($id)
    {
        $isLiked = DB::table('likes')
            ->where('post_id', $id)
            ->where('user_id', Auth::user()->id)
            ->exists();

        if(! $isLiked)
        {
           Like::create([
                'user_id'=>Auth::user()->id,
                'post_id'=>$id
            ]);
            $this->sendNotification($id);
        }
    }

    public function sendNotification($pid)
    {
        $post = Post::find($pid);
        $user = $post->user;
        Mail::to($user)->send(new LikeNotification($user->name , $post->content , Auth::user()->name));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
