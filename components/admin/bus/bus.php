<?php ?>


<div class="bg-[#F5F5F5] rounded-2xl w-full p-3 border-[1.2px] border-gray-400 shadow-lg shadow-black">
    <?php
if (isset($_GET['c'])) {
    $page = $_GET['c'];

    switch ($page) {
        case 'list':
            include 'read.php';
            break;
        case 'add':
            include 'add.php';
            break;
        case 'edit':
            include 'update.php';
            break;
        default:
            echo "<center class='text-white'><h3>Maaf. Halaman tidak di temukan !</h3></center>";
            break;
    }
} else {
    include 'read.php';
}

?>
</div>



<!--  -->


<script>


</script>