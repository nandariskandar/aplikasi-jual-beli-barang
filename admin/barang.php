<?php
session_start();

if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}

require "../core/core.php";

// PAGINATION
$jumlahDataPerHalaman   = 5;
$jumlahSeluruhData      = count(query("SELECT * FROM tb_barang"));
$jumlahHalaman          = ceil($jumlahSeluruhData / $jumlahDataPerHalaman);
$halamanAktif           = (isset ($_GET["halaman"])) ? $_GET["halaman"] : 1;
$dataAwal               = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$barang                 = query("SELECT * FROM tb_barang LIMIT $dataAwal, $jumlahDataPerHalaman");

if(isset($_POST["cari"])){
    $barang = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>

<?php 
$tittle = "PAGE BARANG";
require "../inc/header.php";
?>

</head>
<div class="overlay"></div>
<?php require "../inc/navbar.php"; ?>
      
<div class="page-title">
    <div class="container">
        <h3>Data Barang</h3>
    </div>
    
</div>

<br>
<div class="container">
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="panel panel-white">
            <div class="panel-body">
                <div class="table-responsive project-stats">  
            <div class="col-lg-12 col-md-6">
                <a href="tambah.php">
                    <button type="button" name="tambah" class="btn btn-primary btn-addon m-b-sm"><i class="fa fa-plus"></i> Tambah Data</button>
                </a>
                
                <form action="" method="post">
                    <input type="text" name="keyword" id="keyword">
                    <button type="submit" name="cari" id="cari"><i class="fa fa-search"></i></button>
                </form>
            <div class="pull-right">
<!-- PAGINATION -->
                <ul class="pagination">
                    <?php if ($halamanAktif > 1) : ?> 
                        <li><a href="?halaman<?= $halamanAktif -1; ?>"  aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
                    <?php endif; ?>

                    <?php for ($i=1; $i <= $jumlahHalaman ; $i++) : ?>
                    
                    <?php if($halamanAktif == 1) : ?>
                            <li> <a href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                        <?php else : ?>
                            <li><a href="?halaman=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>

                    <?php endfor; ?>

                    <?php if($halamanAktif < $jumlahHalaman) : ?>
                        <li><a href="?halaman<?= $halamanAktif + 1 ?>" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
                    <?php endif; ?>
                </ul>

            </div>

            </div>

            <div id="container">
                   <table class="table table-hover">
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Nama Barang</th>
                               <th>Harga Jual</th>
                               <th>Jumlah</th>
                               <th>Opsi</th>
                           </tr>
                       </thead>
                       <tbody>
                       <?php $no=1;?>
                       <?php foreach ($barang as $brng) : ?>
                        <tr>
                               <th scope="row"><?= $no + $dataAwal; ?></th>
                               <td><?= $brng["nama"] ?></td>
                               <td><?= $brng["harga"] ?></td>
                               <td><?= $brng["jumlah"] ?></td>
                               <td>
                                    <a href="detail.php?id=<?= $brng["id"]; ?>">
                                        <button type="submit" name="detail" id="detail" class="btn btn-warning btn-rounded">Detail</button>
                                    </a>
                                    <a href="update.php?id=<?= $brng["id"]; ?>">
                                        <button type="submit" name="update" id="update" class="btn btn-success btn-rounded">Update</button>
                                    </a>
                                    <a href="delete.php?id=<?= $brng["id"]; ?>" onclick="return confirm('Are you sure ?');">
                                        <button type="submit" name="delete" id="delete" class="btn btn-danger btn-rounded">Delete</button>
                                    </a>
                               </td>
                            </tr>
                       </tbody>
                       <?php $no++; ?>
                       <?php endforeach;?>
                    </table>
            </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div><!-- Main Wrapper -->
</div><!-- Page Inner -->
</main><!-- Page Content -->

<div class="cd-overlay"></div>
<?php require "../inc/footer.php";?>
</body>
</html>     