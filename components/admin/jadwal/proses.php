<?php
include '../../../config/db.php';

if ($_GET['c'] == 'add') {
    $insert = mysqli_query($db, "INSERT INTO jadwal SET
    `bus_id`= '" . $_POST['busjadwal'] . "',
    `from`= '" . $_POST['berangkat'] . "',
    `to`= '" . $_POST['tujuan'] . "',
    `time_start` = '" . $_POST['time_start'] . "',
    `pwt`= '" . $_POST['pwt'] . "'

    ");

    if ($insert) {
        echo json_encode(array("status" => true));

    } else {
        echo json_encode(array("status" => false, "message" => mysqli_error($db)));

    }

} else {
    $id = $_GET['id'];
    $data = mysqli_query($db, "SELECT * from jadwal where id = $id");

    if (!$data) {
        echo json_encode(array("status" => false));
        return;
    }

    $update = mysqli_query($db, "UPDATE jadwal SET
    `bus_id`= '" . $_POST['busjadwal'] . "',
    `from`= '" . $_POST['berangkat'] . "',
    `to`= '" . $_POST['tujuan'] . "',
    `time_start` = '" . $_POST['time_start'] . "',
    `pwt`= '" . $_POST['pwt'] . "'
     where id = '" . $_GET['id'] . "'
    ");

    if ($update) {
        echo json_encode(array("status" => true));

    } else {
        echo json_encode(array("status" => false, "message" => mysqli_error($db)));

    }

}
