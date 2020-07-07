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