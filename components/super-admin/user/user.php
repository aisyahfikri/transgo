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

    $('.alert_notif').on('click', function () {
        var getLink = $(this).attr('href');
        Swal.fire({
            title: "Yakin hapus data?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            confirmButtonText: 'Ya',
            cancelButtonColor: '#3085d6',
            cancelButtonText: "Batal"

        }).then(result => {

            if (result.isConfirmed) {

                $.ajax({
                    type: "DELETE",
                    url: '/transgo/components/admin/jadwal/delete.php?id=' + getLink,
                    dataType: 'json',
                    success: function (data) {
                        console.log(data)
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'data berhasil dihapus',
                            timer: 3000,
                            showConfirmButton: false
                        }).then(res => {
                            window.location.reload();
                        })


                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.status);
                        if (xhr.status == 200) {
                            window.location.reload();
                        }

                        console.log(thrownError);
                    }
                })
            }
        })
        return false;
    });
</script>