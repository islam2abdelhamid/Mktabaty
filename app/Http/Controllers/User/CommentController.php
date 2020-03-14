<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Egulias\EmailValidator\Warning\Comment;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    


        $validator = $request->validate([
            'comment' => 'required|min:20|max:255',
            'rating' => 'required',
        ]);
        // !this will be the actual userId
        $userid = Auth()->user()->id;
        $comment = $request->get('comment');
        $bookid = $request->get('book_id');
        $rating = $request->get('rate');
        DB::table('comment')->insert(
            ['comment' => $comment, 'rate' => $rating, 'user_id' => $userid, 'book_id' => $bookid]
        );

        return redirect('' . $bookid);


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
        $comment = Comment::findOrFail($id);
        if ($comment->user_id==Auth()->user()->id){
            $comment->delete();
        }
        return  Redirect::back();
    }
}
