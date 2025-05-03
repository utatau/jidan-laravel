@foreach($data as $d)
<br>
<h1>nama barang: <?= $d->jenis_barang ?></h1>
<h1>nomor ruangan: <?= $d->lantai_id ?></h1>
<h1>tanggal beli: <?= $d->tgl_beli ?></h1>
<br>

@endforeach
