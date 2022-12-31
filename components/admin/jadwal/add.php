<?php
$row;
$db = mysqli_connect("localhost", "root", "", "transgo");

$getBus = mysqli_query($db, "SELECT * from bus");
$bus = array();
while ($rowBus = mysqli_fetch_array($getBus)) {
    array_push($bus, $rowBus);
}

$getTerminal = mysqli_query($db, "SELECT * from terminal");
$terminal = array();
while ($rowTerminal = mysqli_fetch_array($getTerminal)) {
    array_push($terminal, $rowTerminal);
}

?>

<div class="w-full p-2 flex justify-between mb-2 border-b">
    <p class="text-lg text-gray-500 font-semibold"><?=$_GET['c'] == 'add' ? 'Tambah' : 'Ubah';?> data bus</p>
</div>
<div class="container max-w-screen-sm" id="buscontent">
    <form id="formaddedit" method="post">
         <div class="mb-3 flex flex-col ">
            <label for="busjadwal" class="form-label">Pilih Bus</label>
            <select class="p-2 rounded-md border" name="busjadwal" id="busjadwal" aria-label="Default select example">
                <option value="" selected>Pilih Bus</option>
                <?php foreach ($bus as $val): ?>
                    <option value=<?php echo $val['id']; ?>><?php echo $val['nama']; ?></option>
                <?php endforeach?>
            </select>
        </div>

        <div class="mb-3 flex flex-col ">
            <label for="berangkat" class="form-label">Terminal Keberangkatan</label>
            <select class="p-2 rounded-md border" name="berangkat" id="berangkat" aria-label="Default select example">
                <option value="" selected>terminal keberangkatan</option>
                <?php foreach ($terminal as $val): ?>
                    <option value=<?php echo $val['id']; ?>><?php echo $val['nama']; ?></option>
                <?php endforeach?>
            </select>
        </div>

         <div class="mb-3 flex flex-col ">
            <label for="tujuan" class="form-label">Tujuan</label>
            <select class="p-2 rounded-md border" name="tujuan" id="tujuan" aria-label="Default select example">
                <option value="" selected>Pilih kernet</option>
                <?php foreach ($terminal as $val): ?>
                    <option value=<?php echo $val['id']; ?>><?php echo $val['nama']; ?></option>
                <?php endforeach?>
            </select>
        </div>

        <div class="mb-3 flex flex-col ">
            <label for="time" class="form-label">Jam Keberangkatan</label>
            <input  name='time_start' type="text" id='time' placeholder='Jam' class="p-2" />
        </div>


        <div class="mb-3 flex flex-col ">
            <label for="time" class="form-label">Perkiraan Waktu Tempuh</label>
            <input type="number" name='pwt' id="pwt" placeholder='Jam' class="p-2" />
        </div>


        <button type="submit" name='submit' class="w-full py-2 bg-[#5e72e4] text-white rounded-lg">Submit</button>
    </form>
</div>


<script>
 $('#formaddedit').validate({ // initialize the plugin
        rules: {
            busjadwal: {
                required: true,
            },
            berangkat: {
                required: true,
            },
             tujuan: {
                required: true,
            },
             time_start: {
                required: true,
            },
             pwt: {
                required: true,
            },
        },
        messages: {
                 busjadwal: {
                required: 'Field wajib diisi!',
            },
            berangkat: {
                required: 'Field wajib diisi!',
            },
             tujuan: {
                required: 'Field wajib diisi!',
            },
             time_start: {
                required: 'Field wajib diisi!',
            },
             pwt: {
                required: 'Field wajib diisi!',
            },
        },
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            console.log(window.location.href);

            $.ajax({
                type: 'POST',
                url: '/transgo/components/admin/jadwal/proses.php?c=add' ,
                dataType: "html",
                data: $('form').serialize(),
                success: function(result) {
                    console.log(result);
                    if (JSON.parse(result).status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Berhasil Ubah Data!',
                            timer: 3000,
                            showConfirmButton: false
                        }).then(res => {
                            window.location.href = 'dashboard.php?page=jadwal';
                        })
                    }

                },
                error : function(error) {

                }
            });
            return false;
        }
    });
</script>