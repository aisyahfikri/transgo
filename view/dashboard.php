<?php
include '../config/db.php';

?>



<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   <title>Dashboard | Transgo</title>
   <link rel="stylesheet" href="../style/style.css">
   <link rel="stylesheet" type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
   <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
   </link>
   <link href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
   </link>
   <link href="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>

   <script src="http://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
   <script src="https://cdn.tailwindcss.com"></script>

   <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
   <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
   <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
   <script src="https://kit.fontawesome.com/76fa34e3e0.js" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.2/dist/jquery.validate.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
   <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>

   <style>
    .error {
            color: red;
            padding: 2px 4px;
            margin:5px;
            background-color:transparent;
         }

     .exportexcel{

     }
   </style>
</head>

<body>
   <div class="bg-gray-100 flex container-dashboard gap-5">
      <div class="flex-[1]">
         <?php include '../components/sidebar.php';?>
      </div>
      <div class="flex-[4]">
         <?php if (isset($_GET['page'])) {?>
         <div class="h-14 w-full" style="">
            <p class="text-xl text-white font-semibold"> <span class="text-gray-300">Pages</span> / <?=ucfirst($_GET['page']);?></p>
         </div>
         <?php } else {
    echo '<h1 class="text-center text-3xl text-white font-bold my-5">Selamat Datang di T r a n s G o</h1>';
}
?>

         <div class="overflow-auto w-full max-h-[80vh] rounded-xl">
            <?php
if (isset($_GET['page'])) {
    $page = $_GET['page'];

    switch ($page) {
        case 'bus':
            include '../components/admin/bus/bus.php';
            break;
        case 'jadwal':
            include '../components/admin/jadwal/jadwal.php';
            break;
        case 'user':
            include '../components/super-admin/user/user.php';

            break;
        case 'profile':
            include '../components/profile/profile.php';
            break;
        default:
            echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
    }
} else {
    include '../components/dashboard.php';

}
?>

         </div>
      </div>
   </div>
</body>

</html>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>
<script>
   var timepicker = new TimePicker('time', {
  lang: 'en',
  theme: 'dark'
});

var input = document.getElementById('time');

timepicker.on('change', function(evt) {

  var value = (evt.hour || '00') + ':' + (evt.minute || '00');
  evt.element.value = value;

});


</script>