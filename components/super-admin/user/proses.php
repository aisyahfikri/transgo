<?php
include '../../../config/db.php';

if ($_GET['c'] == 'add') {
    $insert = mysqli_query($db, "INSERT INTO user SET
    `nama`= '" . $_POST['nama'] . "',
    `email`= '" . $_POST['email'] . "',
    `sandi`= '" . $_POST['sandi'] . "',
    `alamat` = '" . $_POST['alamat'] . "',
    `gender`= '" . $_POST['gender'] . "',
    `no_hp`= '" . $_POST['no_hp'] . "',
    `nik`= '" . $_POST['nik'] . "',
    `level`= '" . $_POST['level'] . "'

    ");

    if ($insert) {
        echo json_encode(array("status" => true));

    } else {
        echo json_encode(array("status" => false, "message" => mysqli_error($db)));

    }

} else {
    $id = $_GET['id'];
    $data = mysqli_query($db, "SELECT * from user where id = $id");

    if (!$data) {
        echo json_encode(array("status" => false));
        return;
    }

    $update = mysqli_query($db, "UPDATE user SET
     `nama`= '" . $_POST['nama'] . "',
    `email`= '" . $_POST['email'] . "',
    `sandi`= '" . $_POST['sandi'] . "',
    `alamat` = '" . $_POST['alamat'] . "',
    `gender`= '" . $_POST['gender'] . "',
    `no_hp`= '" . $_POST['no_hp'] . "',
    `nik`= '" . $_POST['nik'] . "',
    `level`= '" . $_POST['level'] . "'
    where id = " . $_GET['id'] . "
    ");

    if ($update) {
        echo json_encode(array("status" => true));

    } else {
        echo json_encode(array("status" => false, "message" => mysqli_error($db)));

    }

}
