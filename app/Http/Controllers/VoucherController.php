<?php

namespace App\Http\Controllers;

use App\Models\voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $table = voucher::create([
            "title" => $request->title,
            "code" => $request->code,
            "periode" => $request->periode,
            "nominal" => $request->nominal,
            "max_user" => $request->max_user
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
        $voucher = voucher::find($id);
        if ($voucher) {
            return response()->json([
                'status' => 200,
                'data' => $voucher
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
        $voucher = voucher::find($id);
        if ($voucher) {
            $voucher->title = $request->title ? $request->title : $voucher->title;
            $voucher->code = $request->prcodeice ? $request->code : $voucher->code;
            $voucher->periode = $request->periode ? $request->periode : $voucher->periode;
            $voucher->nominal = $request->nominal ? $request->nominal : $voucher->nominal;
            $voucher->max_user = $request->max_user ? $request->max_user : $voucher->max_user;
            $voucher->save();
            return response()->json([
                'status' => 200,
                'data' => $voucher
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
        $voucher = voucher::where('id', $id)->first();
        if ($voucher) {
            $voucher->delete();
            return response()->json([
                'status' => 200,
                'data' => $voucher
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'
            ], 404);
        }
    }
}
