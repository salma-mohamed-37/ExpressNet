<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($id , $content)
    {
        $decodedContent = urldecode($content);
        Comment::create([
            'user_id'=> Auth::id(),
            'content' => nl2br($decodedContent),
            'post_id' => $id

        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DB::table('comments')
        ->join('users' ,'comments.user_id' ,'=','users.id')
        ->where('comments.post_id' , $id)
        ->select('users.name','comments.content','comments.created_at')
        ->get() ;
        return view('new.comments' , ['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
