<?php

namespace App\Http\Controllers\Circle;

use App\Comment;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
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
        $parent_id = $_GET['parent_id'];
        $biji_id = $_GET['biji_id'];
        $user_id = $_GET['user_id'];
        $content = $_GET['content'];
        \DB::table('comments')->insert([
            "parent_id" => $parent_id,
            "user_id" =>$user_id,
            "biji_id" => $biji_id,
            "comments" => $content,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);
        $users = User::select('name')->where('id',$user_id)->first();
        return response()->json(array(
                'comments' => Comment::where('biji_id',$_GET['biji_id'])->get(),
                'users' => $users->name
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }
}
