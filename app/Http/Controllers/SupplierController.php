<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    // 📌 Tampilkan daftar supplier
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    // 📌 Form tambah supplier
    public function create()
    {
        return view('suppliers.create');
    }

    // 📌 Simpan supplier baru
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        Supplier::create($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil ditambahkan');
    }

    // 📌 Form edit supplier
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    // 📌 Update supplier
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        $supplier->update($request->all());
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil diupdate');
    }

    // 📌 Hapus supplier
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier berhasil dihapus');
    }
}
