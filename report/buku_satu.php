<!DOCTYPE html>
<html>
    <head>
        <title>Cetak Data Buku</title>
        <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>  
    <body onload="print()">
       
       <?php
       include '../config/koneksi.php';

       // Check connection
       if (!$koneksi) {
           die("Connection failed: " . mysqli_connect_error());
       }

       if (isset($_GET['id'])) {
        $sql = "SELECT *FROM penerima WHERE KK ='" . $_GET ['id'] . "'";
           
           // Execute the query and handle potential errors
           $query = mysqli_query($koneksi, $sql);

           if (!$query) {
               die("SQL Detail error: " . mysqli_error($koneksi));
           }

           // Check if data is found
           if (mysqli_num_rows($query) > 0) {
               // Fetch data
               $data = mysqli_fetch_array($query);
           } else {
               $data = null;
               echo "Data dengan Nomor KK $KK tidak ditemukan.";
           }
       } else {
           echo "Nomor KK tidak disediakan.";
           $data = null;
       }
       ?>

        <div class="container">
            <div class='row'>
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2>Sistem Informasi Baznas Asahan </h2>
                        <h4>Kisaran, Asahan<br> Sumatera Utara, 24314</h4>
                        <hr>
                        <h3>DATA PENERIMA</h3>
                        
                        <?php if ($data): ?>
                        <table class="table table-bordered table-striped table-hover"> 
                            <tbody>
                                <tr>
                                    <td>Nomor KK</td> <td><?= htmlspecialchars($data['no_kk']) ?></td>
                                </tr>
                                <tr>
                                    <td width="200">Jenis Penerima</td> <td><?= htmlspecialchars($data['jenis_penerima']) ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Penerima</td> <td><?= htmlspecialchars($data['nama_penerima']) ?></td>
                                </tr>
                                <tr>
                                    <td>NIK</td> <td><?= htmlspecialchars($data['nik']) ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td> <td><?= htmlspecialchars($data['gender']) ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Bantuan</td> <td><?= htmlspecialchars($data['jumlah_bantuan']) ?></td>
                                </tr>
                                <tr>
                                    <td>Penanggung Jawab</td> <td><?= htmlspecialchars($data['penanggung']) ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td> <td><?= htmlspecialchars($data['tanggal']) ?></td>
                                </tr>
                                <tr>
                                    <td>Status</td> <td><?= htmlspecialchars($data['status']) ?></td>
                                </tr>
                            </tbody>
                            <tfoot> 
                                <tr>
                                    <td colspan="2" class="text-right">
                                        Asahan <?= date("d-m-Y") ?>
                                        <br><br><br><br>
                                        <u>Baznas Asahan</u><br>
                                        +62 822 8109 0819
                                    </td>
                                </tr>
                            </tfoot> 
                        </table>
                        <?php else: ?>
                        <p>Data tidak ditemukan untuk Nomor KK yang diberikan.</p>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
    </body>
</html>
