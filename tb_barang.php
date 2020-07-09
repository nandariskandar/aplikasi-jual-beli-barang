<?php
require "core/core.php";

$keyword = $_GET["keyword"];

$query1      = "SELECT * FROM tb_barang WHERE
                nama      LIKE '%$keyword%' OR
                harga     LIKE '%$keyword%' OR
                jumlah    LIKE '%$keyword%' OR
                nama      LIKE '%$keyword%'";

$barang                 = query($query1);
// $barang2                 = query("SELECT * FROM barang LIMIT $dataAwal, $jumlahDataPerHalaman");

$jumlahDataPerHalaman   = 5;
$jumlahSeluruhData      = count(query("SELECT * FROM tb_barang"));
$jumlahHalaman          = ceil($jumlahSeluruhData / $jumlahDataPerHalaman);
$halamanAktif           = (isset ($_GET["halaman"])) ? $_GET["halaman"] : 1;
$dataAwal               = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

?>
<!-- PAGINATION -->
<div id="container">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Barang</th>
                    <th>Harga Jual</th>
                    <th>Jumlah</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <?php $no=1;?>
            <?php foreach ($barang as $brng) : ?>
            <tbody>
                <tr>
                    <th scope="row"><?= $no + $dataAwal; ?></th>
                    <td><?= $brng["nama"] ?></td>
                    <td><?= $brng["harga"] ?></td>
                    <td><?= $brng["jumlah"] ?></td>
                    <td>
                        <a href="detail.php?id=<?= $brng["id"]; ?>">
                            <button type="submit" name="detail" id="detail" class="btn btn-warning btn-rounded">Detail</button>
                        </a>
                        <a href="update.php?id=<?= $brng["id"]; ?>">
                            <button type="submit" name="update" id="update" class="btn btn-success btn-rounded">Update</button>
                        </a>
                        <a href="delete.php?id=<?= $brng["id"]; ?>">
                            <button type="submit" name="delete" id="delete" class="btn btn-danger btn-rounded">Delete</button>
                        </a>
                    </td>
                </tr>
            </tbody>
            <?php $no++; ?>
            <?php endforeach;?>
        </table>
</div>

