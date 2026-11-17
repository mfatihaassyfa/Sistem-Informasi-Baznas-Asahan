<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Laporan Perbulan</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body onload="print()">
        <?php
        include '../config/koneksi.php';
        $ambilbln = $_POST['bulan'];
        $ambilthn = $_POST['tahun'];

        // Determine the month name
        $bulanNama = '';
        $namaBulan = [
            1 => 'JANUARI', 2 => 'FEBRUARI', 3 => 'MARET', 4 => 'APRIL', 5 => 'MEI',
            6 => 'JUNI', 7 => 'JULI', 8 => 'AGUSTUS', 9 => 'SEPTEMBER', 10 => 'OKTOBER',
            11 => 'NOVEMBER', 12 => 'DESEMBER'
        ];
        if (isset($namaBulan[$ambilbln])) {
            $bulanNama = $namaBulan[$ambilbln];
        }
        ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2>Sistem Informasi Baznas Asahan</h2>
                        <h4>Kisaran, Asahan<br>Sumatera Utara 24134</h4>
                        <hr>
                        <h3>DATA PENERIMA BULAN <?= $bulanNama . " " . $ambilthn; ?></h3>
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th width="17%"><center>Nomor KK</center></th>
                                    <th><center>Jenis Penerima</center></th>
                                    <th><center>Nama Penerima</center></th>
                                    <th><center>NIK</center></th>
                                    <th><center>Jenis Kelamin</center></th>
                                    <th><center>Jumlah Bantuan</center></th>
                                    <th><center>Penanggung Jawab</center></th>
                                    <th><center>Tanggal</center></th>
                                    <th><center>Status</center></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // SQL query to fetch data by month and year from 'tanggal' column
                                $sql = "SELECT * FROM penerima WHERE DATE_FORMAT(tanggal, '%Y-%m') = '$ambilthn-$ambilbln'";
                                $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");

                                $nomor = 0;
                                while ($data = mysqli_fetch_array($query)) {
                                    $nomor++;
                                    ?>
                                    <tr>
                                        <td><?= $nomor ?></td>
                                        <td><?= htmlspecialchars($data['no_kk']) ?></td>
                                        <td><?= htmlspecialchars($data['jenis_penerima']) ?></td>
                                        <td><?= htmlspecialchars($data['nama_penerima']) ?></td>
                                        <td><?= htmlspecialchars($data['nik']) ?></td>
                                        <td><?= htmlspecialchars($data['gender']) ?></td>
                                        <td><?= htmlspecialchars($data['jumlah_bantuan']) ?></td>
                                        <td><?= htmlspecialchars($data['penanggung']) ?></td>
                                        <td><?= htmlspecialchars($data['tanggal']) ?></td>
                                        <td><?= htmlspecialchars($data['status']) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="10" class="text-right">
                                        Asahan, <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Baznas Asahan</u><br>
                                        +62 822 8109 0819
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
