<?php ?>

<div class=" w-full p-2 flex justify-between mb-2 border-b">
    <p class="text-lg text-gray-500 font-semibold">List User</p>
    <a href="?page=user&c=add" class="btn bg-blue-500 text-white py-1 px-4 rounded-lg shadow">Tambah data</a>

</div>
<table id="table-jadwal" class="table">
    <thead class="text-center sticky-top">
        <tr>
            <th>Nomor</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Alamat</th>
            <th>Gender</th>
            <th>No HP</th>
            <th>NIK</th>
            <th>Level</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

$data_jadwal = mysqli_query($db, "SELECT * from user where level in (2,3)");
$no = 0;
while ($d = mysqli_fetch_array($data_jadwal)) {
    $no++
    ?>
        <tr class="text-base text-center">
            <td><?php echo $no; ?></td>
            <td><?php echo $d['nama']; ?></td>
            <td><?php echo $d['email']; ?></td>
            <td><?php echo $d['alamat']; ?></td>
            <td><?php echo $d['gender']; ?></td>
            <td><?php echo $d['no_hp']; ?></td>
            <td><?php echo $d['nik']; ?></td>
            <td><?php echo $d['level'] == 2 ? 'Admin' : 'Kernet'; ?></td>

            <td>
                <!-- <a href="#" class="w-14 bg-blue-500 text-white p-1 rounded-lg">Edit</a> -->

                <a href="?page=user&c=edit&id=<?php echo $d['id'] ?>" class="btn btn-sm bg-blue-500 text-white p-1 rounded-lg ">Edit</a>
                <button onclick="removeUser(<?php echo $d['id']; ?>)" type='button' class='btn btn-sm bg-red-500 text-white p-1 rounded-lg '>Hapus</button>

            </td>
        </tr>
        <?php
}
?>
    </tbody>
</table>




<script>
   var t =  $('#table-jadwal').DataTable();


function removeUser(id) {

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
                    url: '/transgo/components/super-admin/user/delete.php?id=' + id,
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