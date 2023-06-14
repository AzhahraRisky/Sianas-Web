<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>



	<style type="text/css">
		table {
			border-collapse: collapse;
			width: 100%;
		}



		table thead th {
			border: 1px solid black;
			text-align: left;
		}

		table tbody tr td {
			border: 1px solid black;
			text-align: left;
		}
	</style>
</head>

<body>


	<h1>Laporan Peminjaman Kendaraan Dinas</h1>
	<h5>Periode <?= $tgl_awal . " s/d " . $tgl_akhir; ?> </h5>

	<table>
		<thead>
			<th>No</th>
			<th>Nama Anggota</th>
			<th>Sub Bagian</th>
			<th>Jenis Mobil</th>
			<th>No Polisi</th>
			<th>Nama Supir</th>
			<th>Tujuan</th>
			<th>Kota</th>
			<th>Tanggal</th>
			<th>Konfirmasi</th>
		</thead>
		<tbody>
			<?php

			$no  = 1;

			foreach ($riwayat as $rw) : ?>

				<tr>
					<td><?= $no++; ?></td>
					<td><?= $rw->nama_anggota; ?></td>
					<td><?= $rw->subbag; ?></td>
					<td><?= $rw->jenis_mobil; ?></td>
					<td><?= $rw->no_plat; ?></td>
					<td><?= $rw->nama_sopir; ?></td>
					<td><?= $rw->tujuan_1 . ", " . $rw->tujuan_2 . ", " . $rw->tujuan_3; ?></td>
					<td><?= $rw->kota_1 . ", " . $rw->kota_2 . ", " . $rw->kota_3; ?></td>
					<td><?= $rw->tgl_digunakan . " s/d " . $rw->tgl_kembali; ?></td>
					<td><?= $rw->konfirmasi; ?></td>

				</tr>


			<?php endforeach; ?>
		</tbody>
	</table>

</body>

</html>