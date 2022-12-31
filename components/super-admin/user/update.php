<?php
$row;
$db = mysqli_connect("localhost", "root", "", "transgo");

$id = $_GET['id'];
$data = mysqli_query($db, "SELECT * from user where id = $id");
$row = mysqli_fetch_assoc($data);

?>

<div class="w-full p-2 flex justify-between mb-2 border-b">
    <p class="text-lg text-gray-500 font-semibold"><?=$_GET['c'] == 'add' ? 'Tambah' : 'Ubah';?> data bus</p>
</div>
<div class="container max-w-screen-sm" >
    <form id="formedituser" autocomplete="off">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input value="<?=$row['nama']?>"  type="text" class="form-control" name="nama" id="nama"
                placeholder="Silakan inputkan nama user...">

        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input value="<?=$row['email']?>" type="email" class="form-control" id="email" placeholder="inputkan email email user..."
                name="email">
        </div>
        <div class="mb-3">
            <label for="sandi" class="form-label">Sandi</label>
            <input  value="<?=$row['sandi']?>" type="password" class="form-control" id="sandi" placeholder="inputkan jumlah sandi login user..." name="sandi">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input value="<?=$row['alamat']?>" type="text" class="form-control" id="alamat" placeholder="Silakan masukkan alamat..." name="alamat">
        </div>
        <div class="mb-3">
            <label for="gender" class="form-label">Gender</label>
            <input value="<?=$row['gender']?>" type="text" class="form-control" id="gender" placeholder="Silakan masukkan gender..." name="gender">
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input value="<?=$row['no_hp']?>" type="text" class="form-control" id="no_hp" placeholder="Silakan masukkan no_hp..." name="no_hp">
        </div>

        <div class="mb-3">
            <label for="nik" class="form-label">NIK</label>
            <input value="<?=$row['nik']?>" type="text" class="form-control" id="nik" placeholder="Silakan masukkan nik..." name="nik">
        </div>

         <div class="mb-3 flex flex-col ">
            <label for="level" class="form-label">Level</label>
            <select class="p-2 rounded-md border" name="level" id="level" aria-label="Default select example">
                <option value="" selected>Pilih level</option>
                <option value="2" <?php echo $row['level'] == 2 ? 'selected' : '' ?>>Admin</option>
                <option value="3" <?php echo $row['level'] == 3 ? 'selected' : '' ?>
 selected>Kernet</option>
            </select>
        </div>


        <button type="submit"  class="w-full py-2 bg-[#5e72e4] text-white rounded-lg">Submit</button>
    </form>
</div>


<script>
 $('#formedituser').validate({ // initialize the plugin
        rules: {
            nama: {
                required: true,
                minlength: 3
            },
            email: {
                required: true,
                minlength: 4
            },
             sandi: {
                required: true,
                minlength: 6

            },
             alamat: {
                required: true,
                minlength: 2
            },
             gender: {
                required: true,
                minlength: 2
            },
             no_hp: {
                required: true,
                minlength: 1
            },
              nik: {
                required: true,
                number: true
            },
            level: {
                required: true,
            },
        },
        messages: {
                nama: {
                required: 'Field wajib diisi!',
            },
            email: {
                required: 'Field wajib diisi!',
            },
             sandi: {
                required: 'Field wajib diisi!',
            },
             alamat: {
                required: 'Field wajib diisi!',
            },
             gender: {
                required: 'Field wajib diisi!',
            },
             no_hp: {
                required: 'Field wajib diisi!',
            },
              nik: {
                required: 'Field wajib diisi!',
            },
            level: {
                required: 'Field wajib diisi!',
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
                url: '/transgo/components/super-admin/user/proses.php?c=edit&id=' + id,
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
                            window.location.href = 'dashboard.php?page=user';
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