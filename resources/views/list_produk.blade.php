<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Manajemen Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen">

    <!-- Flash Message -->
    @if(session('success'))
        <div class="bg-green-100 text-green-800 text-center py-3">{{ session('success') }}</div>
    @elseif(session('error'))
        <div class="bg-red-100 text-red-800 text-center py-3">{{ session('error') }}</div>
    @endif

    @if (isset($produkTerpilih))
    <div class="max-w-2xl mx-auto mt-10 mb-10 bg-white rounded-xl shadow-lg p-9">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Edit Produk</h1>

        <form method="POST" action="{{ route('produk.update', $produkTerpilih->id) }}" onsubmit="return confirm('Yakin ingin mengupdate produk ini?')">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 font-semibold text-gray-700">Nama Produk</label>
                <input type="text" name="nama" value="{{ old('nama', $produkTerpilih->nama) }}" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2" />
            </div>
            <div class="mb-6">
                <label class="block mb-2 font-semibold text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2">{{ old('deskripsi', $produkTerpilih->deskripsi) }}</textarea>
            </div>
            <div class="mb-8">
                <label class="block mb-2 font-semibold text-gray-700">Harga</label>
                <input type="number" name="harga" value="{{ old('harga', $produkTerpilih->harga) }}" required
                    class="w-full border border-gray-300 rounded-md px-4 py-2" />
            </div>
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 text-white font-semibold px-8 py-3 rounded-md hover:bg-blue-700">Update</button>
                <a href="/listproduk"
                    class="ml-4 text-gray-600 hover:text-gray-900 underline">Batal</a>
            </div>
        </form>
    </div>
    @endif

    <!-- Form Input Produk Baru (disembunyikan saat edit) -->
    @if (!isset($produkTerpilih))
    <div class="max-w-2xl mx-auto mt-12 mb-12 bg-white rounded-xl shadow-lg p-9">
        <h1 class="text-3xl font-bold mb-8 text-center text-gray-800">Input Produk Baru</h1>

        <form method="POST" action="{{ route('produk.simpan') }}">
            @csrf
            <div class="mb-6">
                <label class="block mb-2 font-semibold text-gray-700">Nama Produk</label>
                <input type="text" name="nama" class="w-full border border-gray-300 rounded-md px-4 py-2"
                    placeholder="Masukkan nama produk" required />
            </div>
            <div class="mb-6">
                <label class="block mb-2 font-semibold text-gray-700">Deskripsi</label>
                <textarea name="deskripsi" rows="4"
                    class="w-full border border-gray-300 rounded-md px-4 py-2 resize-none"
                    placeholder="Masukkan deskripsi produk" required></textarea>
            </div>
            <div class="mb-8">
                <label class="block mb-2 font-semibold text-gray-700">Harga</label>
                <input type="number" name="harga" class="w-full border border-gray-300 rounded-md px-4 py-2"
                    placeholder="Masukkan harga produk" required />
            </div>
            <div class="text-center">
                <button type="submit"
                    class="bg-green-600 text-white font-semibold px-8 py-3 rounded-md hover:bg-green-700">Simpan</button>
            </div>
        </form>
    </div>
    @endif

    <!-- Tabel Daftar Produk -->
    <div class="container mx-auto px-4 pb-16">
        <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Daftar Produk</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded border border-gray-200">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Nama</th>
                        <th class="py-2 px-4 border-b">Deskripsi</th>
                        <th class="py-2 px-4 border-b">Harga</th>
                        <th class="py-2 px-4 border-b">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produk as $index => $item)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b text-center">{{ $index + 1 }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->nama }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->deskripsi }}</td>
                        <td class="py-2 px-4 border-b">Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                        <td class="py-2 px-4 border-b text-center">
                            <div class="flex justify-center space-x-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('produk.updateform', $item->id) }}"
                                    class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>

                                <!-- Form Delete -->
                                <form action="{{ route('produk.delete', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus {{ $item->nama }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-4 text-center text-gray-400 italic">Belum ada produk.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
