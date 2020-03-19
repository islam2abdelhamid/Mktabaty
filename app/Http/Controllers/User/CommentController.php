<?php

namespace App\Http\Controllers\User;

use App\Book;
use App\Comment as AppComment;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request, $id)
    {

        $request->validate([

            'comment' => 'required|max:255|min:20',
            'rate' => 'required',
            'book_id' => 'unique:comments'
        ]);
        $userid = Auth()->user()->id;
        $comment = $request->comment;
        $rate = $request->rate;
        $ratedat = Carbon::now();
        $book = Book::find($id);
        $message = "your comment is added successfully";
        try {
            DB::table('comments')->insert(
                ['comment' => $comment, 'rate' => $rate, 'user_id' => $userid, 'rated_at' => $ratedat, 'book_id' => $book->id]
            );
        } catch (\Illuminate\Database\QueryException $ex) {
            $message = 'You Already Commented this book';
        }



        return redirect()->back()->with('message', $message);
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
      
       $comment= DB::table('comments')->where('book_id', $id);
        // dd($comment);
        $comment->delete();
        $message = "your comment is deleted successfully";

        return redirect()->back()->with('message', $message);
    }
}
