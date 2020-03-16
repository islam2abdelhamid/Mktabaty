<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Validation\Rule;
use App\Book;
use App\Category;
use SebastianBergmann\Environment\Console;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = new Book;
        // $books=DB::table('books')
        //         ->select('id','title', 'auther','price','quantity','avaliable')
        //         ->get();

        // return view('showBooks', ['books'=>$books]);
        $books = Book::all();
        return view('mktabaty.pages.books.index')->with('books', $books);

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
            // 'avaliable' => 'required',
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
        $book->categorie_id = $categoryId;
        $book->price = $request->price;
        $book->quantity = $request->quantity;
        $book->avaliable = $request->quantity;
        $book->image = $imageName;
        $book->save();

        // DB::table('books')
        //     ->where('id', $request->id)
        //     ->insert(['title' => $request->title, 'auther' => $request->auther,
        //         'categorie_id' => $categoryId, 'price' => $request->price,
        //         'quantity' => $request->quantity, 'avaliable' => $request->quantity,
        //         'image' => $imageName]);

        return back()->with('message', 'Book added successfully');
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'auther' => 'required',
            // 'categorie_id' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' =>'image|mimes:jpeg,png,jpg,svg',
        ]);

        $categories = new Category;

        $categories=DB::table('categories')
                    ->select('id')
                    ->where('name', '=', $request->get('category'))
                    ->get();
        foreach($categories as $category) {
            $categoryId =  $category->id;
        }

        if (request()->image != null) {
            $imageName = time().'.'.request()->image->getClientOriginalExtension();
            request()->image->move(public_path('images'), $imageName);
        }

        DB::table('books')
            ->where('id', $request->id)
            ->update(['title' => $request->title, 'auther' => $request->auther,
                'categorie_id' => $categoryId, 'price' => $request->price,
                'quantity' => $request->quantity, 'avaliable' => $request->avaliable]);

        return back()->with('message', 'Book updated successfully');
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

        return back()->with('message', 'Book deleted successfully');
    }
}

