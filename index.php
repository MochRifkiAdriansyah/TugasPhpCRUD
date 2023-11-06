<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas Kampus Merdeka CRUD</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#kampus-merdeka').DataTable();
        });
    </script>
</head>

<body>
<div class="container col-md-8 mt-6">
		<h1>Tabel Barang</h1>
		<div class="card">
			<div class="card-header bg-dark text-white ">
				<h4>DATA BARANG </h4><a href="tambah.php" class="btn btn-md btn-primary float-right">Tambah</a>
			</div>
			<div class="card-body">
    <table id="kampus-merdeka" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Stok/Barang Tersedia</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php
							include('koneksi.php'); //memanggil file koneksi
							$datas = mysqli_query($koneksi, "select * from barang") or die(mysqli_error($koneksi));
							//script untuk menampilkan data barang

							$no = 1;//untuk pengurutan nomor

							//melakukan perulangan
							while($row = mysqli_fetch_assoc($datas)) {
						?>	

					<tr>
						<td><?= $no; ?></td>
						<td><?= $row['nama']; //untuk menampilkan nama ?></td>
						<td>Rp <?= $row['harga']; ?></td>
						<td><?= $row['deskripsi']; ?></td>
						<td><?= $row['stok']; ?></td>
						<td>
								<a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a><a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('anda yakin ingin hapus?');">Hapus</a>
						</td>
					</tr>

						<?php $no++; } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Deskripsi</th>
                <th>Stok/Barang Tersedia</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
    </table>
                            </div>
                            </div>
                            </div>
</body>

</html>