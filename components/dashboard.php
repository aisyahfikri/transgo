<?php
$row;
$db = mysqli_connect("localhost", "root", "", "transgo");

?>

<div class="bg-[#F5F5F5] rounded-2xl w-full p-3 border-[1.2px] border-gray-400 shadow-lg shadow-black">
<table id="table-dashboard" class="table display">
    <thead class="text-center ">
        <tr>
            <th>Nomor</th>
            <th>Nama Pemesan</th>
            <th>Nama Penumpang</th>
            <th>Bus</th>
            <th>Keberangkatan</th>
            <th>Tujuan</th>
            <th>Tanggal</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php

$data_jadwal = mysqli_query($db, "SELECT pemesan.nama as nama_pemesan, pemesanan.nama as nama_penumpang, bus.nama as nama_bus,tfrom.nama as keberangkatan, tto.nama as tujuan,pemesanan.tanggal_keberangkatan , pemesanan.status as status
FROM `pemesanan`
JOIN user as pemesan on pemesanan.user_id = pemesan.id
JOIN bus on pemesanan.bus_id = bus.id
JOIN jadwal on jadwal.id =  pemesanan.jadwal_id
JOIN terminal as tfrom on tfrom.id = jadwal.from
JOIN terminal as tto on tto.id = jadwal.to");
$no = 0;
while ($d = mysqli_fetch_array($data_jadwal)) {
    $no++
    ?>
        <tr class="text-base text-center">
            <td><?php echo $no; ?></td>
            <td><?php echo $d['nama_pemesan']; ?></td>
            <td><?php echo $d['nama_penumpang']; ?></td>
            <td><?php echo $d['nama_bus']; ?></td>
            <td><?php echo $d['keberangkatan']; ?></td>
            <td><?php echo $d['tujuan']; ?></td>
            <td><?php echo $d['tanggal_keberangkatan']; ?></td>
            <td><?php if ($d['status'] == 1) {
        echo 'Menunggu acc kernet';
    } else if ($d['status'] == 2) {
        echo 'Menunggu check in penumpang';
    } else if ($d['status'] == 3) {
        echo 'Transaksi Sukses';
    } else {
        echo 'Transaksi Gagal';
    }
    ;
    ?></td>


        </tr>
        <?php
}
?>
    </tbody>
</table>
</div>


<script>
    let today = new Date();

    $('#table-dashboard').DataTable({
         dom: 'Bfrtip',
            buttons: [
                {
                    extends: 'excel',
                    text: "Export ke excel" ,
                    className: 'buttons-excel buttons-html5 py-2 px-3 bg-green-600 rounded-lg exportexcel text-white font-semibold',
                    filename: 'report - '+ today.getDate + today.getMonth + today.getFullYear,
                    action: function(e, dt, button, config) {
                      $.fn.dataTable.ext.buttons.excelHtml5.action.call(this, e, dt, button, config);
                },
                        }
        ]
   });


</script>
