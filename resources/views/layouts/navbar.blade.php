@extends('layouts.app')

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Inventory</a>
    <ul class="navbar-nav ms-auto">
      @auth
        @if(Auth::user()->role == 'admin')
          <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard Admin</a></li>
          <li class="nav-item"><a href="{{ route('barangs.index') }}" class="nav-link">Kelola Barang</a></li>
          <li class="nav-item"><a href="{{ route('categories.index') }}" class="nav-link">Kategori</a></li>
          <li class="nav-item"><a href="{{ route('suppliers.index') }}" class="nav-link">Supplier</a></li>
          <li class="nav-item"><a href="{{ route('transactions.index') }}" class="nav-link">Transaksi</a></li>
        @else
          <li class="nav-item"><a href="{{ route('dashboard') }}" class="nav-link">Dashboard Staf</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Transaksi Masuk</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Transaksi Keluar</a></li>
        @endif

        <li class="nav-item">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-danger btn-sm ms-3">Logout</button>
          </form>
        </li>
      @else
        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
      @endauth
    </ul>
  </div>
</nav>
