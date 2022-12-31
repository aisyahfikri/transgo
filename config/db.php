<?php
$db = mysqli_connect("localhost","root","","transgo");

if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>