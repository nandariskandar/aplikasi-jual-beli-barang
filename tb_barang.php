<?php
require "core/core.php";

$keyword = $_GET["keyword"];

$query      = "SELECT * FROM barang WHERE
nama      LIKE '%$keyword%' OR
harga     LIKE '%$keyword%' OR
jumlah    LIKE '%$keyword%' OR
nama      LIKE '%$keyword%'";

$barang     = query($query);


?>

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
                               <th scope="row"><?= $no; ?></th>
                               <td><?= $brng["nama"] ?></td>
                               <td><?= $brng["harga"] ?></td>
                               <td><?= $brng["jumlah"] ?></td>
                               <td>
                                   <button type="button" class="btn btn-info btn-rounded">Detail</button>
                                    <button type="button" class="btn btn-warning btn-rounded">Edit</button>
                                    <button type="button" class="btn btn-danger btn-rounded">Delete</button>
                               </td>
                            </tr>
                       </tbody>
                       <?php $no++; ?>
                       <?php endforeach;?>
                    </table>