<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Barang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="max-w-xl w-full p-6 bg-white rounded-lg shadow-md border">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Detail Barang</h1>

        <p class="mb-2">
            <span class="font-semibold text-gray-700">Jenis Barang:</span>
            <span class="text-gray-900">{{ $data->jenis_barang }}</span>
        </p>

        <p class="mb-2">
            <span class="font-semibold text-gray-700">Tanggal Beli:</span>
            <span class="text-gray-900">{{ $data->tgl_beli }}</span>
        </p>

        <p class="mb-2">
            <span class="font-semibold text-gray-700">Lantai:</span>
            <span class="text-gray-900">{{ $data->lantai->nomor_lantai }}</span>
        </p>

        <p class="mb-2">
            <span class="font-semibold text-gray-700">Nomor Ruangan:</span>
            <span class="text-gray-900">{{ $data->lantai->nomor_ruangan ?? 'Nomor ruangan tidak tersedia' }}</span>
        </p>
    </div>
</body>

</html>