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

    $nama       = $_POST["nama"];
    $username   = $_POST["username"];
    $email      = $_POST["email"];
    $password   = $_POST["password"];
    $passwordConfirm   = $_POST["passwordConfirm"];

    // cek email
    $result     = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
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
    $password   = hash('sha256', $password);
    var_dump ($password);die;
}