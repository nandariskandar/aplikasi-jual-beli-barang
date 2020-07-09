<?php
require "../core/core.php";

$id     = $_GET["id"];


if (delete($id) > 0) {
    echo "<script>
    alert('Data telah berhasil di hapus');
    document.location.href = 'barang.php';
    </script>";
}else{
    echo "<script>
    alert('Data gagal di hapus');
    document.location.href = 'barang.php';
    </script>";
}