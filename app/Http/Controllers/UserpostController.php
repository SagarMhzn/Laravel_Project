<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Userpost;
use App\Models\User;


class UserpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("user.form");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        //
        $post = new Userpost();
        $user = User::find($user_id);
        $user_name = $user->name;
        $post->name = $user_name;
        $post->title = $request->title;
        $post->user_id = $user_id;
        $post->user_post = $request->user_post;
        $file_name = $request->file('image')->getClientOriginalName();
        $post->image = "image/".$file_name;
        $post->save();
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $post = Userpost::find($id);
        $post->title = $request->title;
        $post->user_post = $request->user_post;
        $file_name = $request->file('image')->getClientOriginalName();
        $post->image = "image/".$file_name;
        $post->save();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Userpost::destroy($id);
        return redirect()->route('home');
    }

    public function showProfile($user_id){
        $userPosts = Userpost::all();
        // dd($userPosts);
        return view('userprofile', compact('userPosts', 'user_id'));
    }
}
