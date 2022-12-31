<?php ?>

<div class=" w-full p-2 flex justify-between mb-2 border-b">
    <p class="text-lg text-gray-500 font-semibold"> List Bus</p>
    <a href="?page=bus&c=add" class="btn bg-blue-500 text-white py-1 px-4 rounded-lg shadow">Tambah data</a>

</div>
<table id="table-user" class="table">
    <thead class="text-center sticky-top">
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Plat</th>
            <th>Kursi</th>
            <th>Fasilitas</th>
            <th>Kelas</th>
            <th>Harga</th>
            <th>Kernet</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

$data_bus = mysqli_query($db, "SELECT `bus`.`id`, `bus`.`nama`, `plat`, `kursi`, `fasilitas`, `kelas`, `harga`, `kernet`, `gambar`, user.nama as nama_kernet FROM `bus` join user  on bus.kernet = user.id");
$no = 0;
while ($d = mysqli_fetch_array($data_bus)) {
    $no++
    ?>
        <tr class="text-base text-center">
            <td><?php echo $no; ?></td>
            <td><?php echo $d['nama']; ?></td>
            <td><?php echo $d['plat']; ?></td>
            <td><?php echo $d['kursi']; ?></td>
            <td><?php echo $d['fasilitas']; ?></td>
            <td><?php echo $d['kelas']; ?></td>
            <td><?php echo $d['harga']; ?></td>
            <td><?php echo $d["nama_kernet"]; ?></td>
            <td><img src="<?php echo $d['gambar']; ?>" alt="bus"></td>
            <td>
                <!-- <a href="#" class="w-14 bg-blue-500 text-white p-1 rounded-lg">Edit</a> -->

                <a href="?page=bus&c=edit&id=<?php echo $d['id'] ?>" class="btn btn-sm bg-blue-500 text-white p-1 rounded-lg ">Edit</a>
                <!-- <a href="?page=bus&id="
                    class="btn btn-sm bg-red-500 alert_notif text-white p-1 rounded-lg">Hapus</a> -->
                <button onclick="removeTodo(<?php echo $d['id']; ?>)" type='button' class='btn btn-sm bg-red-500 text-white p-1 rounded-lg '>Hapus</button>
            </td>
        </tr>
        <?php
}
?>
    </tbody>
</table>




<script>
    console.log("hellow world");
   var t =  $('#table-user').DataTable();

function removeTodo(id) {

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
                    url: '/transgo/components/admin/bus/delete.php?id=' + id,
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
    }

    // t.on('order.dt search.dt', function () {
    //     let i = 1;

    //     t.cells(null, 0, { search: 'applied', order: 'applied' }).every(function (cell) {
    //         this.data(i++);
    //     });
    // }).draw();
</script>