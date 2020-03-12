<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Validation\Rule;
use App\Book;
use App\Category;
use SebastianBergmann\Environment\Console;
use Redirect;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = new Book;

        $books=DB::table('books')
                ->select('id','title', 'auther','price','quantity','avaliable')
                ->get();

        return view('showBooks', ['books'=>$books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('addBook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'auther' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' =>'required|image|mimes:jpeg,png,jpg,svg',
        ]);

        $categories = new Category;

        $categories=DB::table('categories')
                    ->select('id')
                    ->where('name', '=', $request->get('category'))
                    ->get();
        foreach($categories as $category) {
            $categoryId =  $category->id;
        }

        $imageName = time().'.'.request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $imageName);

        $book = new Book;

        $book->title = $request->title;
        $book->auther = $request->auther;
        $book->categorie_id = 1;
        $book->price = $request->price;
        $book->quantity = $request->quantity;
        $book->avaliable = $request->quantity;
        $book->image = $imageName;

        $book->save();

        return back();
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
        DB::table('books')
            ->where('id', '=', $id)
            ->delete();

        // return Redirect::to('books');
    }
}
