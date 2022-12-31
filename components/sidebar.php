<?php
session_start();?>
<div class="rounded-xl h-full bg-[#F5F5F5] border-[1.2px] border-gray-400 relative shadow">
    <div class="p-3 border-b border-b-gray-400 mx-3">
       <a href="/transgo/view/dashboard.php" class="hover:no-underline"> <h2 class="font-bold text-xl text-center">
            T r a n s G o
        </h2>
        </a>
    </div>

    <div class="flex flex-col mt-10 pl-3">
        <a class="flex gap-5 m-3 items-center" href="?page=profile">
            <i class="fa-regular fa-user text-orange-500"></i>
            <span class="text-gray-500 font-semibold">Admin Profile</span>
        </a>

    <?php if ($_SESSION['user']['level'] == '1') {?>
        <a class="flex gap-5 m-3 items-center " href="?page=user">
            <i class="fa-regular fa-user text-blue-500"></i>
            <span class="text-gray-500 font-semibold">User Management</span>
        </a>

    <?php } else {?>

        <a class="flex gap-5 m-3 items-center " href="?page=jadwal">
            <i class='fa-solid fa-calendar-days text-green-500'></i>
            <span class="text-gray-500 font-semibold">Jadwal</span>
        </a>

        <a class="flex gap-5 m-3 items-center" href="?page=bus">
            <i class="fa-solid fa-bus text-blue-500"></i>
            <span class="text-gray-500 font-semibold">Data Bus</span>
        </a>
          <?php }?>
    </div>


    <div class="absolute bottom-0 w-full flex justify-center p-6">
        <a href="../function/logout.php" class="text-center decoration-none m-auto bg-[#5e72e4] px-6 py-1 text-white w-full rounded-xl hover:bg-[#384bba]">Log out</a>
    </div>
</div>