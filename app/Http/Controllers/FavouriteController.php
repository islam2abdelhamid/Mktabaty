<?php

namespace App\Http\Controllers;

use App\Book;
use App\Category;
use App\Favorites;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FavouriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $favourites = Favorites::where('user_id', Auth::id())->pluck('book_id')->toArray();
        $books = Book::all();
        $rates = DB::table('comments')->select(DB::raw('avg(rate)as avg,book_id,comment'))
            ->where('rate', '!=', 0)
            ->groupBy('book_id', 'comment')->get();
        // dd($rates);

        return view("mktabaty/pages/books/favorites", compact('favourites', 'books', 'rates'));        // "RatedBooks" => DB::table('comments')


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
        
        $favourite = new Favorites();
        $favourite->book_id = $request->book_id;
        $favourite->user_id = Auth::id();
        $message = 'Add book to your Favourites';
        $favourite->save();
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
        //
    }
}
