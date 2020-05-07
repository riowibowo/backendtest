<?php

namespace App\Http\Controllers;
use App\Stock;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class StockController extends Controller
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
        $getStock = Stock::OrderBy("id", "DESC")->get();
 
        $out = [
            "message" => "List Stocks CD",
            "code"  => 200,
            "results" => $getStock
        ];
 
        return response()->json($out, 200);
    }

    public function store(Request $request)
    {
 
        if ($request->isMethod('post')) {
 
            $this->validate($request, [
                'title' => 'required',
                'category' => 'required',
                'rate' => 'required|integer',
                'qty' => 'required|integer'
            ]);
 
            $data = $request->all();

            // dd($request->all());
 
            $insert = Stock::create($data);
            

            if ($insert) {
                $out  = [
                    "message" => "Success Insert Data",
                    "results" => $data,
                    "code"  => 200
                ];
            } else {
                $out  = [
                    "message" => "Failed Insert Data",
                    "results" => $data,
                    "code"   => 404,
                ];
            }
 
            return response()->json($out, $out['code']);
        }
    }

    public function update(Request $request)
    {
 
        if ($request->isMethod('patch')) {
 
            $this->validate($request, [
                'id'    => 'required'
                // 'title' => 'required',
                // 'category' => 'required',
                // 'rate' => 'required|integer',
                // 'qty' => 'required|integer'
            ]);

            $id = $request->input('id');
            $title = $request->input('title');
            $category = $request->input('category');
            $rate = $request->input('rate');
            $qty = $request->input('qty');
 
            $stock = Stock::find($id);
 
            $data = [
                'title' => $title,
                'category' => $category,
                'rate' => $rate,
                'qty' => $qty
            ];
 
            $update = $stock->update($data);
 
            if ($update) {
                $out  = [
                    "message" => "success_update_data",
                    "results" => $data,
                    "code"  => 200
                ];
            } else {
                $out  = [
                    "message" => "vailed_update_data",
                    "results" => $data,
                    "code"   => 404,
                ];
            }
 
            return response()->json($out, $out['code']);
        }
    }
}
