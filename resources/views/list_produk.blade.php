<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Input & Daftar Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Container Form Input Produk: Card kecil di tengah -->
    <div class="max-w-2xl mx-auto mt-24 mb-24 bg-white rounded-xl shadow-lg p-9">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Input Produk</h1>
        <form method="POST" action="{{ route('produk.simpan') }}">
            @csrf
            <div class="mb-6">
                <label for="nama" class="block mb-2 font-semibold text-gray-700">Nama Produk</label>
                <input
                    type="text"
                    id="nama"
                    name="nama"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan nama produk"
                />
            </div>
            <div class="mb-6">
                <label for="deskripsi" class="block mb-2 font-semibold text-gray-700">Deskripsi Produk</label>
                <textarea
                    id="deskripsi"
                    name="deskripsi"
                    rows="4"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan deskripsi produk"
                ></textarea>
            </div>
            <div class="mb-8">
                <label for="harga" class="block mb-2 font-semibold text-gray-700">Harga Produk</label>
                <input
                    type="number"
                    id="harga"
                    name="harga"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Masukkan harga produk"
                />
            </div>
            <div class="text-center">
                <button
                    type="submit"
                    class="bg-blue-600 text-white font-semibold px-8 py-3 rounded-md hover:bg-blue-700 transition-colors duration-200"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>

    <!-- Container Daftar Produk: full width bawah -->
    <div class="container mx-auto px-4 pb-16">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Produk</h2>
        <div class="overflow-x-auto">
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
                    @forelse ($produk as $index => $item)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b text-center">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->nama }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->deskripsi }}</td>
                        <td class="py-2 px-4 border-b">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="py-4 text-center text-gray-400 italic">Belum ada produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
