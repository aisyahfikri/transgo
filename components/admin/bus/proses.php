<?php
include '../../../config/db.php';

if ($_GET['c'] == 'add') {
    $insert = mysqli_query($db, "INSERT INTO bus (nama,plat,kursi,fasilitas,kelas,harga,kernet,gambar)
                VALUES (
                '" . $_POST['namabus'] . "',
                ' " . $_POST['plat'] . "',
                 '" . $_POST['kursi'] . "',
                 '" . $_POST['fasilitas'] . "',
                '" . $_POST['kelas'] . "',
                '" . $_POST['harga'] . "',
                  '" . $_POST['kernet'] . "',
                 '" . $_POST['namabus'] . "'
                )
                ");

    if ($insert) {
        echo json_encode(array("status" => true));

    } else {
        echo json_encode(array("status" => false, "message" => mysqli_error($koneksi)));

    }

} else {
    $id = $_GET['id'];
    $data = mysqli_query($db, "SELECT * from bus where id = $id");
    $update = mysqli_query($db, "UPDATE bus SET
    `nama`= '" . $_POST['namabus'] . "',
    `plat`= '" . $_POST['plat'] . "',
    `kursi`= '" . $_POST['kursi'] . "',
    `fasilitas` = '" . $_POST['fasilitas'] . "',
    `kelas`= '" . $_POST['kelas'] . "',
    `harga`=' " . $_POST['harga'] . "',
    `kernet` ='" . $_POST['kernet'] . "',
    `harga`= '" . $_POST['harga'] . "',
    `gambar` = '" . $_POST['namabus'] . "'
     where id = '" . $_GET['id'] . "'
    ");

    if ($update) {
        echo json_encode(array("status" => true));

    } else {
        echo json_encode(array("status" => false, "message" => mysqli_error($koneksi)));

    }

}
