<?php
require_once 'koneksi.php';

// script untuk proses update barang ke database 
if (!empty($_POST['nama_barang'])) {
    // menangkap data post 
    $nama_barang = $_POST['nama_barang'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $tanggal = $_POST['tanggal'];
    $id = $_POST['id_barang'];

    $data = [$nama_barang, $stok, $harga, $tanggal, $id];

    // simpan data barang
    $sql = 'UPDATE tabel_barang SET nama_barang=?,stok=?,harga_barang=?,tgl_masuk=? WHERE id_barang=?';
    $row = $koneksi->prepare($sql);
    $row->execute($data);

    // redirect
    header("Location: index.php");
	exit();
}

// menampilkan data barang berdasarkan id barang
$id = $_GET['id'];
$sql = "SELECT * FROM tabel_barang WHERE id_barang=?";
$row = $koneksi->prepare($sql);
$row->execute(array($id));
$hasil = $row->fetch();
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Update Barang - <?php echo $hasil['nama_barang']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <br/>
    <h3>Update Barang - <?php echo $hasil['nama_barang']; ?></h3>
    <br/>
    <div class="row">
        <div class="col-lg-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" value="<?php echo $hasil['nama_barang']; ?>" class="form-control"
                           name="nama_barang">
                </div>
                <div class="form-group">
                    <label>Stok</label>
                    <input type="number" value="<?php echo $hasil['stok']; ?>" class="form-control" name="stok">
                </div>
                <div class="form-group">
                    <label>Harga Barang</label>
                    <input type="text" value="<?php echo $hasil['harga_barang']; ?>" class="form-control"
                           name="harga">
                </div>
                <div class="form-group">
                    <label>Tanggal</label>
                    <input type="date" value="<?php echo $hasil['tgl_masuk']; ?>" class="form-control" name="tanggal">
                </div>
                <input type="hidden" value="<?php echo $hasil['id_barang']; ?>" name="id_barang">
                <button class="btn btn-success btn-md" name="create"><i class="fa fa-edit"> </i> Update</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>