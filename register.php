<?php
require "core/core.php";

if(isset($_POST["submit"])){
    // var_dump($_POST);die;
    if (register($_POST) > 0) {
        echo "<script>
        alert('Data berhasil di tambahkan');
        document.location.href = 'login.php';
        </script>" ;
    }else{
        echo "<script>
        alert('Data gagal di tambahkan');
        </script>" ;
    }
}



?>
<!DOCTYPE html>
<html>
    <head>
    <?php require "inc/header.php"; ?>
    </head>
    <body class="page-register">
        <main class="page-content">
            <div class="page-inner">
                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-3 center">
                            <div class="login-box">
                                <a href="" class="logo-name text-lg text-center">
                                    <img src="assets/images/logo.png" width="80" alt="">
                                </a>
                                <p class="text-center m-t-md">Create a account</p>
                                <form class="m-t-md" action="" method="POST">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nama" id="username" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="username" id= "username" placeholder="Username" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" name="passwordConfirm" id="passwordConfirm" placeholder="Password Confirm" required>
                                    </div>
                                    <label>
                                        <input type="checkbox"> Agree the terms and policy
                                    </label>
                                    <button type="submit" name="submit" class="btn btn-success btn-block m-t-xs">Submit</button>
                                    <p class="text-center m-t-xs text-sm">Already have an account?</p>
                                    <a href="login.php" class="btn btn-default btn-block m-t-xs">Login</a>
                                </form>
                                <p class="text-center m-t-xs text-sm">2020 &copy; Modern by Nariskan.</p>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
	

    <?php require "inc/footer.php"; ?>

    </body>
</html>