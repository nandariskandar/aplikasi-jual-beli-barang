<?php
require "../core/core.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    $tittle = "PAGE GANTI PASS";
    require "../core/core.php"; ?>
</head>
<body>
    
</body>
</html>

<div class="col-md-6">
    <div class="panel panel-white">
        <div class="panel-heading clearfix">
            <h4 class="panel-title">Basic Form</h4>
        </div>
        <div class="panel-body">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Check me out
                    </label>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>


<h3><span class="glyphicon glyphicon-briefcase"></span>  Password</h3>
<br/><br/>
<?php 
if(isset($_GET['pesan'])){
	$pesan=mysql_real_escape_string($_GET['pesan']);
	if($pesan=="gagal"){
		echo "<div class='alert alert-danger'>Password gagal di ganti !!     Periksa Kembali Password yang anda masukkan !!</div>";
	}else if($pesan=="tdksama"){
		echo "<div class='alert alert-warning'>Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div>";
	}else if($pesan=="oke"){
		echo "<div class='alert alert-success'>Password yang anda masukkan tidak sesuai  !!     silahkan ulangi !! </div>";
	}
}
?>

<br/>
<div class="col-md-5 col-md-offset-3">
	<form action="ganti_pass_act.php" method="post">
		<div class="form-group">
			<!-- <input name="user" type="hidden" value="<?php echo $_SESSION['uname']; ?>"> -->
		</div>
		<div class="form-group">
			<label>Password Lama</label>
			<input name="lama" type="password" class="form-control" placeholder="Password Lama ..">
		</div>
		<div class="form-group">
			<label>Password Baru</label>
			<input name="baru" type="password" class="form-control" placeholder="Password Baru ..">
		</div>
		<div class="form-group">
			<label>Ulangi Password</label>
			<input name="ulang" type="password" class="form-control" placeholder="Ulangi Password ..">
		</div>	
		<div class="form-group">
			<label></label>
			<input type="submit"  name="save" class="btn btn-info" value="Simpan">
			<input type="reset" name="reset" class="btn btn-danger" value="reset">
		</div>																	
	</form>
</div>




