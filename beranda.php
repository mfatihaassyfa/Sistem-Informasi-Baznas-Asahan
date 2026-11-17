<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Baznas Asahan</title>
    <link href="Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="Assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="Assets/font-awesome-4.5.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-info">
                <strong>Selamat Datang di Sistem Informasi Baznas Asahan</strong>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Kolom kedua -->
        <div class="col-sm-9 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Penerima Zakat</h3>
                </div>
                <div class="panel-body">
                    <table id="deskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th><th width="20%">Nomor Kartu Keluarga</th><th width="20%">Nama</th><th width="10%">Asnaf</th><th width="20%">NIK</th><th>Jenis Kelamin</th><th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Koneksi database
                            $sql = "SELECT * FROM penerima";
                            $query = mysqli_query($koneksi, $sql) or die("SQL Anda Salah");
                            $nomor = 0;
                            while ($data = mysqli_fetch_array($query)) {
                                $nomor++;
                                ?>
                                <tr>
                                    <td><?= $nomor ?></td>
                                    <td><?= $data['no_kk'] ?></td>
                                    <td><?= $data['nama_penerima'] ?></td>
                                    <td><?= $data['jenis_penerima'] ?></td>
                                    <td><?= $data['nik'] ?></td>
                                    <td><?= $data['gender'] ?></td>
                                    <td><?= $data['status'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Panel untuk Grafik -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Distribusi Penerima Zakat Berdasarkan Jenis Penerima</h3>
                </div>
                <div class="panel-body">
                    <canvas id="grafikJenisPenerima"></canvas>
                </div>
            </div>
        </div>
        <!-- Akhir kolom kedua -->
        <div class="col-sm-3 col-xs-12">
            <?php if(isset($_GET['error']) ) {?>
            <div class="alert alert-danger">Maaf! Login Gagal, Coba Lagi..</div>
            <?php }?>

            <?php if (isset($_SESSION['username'])) { ?>
            <div class="alert alert-info">
                <strong>Welcome <?=$_SESSION['nama']?></strong>
            </div>
            <?php } else { ?>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Masuk Ke Sistem</h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" action="proses_login.php" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="user" class="form-control input-sm" placeholder="Username" required="" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" name="pwd" class="form-control input-sm" placeholder="Password" required="" autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="login" value="login" class="btn btn-success btn-block"><span class="fa fa-unlock-alt"></span> Login Sistem</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    // Inisialisasi DataTables untuk tabel dengan ID #deskripsi
    $(document).ready(function() {
        $('#deskripsi').DataTable();
    });

    // Skrip JavaScript untuk Grafik
    document.addEventListener('DOMContentLoaded', function() {
        var ctx = document.getElementById('grafikJenisPenerima').getContext('2d');
        var grafikJenisPenerima = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php 
                    // Query untuk mendapatkan jenis penerima dan jumlahnya
                    $sql = "SELECT jenis_penerima, COUNT(*) AS jumlah FROM penerima GROUP BY jenis_penerima ORDER BY jenis_penerima";
                    $query = mysqli_query($koneksi, $sql);
                    $labels = [];
                    $data = [];
                    while ($row = mysqli_fetch_assoc($query)) {
                        $labels[] = $row['jenis_penerima'];
                        $data[] = $row['jumlah'];
                    }
                    echo json_encode($labels); 
                ?>,
                datasets: [{
                    label: 'Jumlah Penerima Zakat per Jenis',
                    data: <?php echo json_encode($data); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{ ticks: { beginAtZero: true } }]
                }
            }
        });
    });
</script>
</body>
</html>
