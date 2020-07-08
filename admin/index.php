<?php
session_start();
require "../core/core.php";


if(!isset($_SESSION["login"])){
    header("Location: ../login.php");
    exit;
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php
$tittle = "PAGE DASHBOARD";
require "../inc/header.php";
?>
</head>
<div class="overlay"></div>
<?php require "../inc/navbar.php"; ?>
      
<div class="page-title">
    <div class="container">
        <h3>Dashboard</h3>
    </div>
</div>

<br>

<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            
        <!-- <div class="col-md-3 user-profile"> -->
                        <div class="profile-image-container">
                            <img src="../assets/images/avatar.jpg" alt="">
                        </div>
                            <h3 class="text-center">Nandar Iskandar</h3>
                            <p class="text-center">Owner</p>
                        <hr>
                        <ul class="list-unstyled text-center">
                            <li><p><i class="fa fa-map-marker m-r-xs"></i>Jakarta Timur, Indonesia</p></li>
                            <li><p><i class="fa fa-envelope m-r-xs"></i><a href="#">admin1@gmail.com</a></p></li>
                        </ul>
                        <hr>
                    </div>

        <div class="col-lg-8 col-md-6">
            <div class="panel panel-white">
                <div class="panel-body">   
<!-- isi -->
<!-- Photo -->


                                    <div class="col-sm-4">
                                        <div class="stats-info">
                                            <div class="panel-heading">
                                                <h4 class="panel-title">Market Stats</h4>
                                            </div>
                                            <div class="panel-body">
                                                <ul class="list-unstyled">
                                                    <li>Makanan<div class="text-success pull-right">32%<i class="fa fa-level-up"></i></div></li>
                                                    <li>Miuman<div class="text-success pull-right">25%<i class="fa fa-level-up"></i></div></li>
                                                    <li>Internet Explorer<div class="text-success pull-right">16%<i class="fa fa-level-up"></i></div></li>
                                                    <li>Safari<div class="text-danger pull-right">13%<i class="fa fa-level-down"></i></div></li>
                                                    <li>Opera<div class="text-danger pull-right">7%<i class="fa fa-level-down"></i></div></li>
                                                    <li>Mobile &amp; tablet<div class="text-success pull-right">4%<i class="fa fa-level-up"></i></div></li>
                                                    <li>Others<div class="text-success pull-right">3%<i class="fa fa-level-up"></i></div></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel-heading">
                                    <h4 class="panel-title">Server Load</h4>
                                    <div class="panel-control">
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Expand/Collapse" class="panel-collapse"><i class="icon-arrow-down"></i></a>
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Reload" class="panel-reload"><i class="icon-reload"></i></a>
                                    </div>
                                </div>
                                </div>



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