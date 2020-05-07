<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Customer;
use DB;

class CustomerController extends Controller
{
    public function index(Request $request)

    {
         $getData = Customer::OrderBy("id", "DESC")->get();

            $out = [
                "message" => "Berhasil",
                "code"    => 200,
                "result"  => [
                    'data' => $getData
                
                ]
                
            ];
           
        return response()->json($out, $out['code']);

    }

  
}
