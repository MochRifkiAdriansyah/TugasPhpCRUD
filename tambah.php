<!DOCTYPE html>
<html>

<head>
	<title>Tugas CRUD Kampus Medeka</title>
</head>
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('input').on('input', function () {
                var allFilled = true;
                $('input').each(function () {
                    if ($(this).val() === '') {
                        allFilled = false;
                        return false; // Exit the loop if any field is empty
                    }
                });

                if (allFilled == true) {
                    $('#submitBtn').prop('disabled', false);
                } else {
                    $('#submitBtn').prop('disabled', true);
                }
            });
        });
    </script>

<body>
	<div class="container col-md-6 mt-4">
		<h1>Table Barang</h1>
		<div class="card">
			<div class="card-header bg-success text-white">
				Tambah Barang
			</div>
			<div class="card-body">
				<form action="" method="post" role="form">
					<div class="form-group">
						<label>Nama Barang</label>
						<input type="text" name="nama" required="" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga</label>
						<input type="text" name="harga" class="form-control">
					</div>

					<div class="form-group">
						<label>Deskripsi</label>
						<input class="form-control" name="deskripsi">
					</div>
					<div class="form-group">
						<label>Stok/Barang Tersedia</label>
						<input class="form-control" name="stok">
					</div>

					<button id ="submitBtn" type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
				</form>

				<?php
				include('koneksi.php');
				
				//melakukan pengecekan jika button submit diklik maka akan menjalankan perintah simpan dibawah ini
				if (isset($_POST['submit'])) {
					
					//menampung data dari inputan
					$nama = $_POST['nama'];
					$harga = $_POST['harga'];
					$deskripsi = $_POST['deskripsi'];
					$stok = $_POST['stok'];

					//query untuk menambahkan barang ke database, pastikan urutan nya sama dengan di database
					$datas = mysqli_query($koneksi, "insert into barang (nama,harga,deskripsi,stok)values('$nama', '$harga', '$deskripsi','$stok')") or die(mysqli_error($koneksi));
					//id barang tidak dimasukkan, karena sudah menggunakan AUTO_INCREMENT, id akan otomatis

					//ini untuk menampilkan alert berhasil dan redirect ke halaman index
					echo "<script>alert('data berhasil disimpan.');window.location='index.php';</script>";
				}
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
	<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
</body>

</html>