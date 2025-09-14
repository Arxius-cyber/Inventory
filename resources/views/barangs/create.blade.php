@extends('layouts.app')

@section('content')
<h2>Tambah Barang</h2>

<form action="{{ route('barangs.store') }}" method="POST" class="mt-3">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Barang</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="supplier_id" class="form-label">Supplier</label>
        <select name="supplier_id" id="supplier_id" class="form-select" required>
            <option value="">-- Pilih Supplier --</option>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" name="stock" id="stock" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
