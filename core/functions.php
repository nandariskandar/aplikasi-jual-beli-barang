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

    $nama          = htmlspecialchars(stripslashes(strtolower($data["nama"])));
    $jenis         = htmlspecialchars(stripslashes(strtolower($data["jenis"])));
    $supplier      = htmlspecialchars(stripslashes(strtolower($data["supplier"])));
    $modal         = htmlspecialchars(stripslashes(strtolower($data["modal"])));
    $harga         = htmlspecialchars(stripslashes(strtolower($data["harga"])));
    $jumlah        = htmlspecialchars(stripslashes(strtolower($data["jumlah"])));
    $sisa          = htmlspecialchars(stripslashes(strtolower($data["sisa"])));
    
    // cek
    $result         = mysqli_query($conn, "INSERT INTO tb_barang VALUES
                        ('', '$nama', '$jenis', '$supplier', '$modal', '$harga', '$jumlah', '$sisa')");

    return mysqli_affected_rows($conn);
}

function delete($id){
    global $conn;

    $query      = "DELETE FROM barang WHERE id=$id";
    $result     = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function update($data){
    global $conn;


    $id            = $data["id"];
    $nama          = htmlspecialchars($data["nama"]);
    $jenis         = htmlspecialchars($data["jenis"]);
    $supplier      = htmlspecialchars($data["supplier"]);
    $modal         = htmlspecialchars($data["modal"]);
    $harga         = htmlspecialchars($data["harga"]);
    $jumlah        = htmlspecialchars($data["jumlah"]);
    
    $query         = "UPDATE tb_barang SET
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