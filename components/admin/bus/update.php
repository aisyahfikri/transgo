<?php
$row;
$db = mysqli_connect("localhost", "root", "", "transgo");

$getKernet = mysqli_query($db, "SELECT * from user where level = 3");
$kernet = array();
while ($rowKernet = mysqli_fetch_array($getKernet)) {
    array_push($kernet, $rowKernet);
}

$id = $_GET['id'];
$data = mysqli_query($db, "SELECT * from bus where id = $id");
$row = mysqli_fetch_assoc($data);

?>

<div class="w-full p-2 flex justify-between mb-2 border-b">
    <p class="text-lg text-gray-500 font-semibold"><?=$_GET['c'] == 'add' ? 'Tambah' : 'Ubah';?> data bus</p>
</div>
<div class="container max-w-screen-sm" id="buscontent">
    <form id="formbusedit" method="post">
        <div class="mb-3">
            <label for="namabus" class="form-label">Nama Bis</label>
            <input value="<?php echo $row['nama']; ?>" type="text" class="form-control" name="namabus" id="namabus"
                placeholder="Silakan inputkan nama bis...">

        </div>
        <div class="mb-3">
            <label for="plat" class="form-label">Plat Nomor</label>
            <input value="<?php echo $row['plat']; ?>" type="text" class="form-control" id="plat" placeholder="inputkan plat nomor kendaraan..."
                name="plat">
        </div>
        <div class="mb-3">
            <label for="kursi" class="form-label">Jumlah Kursi</label>
            <input value="<?php echo $row['kursi']; ?>" type="number" class="form-control" id="kursi" placeholder="inputkan jumlah kursi..." name="kursi">
        </div>
        <div class="mb-3">
            <label for="kelas" class="form-label">Kelas</label>
            <input value="<?php echo $row['kelas']; ?>" type="text" class="form-control" id="kelas" placeholder="Silakan masukkan kelas..." name="kelas">
        </div>
        <div class="mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <input value="<?php echo $row['fasilitas']; ?>" type="text" class="form-control" id="fasilitas" placeholder="Silakan masukkan fasilitas..." name="fasilitas">
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga Tiket</label>
            <input value="<?php echo $row['harga']; ?>" type="number" class="form-control" id="harga" placeholder="Silakan masukkan harga..." name="harga">
        </div>

         <div class="mb-3 flex flex-col ">
            <label for="kernet" class="form-label">Kernet</label>
            <select class="p-2 rounded-md border" name="kernet" id="kernet" aria-label="Default select example">
                <option value="" selected>Pilih kernet</option>
                <?php foreach ($kernet as $val): ?>
                    <option value=<?php echo $val['id']; ?> <?php if ($_GET['c'] == 'edit') {
    if ($row['kernet'] == $val['id']) {
        echo 'selected';
    }

}
?>><?php echo $val['nama']; ?></option>
                <?php endforeach?>
            </select>
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">gambar</label>
            <input value="<?php echo $row['gambar'] ?? null; ?>" type="file" class="form-control" id="gambar" placeholder="Silakan masukkan gambar..." name="gambar">
            <!-- <input class="form-control" type="file" id="formFile"> -->
        </div>

        <button type="submit" name='submit' class="w-full py-2 bg-[#5e72e4] text-white rounded-lg">Submit</button>
    </form>
</div>


<script>
 $('#formbusedit').validate({ // initialize the plugin
        rules: {
            namabus: {
                required: true,
                minlength: 3
            },
            plat: {
                required: true,
                minlength: 4
            },
             kursi: {
                required: true,
                number: true
            },
             kelas: {
                required: true,
                minlength: 2
            },
             fasilitas: {
                required: true,
                minlength: 2
            },
             kernet: {
                required: true,
                minlength: 1
            },
              harga: {
                required: true,
                number: true
            },
            gambar: {
                required: true,
            },
        },
        messages: {
                namabus: {
                    required: 'Field ini wajib diisi!',
                },
                plat: {
                    required: 'Field ini wajib diisi!',
                },
                kursi: {
                    required: 'Field ini wajib diisi!',
                },
                kelas: {
                    required: 'Field ini wajib diisi!',
                },
                fasilitas: {
                    required: 'Field ini wajib diisi!',
                },
                kernet: {
                    required: 'Field ini wajib diisi!',
                },
                 harga: {
                    required: 'Field ini wajib diisi!',
                },
                gambar: {
                    required: 'Field ini wajib diisi!',
                },
        },
        submitHandler: function(form,e) {
            e.preventDefault();
            console.log('Form submitted');
            console.log(window.location.href);
            const id = '<?php echo ($_GET['id']) ?>'
            console.log(id);

            $.ajax({
                type: 'POST',
                url: '/transgo/components/admin/bus/proses.php?c=edit&id=' + id,
                dataType: "html",
                data: $('form').serialize(),
                success: function(result) {

                    if (JSON.parse(result).status) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Sukses',
                            text: 'Berhasil Ubah Data!',
                            timer: 3000,
                            showConfirmButton: false
                        }).then(res => {
                            window.location.href = 'dashboard.php?page=bus';
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