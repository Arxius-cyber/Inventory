@extends('layouts.app')

@section('content')
<h2>Tambah Supplier</h2>

<form action="{{ route('suppliers.store') }}" method="POST" class="mt-3">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nama Supplier</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <input type="address" name="address" id="address" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Telepon</label>
        <input type="text" name="phone" id="phone" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
