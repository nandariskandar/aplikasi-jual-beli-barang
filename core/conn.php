
<?php

$servername             = "localhost";
$username               = "root";
$password               = "";
$dbname                 = "malasngoding_kios";

$conn                   = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo mysqli_error . "salah woi";
    exit;
}