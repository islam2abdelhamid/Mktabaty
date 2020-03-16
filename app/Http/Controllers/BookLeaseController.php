<?php

namespace App\Http\Controllers;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BookLeaseController extends Controller
{
    //
    public static function getDataForChart(){
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
        // dd($chartData);
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
}
