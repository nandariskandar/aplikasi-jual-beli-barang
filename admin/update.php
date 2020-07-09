<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location : barang.php");
}

require "../core/core.php";

$id     = $_GET["id"];

if (isset($_POST["update"])) {
    // var_dump($_POST);die;
    if (update($_POST) > 0) {
        echo "<script>
        alert('Update data telah berhasil');
        document.location.href = 'barang.php';
        </script>";
    }else{
        echo "<script>
        alert('Update data gagal');
        document.location.href = 'update.php';
        </script>";
    }
}  

// $id   = $_GET["id"];
$brng = query("SELECT * FROM tb_barang WHERE id=$id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    $tittle = "PAGE UPDATE";
    require "../inc/header.php"; 
    ?>
</head>
<body>
<div class="overlay"></div>
<?php require "../inc/navbar.php"; ?>
      
<div class="page-title">
    <div class="container">
        <h3>Update Data Barang</h3>
    </div>
</div>

<br>

<div class="container">
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">

    <form class="form-horizontal" action="" method="POST">
        <input type="hidden" class="form-control" name="id" id="id" value="<?= $brng["id"];  ?>">
        <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $brng["nama"];  ?>">
                </div>
        </div>
        <div class="form-group">
            <label for="jenis" class="col-sm-2 control-label">Jenis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jenis" id="jenis" value="<?= $brng["jenis"];  ?>">
                </div>
        </div>
        <div class="form-group">
            <label for="supplier" class="col-sm-2 control-label">Supplier</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="supplier" id="supplier" value="<?= $brng["supplier"];  ?>">
                </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-sm-2 control-label">Supplier</label>
            <div class="col-sm-10">
                <select multiple class="form-control" name="supplier" id="supplier">
                    <option name="supplier" id="supplier" value="PT. Makmur Jaya">PT  Makamur Jaya</option>
                    <option name="supplier" id="supplier" value="PT. Surga">PT  Surga</option>
                    <option name="supplier" id="supplier" value="PT. Sido Mulyo">PT  Sido Mulyo</option>
                    <option name="supplier" id="supplier" value="PT. Jamaika">PT  Jamaika</option>
                    <option name="supplier" id="supplier" value="PT. Surya">PT  Surya</option>
                    <option name="supplier" id="supplier" value="PT. Ptan">PT  Ptan</option>
                    <option name="supplier" id="supplier" value="PT. Sampoerna">PT  Sampoerna</option>
                    <option name="supplier" id="supplier" value="PT. Harum">PT  Harum</option>
                </select>
            </div>
        </div> -->
        <div class="form-group">
            <label for="modal" class="col-sm-2 control-label">Modal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="modal" id="modal" value="<?= $brng["modal"];  ?>">
                </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-sm-2 control-label">Modal</label>
            <div class="col-sm-10">
                <div class="input-group m-b-sm">
                    <span class="input-group-addon">Rp.</span>
                    <input type="number" class="form-control" name="modal" id="modal" value="">
                </div>
            </div>
        </div> -->
        <div class="form-group">
            <label for="harga" class="col-sm-2 control-label">Harga</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="harga" id="harga" value="<?= $brng["harga"]; ?>">
                </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-sm-2 control-label">Harga</label>
            <div class="col-sm-10">
                <div class="input-group m-b-sm">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" name="harga" id="harga" value="">
                </div>
            </div>
        </div> -->
        <div class="form-group">
            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?= $brng["jumlah"];  ?>">
                </div>
        </div>
        <!-- <div class="form-group">
            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-1">
                    <input type="text" class="form-control" name="jumlah" id="jumlah" value="">
                </div>
        </div> -->
        <div class="form-group pull-right">
                <button type="submit" name="update" id="update" class="btn btn-success btn-rounded">update</button>
        </div>
    </form>
            <a href="barang.php">
                <button type="submit" name="close" id="close" class="btn btn-primary btn-rounded">Close</button>
            </a>


    </div>
            </div>
        </dv>
    </dv>
</dv>


<?php require "../inc/footer.php"; ?>
</body>
</html>