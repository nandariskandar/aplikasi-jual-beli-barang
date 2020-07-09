<?php
require "../core/core.php";

$id = $_GET["id"];

$brng   = query("SELECT * FROM tb_barang WHERE id=$id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
    $tittle = "PAGE DETAIL DATA BARANG";
    require "../inc/header.php"; 
    ?>
</head>
<body>
<div class="overlay"></div>
<?php require "../inc/navbar.php"; ?>
      
<div class="page-title">
    <div class="container">
        <h3>Detail Data Barang</h3>
    </div>
</div>

<br>

<div class="container">
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
                    
                <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                </div>
                                <div class="panel-body">
                                    <img id="zoom_01" src="../assets/images/barang/<?= $brng["gambar"]; ?>" data-zoom-image="../assets/images/barang/<?= $brng["gambar"]; ?>" style="width: 100%;"/>
                                </div>
                            </div>
                        </div>
                <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                </div>
                                <table id="user" class="table table-bordered table-striped" style="clear: both">
                <tbody> 
                    <tr>   
                        <td style="font-weight:bold; font-size:20px;">Nama</td>
                        <td style="font-size:20px; width: 70%;">: <?= $brng["nama"]; ?></td>
                    </tr>
                    <tr>   
                        <td style="font-weight:bold; font-size:20px;">Jenis</td>
                        <td style="font-size:20px; width: 70%;">: <?= $brng["jenis"]; ?></td>
                    </tr>
                    <tr>   
                        <td style="font-weight:bold; font-size:20px;">Supplier</td>
                        <td style="font-size:20px; width: 70%;">: <?= $brng["supplier"]; ?></td>
                    </tr>
                    <tr>   
                        <td style="font-weight:bold; font-size:20px;">Modal</td>
                        <td style="font-size:20px; width: 70%;">: <?= $brng["modal"]; ?></td>
                    </tr>
                    <tr>   
                        <td style="font-weight:bold; font-size:20px;">Harga</td>
                        <td style="font-size:20px; width: 70%;">: <?= $brng["harga"]; ?></td>
                    </tr>
                    <tr>   
                        <td style="font-weight:bold; font-size:20px;">Jumlah</td>
                        <td style="font-size:20px; width: 70%;">: <?= $brng["jumlah"]; ?></td>
                    </tr>
                    <tr>   
                        <td style="font-weight:bold; font-size:20px;">Sisa</td>
                        <td style="font-size:20px; width: 70%;">: <?= $brng["sisa"]; ?></td>
                    </tr>

                </tbody>
            </table>
                            </div>
                        </div>
               
                    <a href="barang.php">
                        <button type="button" class="btn btn-success pull-right" style="font-size:16px;">Close</button>
                    </a>

        </div>
    </div>
</div>
</div><!-- Row -->

<?php require "../inc/footer.php"; ?>
</body>
</html>