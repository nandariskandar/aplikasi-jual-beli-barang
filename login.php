<?php
session_start();
require "core/core.php";

if (isset ($_COOKIE["id"]) && isset ($_COOKIE["key"])) {
    $id      = $_COOKIE["id"];
    $key     = $_COOKIE["key"];

    // cek id
    $result     = mysqli_query($conn, "SELECT * FROM users WHERE id = $id");
    $row        = mysqli_fetch_assoc($result);
    if($key === hash('sha25', $row["password"]) ){
        $_SESSION["login"] = true;
    }
}

if(isset($_SESSION["login"])){
    header("Location: admin/barang.php");
    exit;
}


if (isset($_POST["submit"])) {
    // var_dump($_POST);die;
    
    // ambil email dan password
    $email              = $_POST["email"];
    $password           = $_POST["password"];

    // cek apakah ada email yang sesuai
    $queryUsername      = "SELECT * FROM users WHERE email = '$email'";
    $result             = mysqli_query($conn, $queryUsername);
    
    if (mysqli_num_rows($result) === 1) {
        
        // cek juga apakah password nya sama dengan email dipilih
        $row = (mysqli_fetch_assoc($result));
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;

            // set cookie
            if (isset($_POST["remember"])) {
                setcookie('id', $row["id"], time()+60);
                setcookie('key', hash('sha256', $row["password"]), time()+60);
            }
            header("Location: admin/barang.php");
            exit;
        }
    }else{
        $error = true;
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        
        <!-- Title -->
        <title>Nariskan | Sign in</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        
        <!-- Theme Styles -->
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-login login-alt">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-6 center">
                            <div class="login-box panel panel-dark">
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- <a href="" class="logo-name text-lg"> -->
                                                <img src="assets/images/logo.png" width="100" alt="">
                                            <!-- </a> -->
                                            <p class="login-info">Cara yang sangat baik untuk memamerkan berbagai fitur produk, mengiklankan beberapa produk sekaligus, atau menceritakan kisah merek Anda dalam beberapa bab..</p>
                                            <div class="btn-group btn-group-justified m-t-sm" role="group" aria-label="Justified button group">
                                                <a href="#" class="btn btn-facebook"><i class="fa fa-facebook"></i> Facebook</a>
                                                <a href="#" class="btn btn-twitter"><i class="fa fa-twitter"></i> Twitter</a>
                                                <a href="#" class="btn btn-google"><i class="fa fa-google-plus"></i> Google+</a>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                        <?php if(isset($error))  : ?>
                                            <span style="font-weight:bold; color:red;">Email / Password anda salah !</span>
                                        <?php endif; ?>
                                        
                                            <form action="" method="POST">
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                                </div>
                                                <div class="form-group">
                                                    <input type="checkbox" name="remember" id="remember" class="form-control" placeholder="remember">
                                                    <label for="remember">Remember me !</label>
                                                </div>
                                                <button type="submit" name="submit" class="btn btn-success btn-block">Login</button>
                                            
                                             </form>
                                             
                                             <p class="text-center m-t-xs text-sm">Do not have an account?</p>
                                            <a href="register.php" class="btn btn-default btn-block m-t-md">Create an account</a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
	

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/js/modern.min.js"></script>
        
    </body>
</html>