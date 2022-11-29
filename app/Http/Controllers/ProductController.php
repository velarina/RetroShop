<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::all();
        return response()->json([
            'status' => 200,
            'message' => "data succesfully sent",
            'data' => $product
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
        $table = product::create([
            "category" => $request->category,
            "title" => $request->title,
            "price" => $request->price,
            "spesification" => $request->spesification,
            "description" => $request->description,
            "ship_from" => $request->ship_from,
            "stock" => $request->stock,
            "voucher" => $request->voucher,
        ]);

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
        $product = product::find($id);
        if ($product) {
            return response()->json([
                'status' => 200,
                'data' => $product
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
        $product = product::find($id);
        if ($product) {
            $product->category = $request->category ? $request->category : $product->category;
            $product->title = $request->title ? $request->title : $product->title;
            $product->price = $request->price ? $request->price : $product->prices;
            $product->spesification = $request->spesification ? $request->spesification : $product->spesification;
            $product->description = $request->description ? $request->description : $product->description;
            $product->ship_from = $request->ship_from ? $request->ship_from : $product->ship_from;
            $product->stock = $request->stock ? $request->stock : $product->stock;
            $product->voucher = $request->voucher ? $request->voucher : $product->voucher;
            $product->save();
            return response()->json([
                'status' => 200,
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan'
            ], 404);
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
        $product = product::where('id', $id)->first();
        if ($product) {
            $product->delete();
            return response()->json([
                'status' => 200,
                'data' => $product
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
