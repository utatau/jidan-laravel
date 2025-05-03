<div class="container">
    <h1>Detail Barang</h1>
    <p><strong>Jenis Barang:</strong> {{ $data->jenis_barang }}</p>
    <p><strong>Tanggal Beli:</strong> {{ $data->tgl_beli }}</p>
<p><strong>Lantai: </strong>{{$data->lantai->nomor_lantai}}</p>    
<p><strong>Nomor Ruangan:</strong> {{ $data->lantai->nomor_ruangan ?? 'Nomor ruangan tidak tersedia' }}</p>
    <p><strong>Token:</strong> {{ $data->token }}</p>
</div>

