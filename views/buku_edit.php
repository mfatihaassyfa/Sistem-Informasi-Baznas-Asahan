<?php
$KK=$_GET['id'];
$ambil=  mysqli_query($koneksi, "SELECT * FROM penerima WHERE KK ='$KK'") or die ("SQL Edit error");
$data= mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Penerima</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        <div class="form-group">
                            <label for="jenis_penerima" class="col-sm-3 control-label">Jenis Penerima</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="jenis_penerima" class="form-control">
                                    <option value="Fakir">Fakir</option>
                                    <option value="Miskin">Miskin</option>
                                    <option value="Amil">Amil</option>
                                    <option value="Muallaf">Muallaf</option>
                                    <option value="Riqab">Riqab</option>
                                    <option value="Gharim">Gharim</option>
                                    <option value="Fisabilillah">Fisabilillah</option>
                                    <option value="Ibnu Sabil">Ibnu Sabil</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="gender" class="col-sm-3 control-label">Jenis Kelamin</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="gender" class="form-control">
                                    <option value="Laki Laki">Laki Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="no_kk" class="col-sm-3 control-label">Nomor Kartu Keluarga</label>
                            <div class="col-sm-9">
                                <input type="text" name="no_kk" class="form-control" placeholder="Inputkan Nomor Kartu Keluarga" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_penerima" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_penerima" class="form-control" placeholder="Inputkan Nama Penerima" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nik" class="col-sm-3 control-label">NIK</label>
                            <div class="col-sm-9">
                                <input type="text" name="nik" class="form-control" placeholder="Inputkan Nomor NIK" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="jumlah_bantuan" class="col-sm-3 control-label">Jumlah Bantuan</label>
                            <div class="col-sm-9">
                                <input type="text" name="jumlah_bantuan" class="form-control" placeholder="Inputkan Jumlah Bantuan" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="penanggung" class="col-sm-3 control-label">Nama Penanggung Jawab</label>
                            <div class="col-sm-9">
                                <input type="text" name="penanggung" class="form-control" placeholder="Inputkan Nama Penanggung Jawab" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tanggal" class="col-sm-3 control-label">Tanggal Penerimaan</label>
                            <div class="col-sm-3">
                                <input type="date" name="tanggal" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="status" class="col-sm-3 control-label">Status</label>
                            <div class="col-sm-2 col-xs-9">
                                <select name="status" class="form-control">
                                    <option value="Selesai">Selesai</option>
                                    <option value="Di Batalkan">Di Batalkan</option>
                                    <option value="Dalam Proses">Dalam Proses</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" name="keterangan" class="form-control" placeholder="Inputkan Keterangan">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data Penerima
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    <a href="?page=buku&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Penerima
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if ($_POST) {
    // Ambil data dari form
    $jenis_penerima = $_POST['jenis_penerima'];
    $gender = $_POST['gender'];
    $no_kk = $_POST['no_kk'];
    $nama_penerima = $_POST['nama_penerima'];
    $nik = $_POST['nik'];
    $jumlah_bantuan = $_POST['jumlah_bantuan'];
    $penanggung = $_POST['penanggung'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];
    $keterangan = $_POST['keterangan'];
    $id = $_POST['id']; // Pastikan ID dikirimkan dari form

    // SQL untuk mengupdate data penerima
    $sql = "UPDATE penerima SET 
                jenis_penerima = '$jenis_penerima', 
                gender = '$gender', 
                no_kk = '$no_kk', 
                nama_penerima = '$nama_penerima', 
                nik = '$nik', 
                jumlah_bantuan = '$jumlah_bantuan', 
                penanggung = '$penanggung', 
                tanggal = '$tanggal', 
                status = '$status', 
                keterangan = '$keterangan' 
            WHERE KK = '$KK'";

    // Jalankan query
    $query = mysqli_query($koneksi, $sql) or die("SQL Edit Error");

    // Periksa hasil query
    if ($query) {
        echo "<script>window.location.assign('?page=penerima&actions=tampil');</script>";
    } else {
        echo "<script>alert('Edit Data Gagal');</script>";
    }
}
?>




