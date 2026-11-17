<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Buku Pertahun</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <!--Menampilkan data detail arsip-->
        <?php
        include '../config/koneksi.php';
        $ambilthn=$_POST['tahun'];

        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <!--dalam tabel-->
                    <div class="text-center">
                        <h2>Sistem Informasi Baznas Asahan </h2>
                        <h4>Kisaran, Asahan<br> Sumatera Utara, 24314</h4>
                        <hr>
                        <h3>DATA PENERIMA TAHUN <? echo "$ambilthn"; ?></h3>
                        <table class="table table-bordered table-striped table-hover">
                        <tbody>
                <thead>
								<tr>
                                    <th>No.</th><th width="17%"><center>Nomor KK</th><th><center>Jenis Penerima</th><th><center>Nama Penerima</th><th><center>NIK</th><th><center>Jenis Kelamin</th><th><center>Jumlah Bantuan</th><th><center>Penanggung Jawab</th><th><center>Tanggal</th><th><center>Status</th>
								</tr>
								</thead>
							<tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = "SELECT * FROM penerima WHERE substr(tanggal,1,4)='$ambilthn'";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++; //Penambahan satu untuk nilai var nomor
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['no_kk'] ?></td>
                                    <td><?= $data['nama_penerima'] ?></td>
                                    <td><?= $data['jenis_penerima'] ?></td>
                                    <td><?= $data['nik'] ?></td>
                                    <td><?= $data['gender'] ?></td>
                                    <td><?= $data['jumlah_bantuan'] ?></td>
                                    <td><?= $data['penanggung'] ?></td>
                                    <td><?= $data['tanggal'] ?></td>
                                    <td><?= $data['status'] ?></td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php } ?>
							</tbody>
                        </tbody>

                            <tfoot>
                              <tr>
                                <td colspan="10" class="text-right">
                                        Lhokseumawe,  &nbsp <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Baznas Asahan<strong></u><br>
                                        +62 822 8109 0819
									             </td>
								</tr>
							</tfoot>
                        </table>
                    </div>
                </div>
            </div>
    </body>
</html>