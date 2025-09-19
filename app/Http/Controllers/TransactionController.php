<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['barang', 'user'])
            ->latest()
            ->paginate(10);

        return view('transactions.index', compact('transactions'));
    }

    public function create()
    {
        $barangs = Barang::orderBy('name')->get();
        return view('transactions.create', compact('barangs'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'type'      => 'required|in:in,out',
            'quantity'  => 'required|integer|min:1',
            'note'      => 'nullable|string|max:255',
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);

        if ($validated['type'] === 'in') {
            $barang->increment('stock', $validated['quantity']);
        } else {
            if ($barang->stock < $validated['quantity']) {
                return back()
                    ->withInput()
                    ->with('error', 'Stock tidak mencukupi!');
            }
            $barang->decrement('stock', $validated['quantity']);
        }

        Transaction::create([
            'barang_id' => $validated['barang_id'],
            'type'      => $validated['type'],
            'quantity'  => $validated['quantity'],
            'date'      => now()->toDateString(),
            'note'      => $validated['note'],
            'user_id'   => Auth::id(),
        ]);

        return redirect()->route('transactions.index')
            ->with('success', 'Transaksi berhasil dicatat!');
    }
}
