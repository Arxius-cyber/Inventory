@extends('layouts.app')

@section('content')
<h2>Edit Supplier</h2>

<form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" class="mt-3">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Nama Supplier</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $supplier->name }}" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Alamat</label>
        <textarea name="address" id="address" class="form-control" required>{{ $supplier->address }}</textarea>
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Telepon</label>
        <input type="text" name="phone" id="phone" class="form-control" value="{{ $supplier->phone }}" required>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
