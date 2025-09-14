<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::with(['category','supplier'])->orderBy('id','desc')->get();
        return response()->json($barangs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'unit' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
        ]);

        $barang = Barang::create($data);
        return response()->json($barang, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        $barang->load('category','supplier');
        return response()->json($barang);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'name' => 'required|string|max:255',
            'stock' => 'required|integer|min:0',
            'unit' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
        ]);

        $barang->update($data);
        return response()->json($barang);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return response()->json(['message' => 'Barang deleted']);
    }
}
