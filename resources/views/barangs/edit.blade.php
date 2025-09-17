@extends('layouts.app')

@section('content')
<h2>Edit Barang</h2>

<form action="{{ route('barangs.update', $barang->id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nama Barang</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $barang->name }}" required>
    </div>

    <div class="mb-3">
        <label for="category_id" class="form-label">Kategori</label>
        <select name="category_id" id="category_id" class="form-select" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $barang->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="supplier_id" class="form-label">Supplier</label>
        <select name="supplier_id" id="supplier_id" class="form-select" required>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ $barang->supplier_id == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="stock" class="form-label">Stok</label>
        <input type="number" name="stock" id="stock" class="form-control" value="{{ $barang->stock }}" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('barangs.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
