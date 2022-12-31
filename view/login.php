<?php
// menghubungkan dengan koneksi
include '../config/db.php';
// mengaktifkan session php
session_start();

$error = false;

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $error = false;
    // menangkap data yang dikirim dari form

    $email = $_POST['email'];
    $sandi = $_POST['sandi'];
    // menyeleksi data admin dengan email dan sandi yang sesuai

    $data = mysqli_query($db, "select * from user where email='$email' and sandi='$sandi' and (level = 1 or level = 2) ");

    // menghitung jumlah data yang ditemukan

    $cek = mysqli_num_rows($data);
    $row = mysqli_fetch_assoc($data);

    if ($cek > 0) {
        $error = false;
        $_SESSION['user'] = $row;

        header("location: dashboard.php");
    } else {
        $error = true;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Login | TransGo</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../style/style.css">

</head>

<body>
    <div class="container-login justify-evenly items-center">
        <div class="left-login flex-1 flex justify-center items-center">
            <img src="../assets/bus.png" class="w-[20rem] h-[20rem]" alt="bus">
        </div>
        <div class="right-login flex-1 flex justify-evenly items-center">
            <div class="p-10 bg-white rounded-xl space-y-5 w-[500px]">
                <h1 class="text-2xl font-bold">Login</h1>
                <form method="post" action="" class="space-y-3">

                    <div class="flex flex-col">
                        <label for="email">Email</label>
                        <input id="email" name="email" class="border-[0.5px] border-blue-500 rounded-lg w-full p-1" />
                    </div>

                    <div class="flex flex-col">
                        <label for="password">Password</label>
                        <input id="password" name="sandi" type="password"
                            class="border-[0.5px] border-blue-500 rounded-lg w-full p-1" />
                    </div>
                    <?php
echo $error ? '<p class="text-red-600">
                   username atau password salah!
                </p>' : '';
?>
                    <button type="submit" class="w-full p-2 rounded-lg text-white bg-blue-500">Login</button>
                </form>
            </div>
        </div>
    </div>

</html>
​