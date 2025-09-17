<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Tampilkan daftar barang.
     */
    public function index()
    {
        $barangs = Barang::with(['category','supplier'])->get();
        return view('barangs.index', compact('barangs'));
    }

    /**
     * Form tambah barang.
     */
    public function create()
    {
        $categories = Category::all();
        $suppliers  = Supplier::all();
        return view('barangs.create', compact('categories','suppliers'));
    }

    /**
     * Simpan barang baru.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'name'       => 'required|string|max:255',
            'stock'      => 'required|integer|min:0',
            'unit'       => 'nullable|string|max:50',
            'price'      => 'nullable|numeric|min:0',
        ]);

        Barang::create($data);

        return redirect()->route('barangs.index')
                         ->with('success','Barang berhasil ditambahkan');
    }

    /**
     * Form edit barang.
     */
    public function edit(Barang $barang)
    {
        $categories = Category::all();
        $suppliers  = Supplier::all();
        return view('barangs.edit', compact('barang','categories','suppliers'));
    }

    /**
     * Update barang.
     */
    public function update(Request $request, Barang $barang)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'name'       => 'required|string|max:255',
            'stock'      => 'required|integer|min:0',
            'unit'       => 'nullable|string|max:50',
            'price'      => 'nullable|numeric|min:0',
        ]);

        $barang->update($data);

        return redirect()->route('barangs.index')
                         ->with('success','Barang berhasil diperbarui');
    }

    /**
     * Hapus barang.
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();

        return redirect()->route('barangs.index')
                         ->with('success','Barang berhasil dihapus');
    }
}
