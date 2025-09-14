<!-- resources/views/suppliers/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Supplier</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-8 bg-gray-100">
    <h1 class="text-2xl font-bold mb-4">Daftar Supplier</h1>

    <a href="{{ route('suppliers.create') }}" 
       class="px-4 py-2 bg-blue-500 text-white rounded">+ Tambah Supplier</a>

    @if(session('success'))
        <div class="mt-4 p-2 bg-green-200 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="mt-4 w-full border border-gray-300">
        <thead>
            <tr class="bg-gray-200">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Nama</th>
                <th class="border px-4 py-2">Telepon</th>
                <th class="border px-4 py-2">Alamat</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
            <tr>
                <td class="border px-4 py-2">{{ $supplier->id }}</td>
                <td class="border px-4 py-2">{{ $supplier->name }}</td>
                <td class="border px-4 py-2">{{ $supplier->phone }}</td>
                <td class="border px-4 py-2">{{ $supplier->address }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('suppliers.edit', $supplier->id) }}" 
                       class="px-2 py-1 bg-yellow-400 text-white rounded">Edit</a>
                    <form action="{{ route('suppliers.destroy', $supplier->id) }}" 
                          method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                onclick="return confirm('Yakin hapus?')" 
                                class="px-2 py-1 bg-red-500 text-white rounded">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
