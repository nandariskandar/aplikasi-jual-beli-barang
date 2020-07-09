<?php
require "../core/core.php";

$id   = $_GET["id"];

if(isset($_POST["update"])){
    var_dump($_POST);die;
  if(update($_POST) > 0){
    echo "<script>
    alert('data berhasil di update');
    document.location.href = 'index.php';
    </script>";
  }else{
    echo "<script>
    alert('data gagal di update');
    document.location.href = '#';
    </script>";
  }
}

$brng = query("SELECT * FROM barang WHERE id=$id")[0];

?>

<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="theme-color" content="#333">
    <title>Curva Footwear</title>
    <meta name="description" content="Material Style Theme">
    <link rel="shortcut icon" href="assets/img/favicon.png?v=3">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../assets/css/preload.min.css">
    <link rel="stylesheet" href="../assets/css/plugins.min.css">
    <link rel="stylesheet" href="../assets/css/style.light-blue-500.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
<header class="ms-header ms-header-dark">
  
        <!--ms-header-dark-->
        <div class="container container-full">
        <div class="header-right">
          <a href="../logout.php">
          <i class="glyphicon glyphicon-log-out"></i>
          Logout</a>
      </div>
          <div class="ms-title">
            <a href="index.php">
              <!-- <img src="assets/img/demo/logo-header.png" alt=""> -->
              <span class="ms-logo animated zoomInDown animation-delay-5">C</span>
              <h1 class="animated fadeInRight animation-delay-6">Curva
                <span>Footwear</span>
              </h1>
            </a>
          </div>
        </div>
      </header>


<?php $nama= 'Admin'; ?>
      <div class="ms-hero-page-override ms-hero-img-airplane ms-bg-fixed ms-hero-bg-dark-light">
        <div class="container">
          <div class="text-center">
            <h1 class="no-m ms-site-title color-white center-block ms-site-title-lg mt-2 animated zoomInDown animation-delay-5">Update Item</h1>
           
          </div>
        </div>
      </div>

      <div class="container">
        <div class="card card-primary card-hero animated fadeInUp animation-delay-7">
       
          <div class="card-block">  
          <form class="form-horizontal" action="" method="POST">
              <fieldset>
                <div class="row form-group">
                  <input type="hidden" id="id" name="id" value="<?= $brng["id"]; ?>">
                </div>
                <div class="row form-group">
                  <label for="nama" class="col-md-2 control-label">Nama</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $brng["nama"]; ?>">
                  </div>
                </div>
                <div class="row form-group">
                  <label for="jenis" class="col-md-2 control-label">Jenis</label>
                  <div class="col-md-9">
                    <input type="text" name="jenis" class="form-control" id="jenis" value="<?= $brng["jenis"]; ?>"> </div>
                </div>
                <div class="row form-group">
                  <label for="ukuran" class="col-md-2 control-label">Ukuran</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="ukuran" id="ukuran" value="<?= $brng["ukuran"]; ?>"> </div>
                </div>
                <div class="row form-group">
                  <label for="harga" class="col-md-2 control-label">Harga</label>
                  <div class="col-md-9">
                    <input type="text" class="form-control" name="harga" id="harga" value="<?= $brng["harga"]; ?>"> </div>
                </div>

                <div class="row mt-2">
                  <div class="col-lg-12">
                    <button class="btn btn-raised btn-primary btn-block" name="update" id="update">Update data</button>
                  </div>
                </div>
              </fieldset>
            </form>



        </div>
        </div>
        </div>
        </div>


<script src="../assets/js/script.js"></script>
<!-- <script src="../assets/js/plugins.min.js"></script>
<script src="../assets/js/app.min.js"></script> -->

        </body>
</html>

