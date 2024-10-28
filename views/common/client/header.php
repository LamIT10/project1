<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture</title>
    <link rel="stylesheet" href="src/output.css?v=<?= time() ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body onload="start()">
    <div class="container mx-auto relative" id="con">
        <header class=" bg-amber-400 gap-5">
            <div class="flex justify-between bg-amber-400 py-5 px-14 items-center">
                <div class=""><img class='max-w-40' src="uploads/img/logo.png" alt=""></div>
                <form class="w-1/2 flex justify-between" action="" method="get">
                    <input type="text" name="controller" value="product" hidden id="">
                    <input type="text" name="action" value="search" hidden id="">
                    <input class="w-full p-2.5 rounded-l-md" type="text" name="key" id="key" placeholder="Tìm kiếm sản phẩm...">
                    <button class="w-1/6 rounded-r-md bg-slate-800 text-white" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
                <div class='flex items-center gap-2'>
                    <a class="block" href="<?php echo (isset($_SESSION['user']) ? '?controller=cart' : '?controller=login') ?>"><i class="fa-solid fa-bag-shopping p-3 hover:bg-white hover:text-amber-500 duration-500 rounded-full text-3xl text-white border-2 border-white"></i> Giỏ hàng</a>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo "<div class='w-24 h-24 p-2 bg-white rounded-full ml-10'><img class='object-cover rounded-full w-full h-full ' src='uploads/img/" . getSession('user')['customer_img'] . "'></div>";
                    }
                    ?>
                </div>
            </div>
            <div class="sticky top-0 bg-amber-400 px-10 z-50">
                <div class=" flex justify-between px-3 bg-slate-800 text-white rounded-t-lg items-center ">
                    <div class="flex gap-5 text-white font-medium">
                        <h2 class="p-3 border-4 border-slate-800 hover:border-b-amber-400 active:text-amber-400 transition-all duration-200"><a href="?controller=home">TRANG CHỦ</a></h2>
                        <h2 class="p-3 border-4 border-slate-800 hover:border-b-amber-400 active:text-amber-400 transition-all duration-200"><a href="?controller=product">SẢN PHẨM</a></h2>
                        <h2 class="p-3 border-4 border-slate-800 hover:border-b-amber-400 active:text-amber-400 transition-all duration-200"><a href="?controller=product">LIÊN HỆ</a></h2>
                        <h2 class="p-3 border-4 border-slate-800 hover:border-b-amber-400 active:text-amber-400 transition-all duration-200"><a href="?controller=product">BÀI VIẾT</a></h2>
                    </div>
                    <div class='flex gap-5 items-center'>
                        <div>
                            <?php
                            if (isset($_SESSION['user']) && ($_SESSION['user']['customer_role'] == 1 || $_SESSION['user']['customer_role'] == 2)) {
                                echo "<a href='?role=admin' class='px-3 py-2 rounded-md bg-teal-600 hover:bg-teal-700'><i class='fa-solid fa-gear'></i> Truy cập trang quản trị</a>";
                            }
                            ?>

                        </div>
                        <div class="">
                            <button id="dropdownNavbarLink" onclick="dropDown()" class="bg-pink-600 rounded-md px-3 py-1">
                                <?php
                                if (isset($_SESSION['user'])) {
                                    echo '<i class="fa-solid fa-user"></i> ' . getSession('user')['customer_name'] . ' <i class="fa-solid fa-angle-down"></i>';
                                } else echo "ACCOUNT" . ' <i class="fa-solid fa-angle-down"></i>';
                                ?>
                            </button>
                            <?php
                            if (empty($_SESSION['user'])) {
                            ?>
                                <ul id="dropGuest" class="hidden absolute border-b-2 border-amber-400 bg-amber-50 text-black right-0 w-40 mt-0.5 rounded-md">
                                    <li><a class='p-2 border-b rounded-md hover:bg-amber-300 block' href="?controller=login">Đăng nhập</a></li>
                                    <li><a class='p-2 border-b rounded-md hover:bg-amber-300 block' href="?controller=register">Đăng kí</a></li>
                                </ul>
                            <?php
                            } else {
                                echo "<ul id='dropUser' class='hidden border-b-2 border-amber-400 absolute bg-amber-50 text-black right-0 w-40 mt-0.5 rounded-md'>";
                                echo "<li><a class='hover:bg-amber-300 block p-2 border-b rounded-md' href='?controller=logout'>Đăng xuất</a></li>";
                                echo "<li><a class='hover:bg-amber-300 block p-2 border-b rounded-md' href='?controller=account'>Quản lý tài khoản</a></li>";
                                echo "<li><a class='hover:bg-amber-300 block p-2 border-b rounded-md' href='?controller=account&action=formChangePass'>Đổi mật khẩu</a></li>";
                                echo "<li><a class='hover:bg-amber-300 block p-2 border-b rounded-md' href='?controller=login'>Đổi tài khoản</a></li>";
                                echo "</ul>";
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </header>