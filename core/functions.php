<?php

function query ($query){
    global $conn;

    $result     = mysqli_query($conn, $query);
    $rows       = [];
    while($row  = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    
    return $rows;
}

function cari ($keyword){
    global $conn;

    $query      = "SELECT * FROM barang WHERE
                    nama      LIKE '%$keyword%' OR
                    harga     LIKE '%$keyword%' OR
                    jumlah    LIKE '%$keyword%' OR
                    nama      LIKE '%$keyword%'";
    $result     = mysqli_query ($conn, $query);

    return query($query);
}

function register($data){
    global $conn;

    $nama               = htmlspecialchars(strtolower(stripslashes($data["nama"])));
    $username           = htmlspecialchars(strtolower(stripslashes($data["username"])));
    $email              = htmlspecialchars(strtolower($data["email"]));
    $password           = mysqli_real_escape_string($conn, $data["password"]);
    $passwordConfirm    = mysqli_real_escape_string($conn, $data["passwordConfirm"]);

    // cek email
    $result             = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
        alert ('Email sudah ada yang pakai');
        </script>";
        return false;
    }

    // cek password
    if ($password !== $passwordConfirm) {
        echo "<script>
        alert ('Passowrd tidak sesuai');
        </script>";
        return false;
    }

    // generate password
    $password   = password_hash($password, PASSWORD_DEFAULT);

    $query1     = "INSERT INTO users VALUES ('', '$nama', '$username','$email','$password')";
    $result2    = mysqli_query($conn, $query1);

    return mysqli_affected_rows($conn);
}

function tambah($data){
    global $conn;

    $gambar         = upload();
    if (!$gambar) {
        return false;
    }
    
    $nama          = htmlspecialchars(stripslashes($data["nama"]));
    $jenis         = htmlspecialchars(stripslashes($data["jenis"]));
    $supplier      = htmlspecialchars(stripslashes($data["supplier"]));
    $modal         = htmlspecialchars(stripslashes($data["modal"]));
    $harga         = htmlspecialchars(stripslashes($data["harga"]));
    $jumlah        = htmlspecialchars(stripslashes($data["jumlah"]));
    $sisa          = htmlspecialchars(stripslashes($data["sisa"]));
    
    // cek
    $result         = mysqli_query($conn, "INSERT INTO tb_barang VALUES
                        ('', '$gambar', '$nama', '$jenis', '$supplier', '$modal', '$harga', '$jumlah', '$sisa')");

    return mysqli_affected_rows($conn);
}

function delete($id){
    global $conn;

    $query      = "DELETE FROM tb_barang WHERE id=$id";
    $result     = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update($data){
    global $conn;

    $id             = $data["id"];
    $gambarLama     = $data["gambarLama"];

    if ($_FILES["gambar"]["error"] === 4 ) {
        $gambar     = $gambarLama;
    }else{
        $gambar     = upload();
    }
    
    $nama          = htmlspecialchars($data["nama"]);
    $jenis         = htmlspecialchars($data["jenis"]);
    $supplier      = htmlspecialchars($data["supplier"]);
    $modal         = htmlspecialchars($data["modal"]);
    $harga         = htmlspecialchars($data["harga"]);
    $jumlah        = htmlspecialchars($data["jumlah"]);
    
    $query         = "UPDATE tb_barang SET
                    gambar      =   '$gambar',
                    nama        =   '$nama',
                    jenis       =   '$jenis',
                    supplier    =   '$supplier',
                    modal       =   '$modal',
                    harga       =   '$harga',
                    jumlah      =   '$jumlah'
                    WHERE id=$id";

    $result         = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    global $conn;

    $fileName       = $_FILES["gambar"]["name"];
    $fileSize       = $_FILES["gambar"]["size"];
    $error          = $_FILES["gambar"]["error"];
    $tmpName        = $_FILES["gambar"]["tmp_name"];

    if($error === 4){
        echo "<script>
        alert('gambar belum di update');
        </script>";
        return false;
    }
    
    $ekstensiValid  = ["jpeg", "jpg", "png"];
    $ekstensi       = explode('.', $fileName);
    $ekstensi       = strtolower(end($ekstensi));
    if(!in_array($ekstensi, $ekstensiValid)){
        echo "<script>
        alert('file bukan format gambar');
        </script>";
        return false;
    }

    if ($fileSize > 100000) {
        echo "<script>
        alert('gambar terlalu besar');
        </script>";
        return false;
    }
    

    // generate
    $newFileName    = uniqid();
    $newFileName    .= ".";
    $newFileName    .= $ekstensi;

    // move
    move_uploaded_file($tmpName, "../assets/images/barang/$newFileName");
    return $newFileName;
}