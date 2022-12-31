<?php ?>

<div class=" w-full p-2 flex justify-between mb-2 border-b">
    <p class="text-lg text-gray-500 font-semibold"> List Bus</p>
    <a href="?page=jadwal&c=add" class="btn bg-blue-500 text-white py-1 px-4 rounded-lg shadow">Tambah data</a>

</div>
<table id="table-jadwal" class="table">
    <thead class="text-center sticky-top">
        <tr>
            <th>Nomor</th>
            <th>Bus</th>
            <th>Keberangkatan</th>
            <th>Tujuan</th>
            <th>Jam Keberangkatan</th>
            <th>PWT</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

$data_jadwal = mysqli_query($db, "SELECT jadwal.id as id, bus.nama as bus, tfrom.nama as dari, tto.nama as ke, jadwal.time_start as jam_berangkat, jadwal.pwt as pwt FROM `jadwal`
JOIN bus on jadwal.bus_id = bus.id
JOIN terminal as tfrom on tfrom.id = jadwal.from
JOIN terminal as tto on tto.id = jadwal.to
");
$no = 0;
while ($d = mysqli_fetch_array($data_jadwal)) {
    $no++
    ?>
        <tr class="text-base text-center">
            <td><?php echo $no; ?></td>
            <td><?php echo $d['bus']; ?></td>
            <td><?php echo $d['dari']; ?></td>
            <td><?php echo $d['ke']; ?></td>
            <td><?php echo $d['jam_berangkat']; ?></td>
            <td><?php echo $d['pwt']; ?></td>

            <td>
                <!-- <a href="#" class="w-14 bg-blue-500 text-white p-1 rounded-lg">Edit</a> -->

            <a href="?page=jadwal&c=edit&id=<?php echo $d['id'] ?>" class="btn btn-sm bg-blue-500 text-white p-1 rounded-lg ">Edit</a>
            <button onclick="removeJadwal(<?php echo $d['id']; ?>)" type='button' class='btn btn-sm bg-red-500 text-white p-1 rounded-lg '>Hapus</button>

            </td>
        </tr>
        <?php
}
?>
    </tbody>
</table>




<script>
   var t =  $('#table-jadwal').DataTable();



function removeJadwal(id) {

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
                    url: '/transgo/components/admin/jadwal/delete.php?id=' + id,
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