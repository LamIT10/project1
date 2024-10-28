<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $list = $account;
    ?>
    <section class="bg-gray-100 rounded-2xl p-10 m-10">
        <?php
        $msg = getFlashData('msg');
        $color = getFlashData('color');
        getMessage($color, $msg);
        echo "<br>";
        ?>
        <h1 class="text-2xl font-bold leading-tight mb-6 text-center tracking-tight text-slate-800  md:text-xl dark:text-white">
            Xin chào <?= $list['customer_name'] ?> !
        </h1>
        <div class="w-1/2 bg-white rounded-lg shadow-lg p-6 mx-auto overflow-hidden">
            <div class=" w-full bg-amber-400 h-32 z-30 right-0 rounded-t-md mb-10 relative">
                <div class="img w-1/4 z-50 bg-white rounded-full p-3 h-max round absolute bottom-0 left-1/2 transform -translate-x-1/2 translate-y-1/2 overflow-hidden">
                    <?php
                    if (!empty($list['customer_img'])) {
                    ?>
                        <img class='w-28 h-28 rounded-full object-cover' src="uploads/img/<?= $list['customer_img'] ?>" alt="">
                    <?php
                    } else {
                        echo "Chưa có ảnh đại diện";
                    }
                    ?>
                </div>
            </div>
            <div>
                <div for="customer_name" class=" mb-4 text-sm font-medium text-gray-900 dark:text-white">Họ và tên</div>
                <div class="mb-4 shadow-md border border-gray-100 p-3 text-gray-900 rounded-lg"><?= $list['customer_name'] ?></div>
            </div>
            <div>
                <div for=" customer_email" class=" mb-4 text-sm font-medium text-gray-900 dark:text-white">Email</div>
                <div class="mb-4 shadow-md border border-gray-100 p-3 text-gray-900 rounded-lg"><?= $list['customer_email'] ?></div>
            </div>
            <div>
                <div for="customer_phone" class=" mb-4 text-sm font-medium text-gray-900 dark:text-white">Số điện thoại</div>
                <div class="mb-4 shadow-md border border-gray-100 p-3 text-gray-900 rounded-lg"><?= $list['customer_phone'] ?></div>
            </div>
            <a class='block p-3 rounded-md mt-7 text-center bg-amber-500 text-white hover:bg-amber-700' href="?controller=account&action=edit&id=<?php echo $list['customer_id']; ?>">Cập nhật tài khoản</a>
        </div>
    </section>
</body>

</html>