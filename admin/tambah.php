<?php
require "../core/core.php";


if (isset($_POST["tambah"])) {
    // var_dump($_POST);die;
    if (tambah($_POST) > 0) {
        echo "<script>
        alert('Tambah data telah berhasil');
        document.location.href= 'barang.php';
        </script>";
    }else{
        echo "<script>
        alert('Tambah data gagal');
        document.location.href= 'tambah.php';
        </script>";
    }
}

?>

<!DOCTYPE html> 
<html lang="en">
<head>
    <?php
    $tittle = "PAGE TAMBAH DATA BARANG";
    require "../inc/header.php"; 
    ?>
</head>
<body>
<div class="overlay"></div>
<?php require "../inc/navbar.php"; ?>
      
<div class="page-title">
    <div class="container">
        <h3>Tambah Data Barang</h3>
    </div>
</div>

<br>

<div class="container">
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">



    <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="gambar" class="col-sm-2 control-label">Gambar</label>
            <div class="col-sm-10">
                <input type="file" id="gambar" name="gambar" onchange="previewImage();"/>
                <br>
                <img src ="../assets/images/galery.png" width="100" id="image-preview" alt="image preview"/>
                <br>
        </div>
        <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  name="nama" id="nama">
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Jenis</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="jenis" id="jenis" value="makanan">Makanan
                    </label>
                    <label>
                        <input type="checkbox" name="jenis" id="jenis" value="minuman">Minuman
                    </label>
                    <label>
                        <input type="checkbox" name="jenis" id="jenis" value="aksesoris">Aksesoris
                    </label>
                    <label>
                        <input type="checkbox" name="jenis" id="jenis" value="rokok">Rokok
                    </label>
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Supplier</label>
            <div class="col-sm-10">
                <select multiple class="form-control" name="supplier" id="supplier">
                    <option name="supplier" value="PT. Makmur Jaya">PT  Makamur Jaya</option>
                    <option name="supplier" value="PT. Surga">PT  Surga</option>
                    <option name="supplier" value="PT. Sido Mulyo">PT  Sido Mulyo</option>
                    <option name="supplier" value="PT. Jamaika">PT  Jamaika</option>
                    <option name="supplier" value="PT. Surya">PT  Surya</option>
                    <option name="supplier" value="PT. Ptan">PT  Ptan</option>
                    <option name="supplier" value="PT. Sampoerna">PT  Sampoerna</option>
                    <option name="supplier" value="PT. Harum">PT  Harum</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Modal</label>
            <div class="col-sm-10">
                <div class="input-group m-b-sm">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" name="modal" id="modal">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Harga</label>
            <div class="col-sm-10">
                <div class="input-group m-b-sm">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" name="harga" id="harga">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-1">
                    <input type="number" class="form-control" name="jumlah" id="jumlah">
                </div>
            </div>
        <div class="form-group pull-right">

            <button type="submit" name="tambah" id="tambah" class="btn btn-success btn-rounded">Tambah</button>
        </div>
        <input type="hidden" class="form-control" name="sisa" id="sisa" value="sisa">

    </form>
    </div>
            </div>
            <a href="barang.php">
                <button type="submit" name="close" id="close" class="btn btn-primary btn-rounded">Close</button>
            </a>
        </dv>
    </dv>
</dv>

<script src="../assets/js/script1.js"></script>

<?php require "../inc/footer.php"; ?>
</body>
</html>