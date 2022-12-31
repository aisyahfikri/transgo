<?php
$data_user = $_SESSION['user'];
?>

<div class="bg-[#F5F5F5] rounded-2xl w-full p-3 border-[1.2px] border-gray-400 shadow-lg shadow-black">
    <div class="flex flex-col">
        <div class="flex">
            <div class="flex gap-x-4">
                <div class="h-6">
                    <i class="fa-solid fa-user text-lg"></i>
                </div>
                <p class=""><?= $data_user["nama"]; ?></p>
            </div>
        </div>
    </div>
</div>


<div class="bg-[#F5F5F5] mt-4 rounded-2xl w-full p-4 border-[1.2px] border-gray-400 shadow-lg shadow-black">
    <p class="opacity-[0.5] mb-4">User Information</p>
    <div class="flex flex-col gap-4 mb-8">
        <div class="flex gap-4 items-center">
            <div class="flex flex-col">
                <strong class="mb-1">Nama</strong>
                <input type="text" value="<?= $data_user["nama"] ?>" class="rounded-md border-[#BBBBBB] w-[22rem] border-2 px-3 py-1" name="nama" />
            </div>
            <div class="flex flex-col">
                <strong class="mb-1">Email Address</strong>
                <input type="text" value="<?= $data_user["email"] ?>" class="rounded-md border-[#BBBBBB] w-[22rem] border-2 px-3 py-1" name="email" />
            </div>
        </div>
        <div class="flex gap-4 items-center">
            <div class="flex flex-col">
                <strong class="mb-1">Level</strong>
                <input type="text" value="<?= $data_user["level"] ?>" class="rounded-md border-[#BBBBBB] w-[22rem] border-2 px-3 py-1" name="level" />
            </div>
        </div>
    </div>
    <p class="opacity-[0.5] mb-4">Contact Information</p>
    <div class="flex flex-col gap-4 mb-8">
        <div class="flex flex-col">
            <strong class="mb-1">Address</strong>
            <input type="text" value="<?= $data_user["alamat"] ?>" class="rounded-md border-[#BBBBBB] w-[22rem] border-2 px-3 py-1" name="alamat" />
        </div>
        <div class="flex gap-4 items-center">
            <div class="flex flex-col">
                <strong class="mb-1">Nomor Handphone</strong>
                <input type="text" value="<?= $data_user["no_hp"] ?>" class="rounded-md border-[#BBBBBB] w-[22rem] border-2 px-3 py-1" name="no_hp" />
            </div>
        </div>
    </div>
    <button class="w-[15rem] text-white bg-[#5E72E4] shadow-md py-2 rounded-md">Update Profile</button>
</div>