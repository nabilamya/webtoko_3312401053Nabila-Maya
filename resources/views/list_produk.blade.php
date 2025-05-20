<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

<div class="container mx-auto mt-10">
    <h1 class="text-3xl font-bold mb-6 text-center">Daftar Produk</h1>

    <table class="min-w-full bg-white shadow-md rounded border border-gray-200">
        <thead class="bg-gray-200">
            <tr>
                <th class="py-2 px-4 border-b">No</th>
                <th class="py-2 px-4 border-b">Nama Produk</th>
                <th class="py-2 px-4 border-b">Deskripsi Produk</th>
                <th class="py-2 px-4 border-b">Harga Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nama as $index => $item)
            <tr class="hover:bg-gray-100">
                <td class="py-2 px-4 border-b text-center">{{ $index + 1 }}</td>
                <td class="py-2 px-4 border-b">{{ $item }}</td>
                <td class="py-2 px-4 border-b">{{ $desc[$index] }}</td>
                <td class="py-2 px-4 border-b">Rp {{ number_format($harga[$index], 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
