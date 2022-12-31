<?php
include '../../../config/db.php';

$data = $_GET['id'];

//gunakan fungsi di bawah ini agar session bisa dibuat
session_start();

//hapus data dari tabel kontak
$delete = mysqli_query($db, "delete from jadwal where id=" . $data);

if ($delete) {
    //set session sukses
    $_SESSION["sukses"] = 'Data Berhasil Dihapus';

    //redirect ke halaman index.php
    // header('Location: /transgo/view/dashboard.php?page=bus');
    echo json_encode(array("status" => true));
}
