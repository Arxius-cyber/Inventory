<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::with(['category','supplier'])->get();
        return view('barangs.index', compact('barangs'));
    }

    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('barangs.create', compact('categories','suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'stock'       => 'required|integer',
        ]);

        Barang::create($request->all());
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil ditambahkan');
    }

    public function edit(Barang $barang)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('barangs.edit', compact('barang','categories','suppliers'));
    }

    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'name'        => 'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'stock'       => 'required|integer',
        ]);

        $barang->update($request->all());
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil diupdate');
    }

    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')->with('success', 'Barang berhasil dihapus');
    }
}
