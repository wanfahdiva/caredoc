<?php
include 'config.php';
session_start();
if ($_SESSION['status'] != "login") {
    header("location:login.php?pesan=belum_login");
}
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="icon" href="../vendor/img/caredoc_sOg_icon.ico" type="image/gif" sizes="16x16">
    <title>Caredoc</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>

<body>
    <div class="" style="margin-top:20px">
        <center>
            <font size="6">Data Feeback</font>
        </center>
        <hr>
        <br>
        <div class="row">
            <div class="col-sm-6 mb-3">
            </div>
            <br>
        </div>
        <div class="table-responsive"><br />
            <table class="table table-striped jambo_table bulk_action" border="1">
                <thead class="text-center">
                    <tr>
                        <th>NO.</th>
                        <th>Nama Penyakit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //query ke database SELECT tabel penyakit urut berdasarkan id yang paling besar
                    $sql = mysqli_query($koneksi, "SELECT * FROM kosong ORDER BY id DESC") or die(mysqli_error($koneksi));
                    //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                    if (mysqli_num_rows($sql) > 0) {
                        //membuat variabel $no untuk menyimpan nomor urut
                        $no = 1;
                        //melakukan perulangan while dengan dari dari query $sql
                        while ($data = mysqli_fetch_assoc($sql)) {
                            //menampilkan data perulangan
                            echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['nama'] . '</td>
							<td>
								<a href="delete_feedback.php?id=' . $data['id'] . '" class="btn btn-outline-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')"><i class="fas fa-trash"> hapus</i></a>
							</td>
						</tr>
						';
                            $no++;
                        }
                        //jika query menghasilkan nilai 0
                    } else {
                        echo '
					<tr class="text-center">
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
                    }
                    ?>
                <tbody>
            </table>
        </div>
    </div>
</body>

</html>