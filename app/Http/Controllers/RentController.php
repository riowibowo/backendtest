<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class RentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $getRent = DB::table('rents')
                    ->join('customers', 'customers.id', '=', 'rents.customers_id')
                    ->join('stocks', 'stocks.id', '=', 'rents.stocks_id')
                    // ->select(DB::raw('customers.name,(stocks.rate * rents.total_day) as newPrice'))
                    ->select('customers.name','customers.telp','stocks.title','stocks.category', 'stocks.rate', 'rents.total_day',
                        DB::raw('(stocks.rate * rents.total_day) as total_price'))
                    ->get();

        return response()->json($getRent);
    }
}
