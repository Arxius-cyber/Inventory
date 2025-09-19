@extends('layouts.app')
@include('layouts.navbar')

@section('content')
<div class="container">
    <h1>Daftar Transaksi</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <a href="{{ route('transactions.create') }}" class="btn btn-primary mb-3">+ Tambah Transaksi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Tanggal</th>
                <th>Barang</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Staf</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($transactions as $trx)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $trx->date->format('d-m-Y') }}</td>
                    <td>{{ $trx->barang->name ?? '-' }}</td>
                    <td>
                        <span class="badge {{ $trx->type === 'in' ? 'bg-success' : 'bg-danger' }}">
                            {{ $trx->type_label }}
                        </span>
                    </td>
                    <td>{{ $trx->quantity }}</td>
                    <td>{{ $trx->user->name ?? '-' }}</td>
                    <td>{{ $trx->note ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted">Belum ada transaksi</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $transactions->links() }}
    </div>
</div>
@endsection
