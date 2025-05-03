<div class="container">
    <h1>Detail Barang</h1>
    <p><strong>Nama Barang:</strong> {{ $data->nama_barang ?? 'Nama tidak tersedia' }}</p>
    <p><strong>Jenis:</strong> {{ $data->jenis_barang }}</p>
    <p><strong>Tanggal Beli:</strong> {{ $data->tgl_beli }}</p>
    <p><strong>ID Lantai:</strong> {{ $data->lantai_id }}</p>
    <p><strong>Token:</strong> {{ $data->token }}</p>
</div>