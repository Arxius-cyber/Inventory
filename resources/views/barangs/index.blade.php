<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Barang</title>
    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Navbar -->
    @include('layouts.navbar')

<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
    <h2 class="text-2xl font-bold">Daftar Barang</h2>
    <a href="{{ route('barangs.create') }}" 
       class="mt-3 sm:mt-0 px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
        + Tambah Barang
    </a>
</div>


        <!-- Table -->
        <div class="overflow-x-auto bg-white rounded-lg shadow">
            <table class="w-full border-collapse">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="px-4 py-2 text-left">#</th>
                        <th class="px-4 py-2 text-left">Nama Barang</th>
                        <th class="px-4 py-2 text-left">Kategori</th>
                        <th class="px-4 py-2 text-left">Supplier</th>
                        <th class="px-4 py-2 text-left">Stok</th>
                        <th class="px-4 py-2 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($barangs as $barang)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-2">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2">{{ $barang->name }}</td>
                        <td class="px-4 py-2">{{ $barang->category->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $barang->supplier->name ?? '-' }}</td>
                        <td class="px-4 py-2">{{ $barang->stock }}</td>
                        <td class="px-4 py-2 flex gap-2">
                            <a href="{{ route('barangs.edit', $barang->id) }}" 
                               class="px-3 py-1 bg-yellow-400 text-black rounded hover:bg-yellow-500 transition">
                               Edit
                            </a>
                            <form action="{{ route('barangs.destroy', $barang->id) }}" method="POST" 
                                  onsubmit="return confirm('Yakin hapus data?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 transition">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-3 text-center text-gray-500">
                            Belum ada data barang
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
