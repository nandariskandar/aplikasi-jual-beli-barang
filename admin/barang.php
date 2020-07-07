<?php
// session_start();
require "../core/core.php";

// PAGINATION
$jumlahDataPerHalaman   = 5;
$jumlahSeluruhData      = count(query("SELECT * FROM barang"));
$jumlahHalaman          = ceil($jumlahSeluruhData / $jumlahDataPerHalaman);
$halamanAktif           = (isset ($_GET["halaman"])) ? $_GET["halaman"] : 1;
$dataAwal               = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

$barang     = query("SELECT * FROM barang LIMIT $dataAwal, $jumlahDataPerHalaman");

if(isset($_POST["cari"])){
    $barang = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php require "inc/header.php"; ?>
</head>
<div class="overlay"></div>
<?php require "inc/navbar.php"; ?>
      
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
                   <table class="table">
                       <thead>
                           <tr>
                               <th>No</th>
                               <th>Nama Barang</th>
                               <th>Harga Jual</th>
                               <th>Jumlah</th>
                               <th>Opsi</th>
                           </tr>
                       </thead>
                       <?php $no=1;?>
                       <?php foreach ($barang as $brng) : ?>
                       <tbody>
                           <tr>
                               <th scope="row"><?= $no + $dataAwal; ?></th>
                               <td><?= $brng["nama"] ?></td>
                               <td><?= $brng["harga"] ?></td>
                               <td><?= $brng["jumlah"] ?></td>
                               <td>
                                   <button type="button" class="btn btn-info btn-rounded">Detail</button>
                                    <button type="button" class="btn btn-warning btn-rounded">Edit</button>
                                    <button type="button" class="btn btn-danger btn-rounded">Delete</button>
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
<?php require "inc/footer.php";?>
</body>
</html>     