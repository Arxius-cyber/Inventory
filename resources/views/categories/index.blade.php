<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <h1 class="text-2xl font-bold mb-5">Daftar Categories</h1>

    <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-200 text-gray-700">
                <th class="py-2 px-4 border">ID</th>
                <th class="py-2 px-4 border">Name</th>
                <th class="py-2 px-4 border">Description</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border">{{ $category->id }}</td>
                    <td class="py-2 px-4 border">{{ $category->name }}</td>
                    <td class="py-2 px-4 border">{{ $category->description }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
