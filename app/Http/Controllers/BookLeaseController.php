<?php

namespace App\Http\Controllers;
use DB;
use Auth;
use App\Book;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookLeaseController extends Controller
{
    //
    public static function getDataForChart(){
        try {
            $data = DB::table('book_lease')
                ->join('books', 'book_lease.book_id', '=', 'books.id')
                ->select('lease_at', DB::raw('price * days as price'))
                ->get();

                $firstDate = DB::table('book_lease')->select('lease_at')->first();
                $profitPerWeek = 0;
                $weekNumber = 1;
                $chartData = [];
                $lastDayOfWeek = (new Carbon($firstDate->lease_at))->addDays(6);
        
                foreach($data as $record){
                    if ($record->lease_at <= $lastDayOfWeek) {
                        $profitPerWeek+= $record->price; 
                    }else{
                        $chartData[] = ['week' =>"Week ".$weekNumber++ , 'Profit Per Week'=> $profitPerWeek];
                        $firstDate->lease_at = $lastDayOfWeek->addDays(1);
                        $lastDayOfWeek = (new Carbon($firstDate->lease_at))->addDays(7);
                        $profitPerWeek = $record->price;
                    }
                }
                $chartData[] = ['week' =>"Week ".$weekNumber , 'Profit Per Week'=> $profitPerWeek];

        } catch (\Exception $ex) {
            $chartData = " No Leased books yet ... ";
        }
        return $chartData;
    }
    public static function getWeeks(array $chartData){
        $weeks = [];
        foreach($chartData as $week){
            $weeks[] = $week["week"];
        }
        return $weeks;
    }
    public static function getProfitsPerWeek(array $chartData){
        $profits = [];
        foreach($chartData as $profit){
            $profits[] = $profit["Profit Per Week"];
        }
        return $profits;
    }

    public function makeLease(Request $request, $id){
        // request validation
        $validatedRequest = $request->validate([
            'lease_days' => 'required|numeric|between:1,5' 
        ]);
        
        $message;
        try {
            DB::beginTransaction();
            DB::table('books')
                ->where('id', $id)
                ->decrement('available');

            DB::table('book_lease')->insert(
                ['book_id' => $id, 'user_id' => Auth::user()->id , 'days' => $request->lease_days]
            );
            DB::commit();
            $message = 'Enjoy Reading';
        } catch (\Illuminate\Database\QueryException $ex) {
            $message = 'You Already leased this book';
        }
        $book = Book::find($id);
        return redirect()->route('books.show' ,['id'=> $book->id])->with('message', $message);
    }
}
