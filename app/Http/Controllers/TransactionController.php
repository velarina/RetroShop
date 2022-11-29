<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = transaction::all();
        return response()->json([
            'status' => 200,
            'message' => "data succesfully sent",
            'data' => $transaction
        ]);
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
        $product = product::find($request->id);
        $product_price = $product->price;
        $total_price = $product_price * $request->amount;
        if ($request->amount != 0) {
            $table = transaction::create([
                "product_name" => $product->title,
                "amount" => $request->amount,
                "price" => $product_price,
                "total" => $total_price,
                "voucher" => $request->voucher,
                "payment_method" => $request->payment_method
            ]);
        } else {
            return response()->json([
                'status' => 400,
                'message' => 'amount cant be 0'
            ], 400);
        }

        return response()->json([
            'success' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = transaction::find($id);
        if ($transaction) {
            return response()->json([
                'status' => 200,
                'data' => $transaction
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' . $id . 'tidak ditemukan'
            ], 404);
        }
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
        if ($request->id != null) {
            $transaction = transaction::find($id);
            $product = product::find($request->id);
            $product_price = $product->price;
            $total_price = $product_price * $request->amount;
        }
        if ($transaction) {
            if ($request->amount != 0) {
                $transaction->transaction_id = $request->transaction_id;
                $transaction->product_name = $request->product_name;
                $transaction->amount = $request->amount;
                $transaction->price = $request->price;
                $transaction->total = $request->total;
                $transaction->voucher = $request->voucher;
                $transaction->payment_method = $request->payment_method;
                $transaction->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'data update',
                    'data' => $transaction
                ], 200);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => $id . 'tidak ditemukan'
                ], 404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaction = transaction::where('id', $id)->first();
        if ($transaction) {
            $transaction->delete();
            return response()->json([
                'status' => 200,
                'data' => $transaction
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
