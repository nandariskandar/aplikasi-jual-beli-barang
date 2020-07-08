<?php
require "../core/core.php";

$id   = $_GET["id"];

$brng = query("SELECT * FROM barang WHERE id=$id")[0];
// var_dump($brng);

if (isset($_POST["update"])) {
    if (update($_POST) > 0) {
        echo "<script>
        alert('Update data telah berhasil');
        </script>";
    }else{
        echo "<script>
        alert('Update data gagal');
        </script>";
    }
}

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
        <h3>Tambah Data Barang</h3>
    </div>
    
</div>

<br>

<div class="container">
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">



    <form class="form-horizontal">
        <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  name="nama" id="nama">
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Jenis</label>
            <!-- <div class="col-sm-10"> -->
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="makanan" id="makanan">Makanan</input>
                </label>
                <label>
                    <input type="checkbox" name="minuman" id="minuman">Minuman</input>
                </label>
                <label>
                    <input type="checkbox" name="aksesoris" id="aksesoris">Aksesoris</input>
                </label>
                <label>
                    <input type="checkbox" name="rokok" id="rokok">Rokok</input>
                </label>
            </div>
            <!-- </div> -->
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Supplier</label>
            <div class="col-sm-10">
                <select multiple class="form-control">
                    <option>PT  Makamur Jaya</option>
                    <option>PT  Surga</option>
                    <option>PT  Sido Mulyo</option>
                    <option>PT  Jamaika</option>
                    <option>PT  Surya</option>
                    <option>PT  Surya</option>
                    <option>PT  Ptan</option>
                    <option>PT  Sampoerna</option>
                    <option>PT  Harum</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="modal" class="col-sm-2 control-label">Modal</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="modal" id="modal">
                </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">Harga</label>
            <div class="col-sm-10">
                <div class="input-group m-b-sm">
                    <span class="input-group-addon">Rp.</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah" class="col-sm-2 control-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="jumlah" id="jumlah">
                </div>
        </div>
        <div class="form-group pull-right">
            <button type="submit" name="update" id="update">Update</button>
            <a href="">
                <button type="submit" name="close" id="close">Close</button>
            </a>
        </div>
    </form>


    </div>
            </div>
        </dv>
        </dv>
        </dv>


<?php require "../inc/footer.php"; ?>
</body>
</html>