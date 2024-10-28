<style>
    .detail {
        animation: toright 500ms ease-in-out;
    }

    @keyframes toright {
        0% {
            left: 0;
        }

        100% {
            margin: auto;
        }
    }

    .cart {
        animation: toleft 500ms ease-in-out;
    }

    @keyframes toleft {
        0% {
            right: 0;
        }

        100% {
            margin: auto;
        }
    }
</style>
<?php

?>
<div class="banner relative ">
    <img id="anh" class="w-full" src="uploads/img/banner-0.png" alt="">
    <button onclick="nextImg()" class="hover:bg-amber-600 py-3 z-2 px-5 text-3xl text-white rounded-md absolute top-1/2 right-8 transform -translate-y-1/2 bg-amber-400"><i class="hover:bg-amber-600 fa-solid fa-caret-right"></i></button>
    <button onclick="prevImg()" class="hover:bg-amber-600 py-3 z-2 px-5 text-3xl text-white rounded-md absolute top-1/2 left-8 transform -translate-y-1/2 bg-amber-400"><i class="fa-solid fa-caret-left"></i></button>
</div>
<div class="flex justify-between gap-5 items-center px-10 mt-10 mb-5">
    <div class="w-1/3  overflow-hidden"><img class="duration-300 hover:scale-110 w-full" src="uploads/img/home1.jpg" alt=""></div>
    <div class="w-1/3 flex flex-col justify-between items-center gap-5">
        <div class=" overflow-hidden"><img class="duration-300 hover:scale-110 w-full" src="uploads/img/home2.jpg" alt=""></div>
        <div class=" overflow-hidden"><img class="duration-300 hover:scale-110 w-full" src="uploads/img/home4.jpg" alt=""></div>
    </div>
    <div class="w-1/3   overflow-hidden"><img class="duration-300 hover:scale-110 w-full" src="uploads/img/home3.jpg" alt=""></div>
</div>
<div class="px-10 py-8">
    <div class="bg-gray-100 border-l-4 border-amber-400 p-5 font-medium">
        TOP SẢN PHẨM YÊU THÍCH
    </div>
    <div class="flex px-4 bg-gray-100 text-center justify-between flex-wrap">
        <?php
        if (is_array($listFavourite)) {
        foreach ($listFavourite as $key => $value) {
            $sale = $value['product_price'] - $value['product_price'] * $value['product_discount'] / 100;
            echo "<div class='relative bg-white pb-5 mx-2 mb-10 overflow-hidden rounded-sm group' style='width: 271px'>";
        ?>
            <a class="absolute detail top-1/2 left-1/2 transform -translate-x-1/2  hidden group-hover:block bg-white px-4 py-2 rounded-sm border-2 group-hover:w-[168px] border-amber-500 text-amber-500 z-20" href="?controller=product&action=detail&id=<?php echo $value['product_id'] ?>">Xem chi tiết</a>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <a class="absolute cart bottom-1/2 right-1/2 transform translate-x-1/2 -translate-y-1/2 hidden group-hover:block group-hover:w-max bg-amber-500 px-4 py-2 rounded-sm hover:bg-amber-600 text-white z-20" href="?controller=cart&action=add&id=<?php echo $value['product_id'] ?>">Thêm vào giỏ hàng</a>
            <?php
            }
            ?>
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-0 group-hover:opacity-50 transition duration-500 z-10"></div>
        <?php
            if ($value['product_discount'] > 0) {
                echo "<div class='px-3 absolute top-0 left-0 bg-rose-800 text-white'>" . $value['product_discount'] . "%" . "</div>";
            }
            echo "<a href='?controller=product&action=detail&id=" . $value['product_id'] . "'>";
            echo "<div class='w-full overflow-hidden'><img class='w-full' src='uploads/img/" . $value['product_img'] . "'></div>";
            echo '<p class="my-3">' . $value['product_name'] . '</p>';
            echo '<p class= "mb-3">' . getStar($star, $value) . '</p>';
            echo '<p>' . (($value['product_discount'] > 0) ? '<del>' . $value['product_price'] . ' VNĐ</del> ' . '<b>' . $sale . ' VNĐ</b>' : '<b>' . $value['product_price'] . ' VNĐ</b>')  . '</p>';
            echo "</a>";
            echo "</div>";
        }
    }
        ?>
    </div>
</div>
<div class="px-10 py-8">
    <div class="bg-gray-100 border-l-4 border-amber-400 p-5 font-medium">
        TOP SẢN PHẨM GIẢM GIÁ SÂU
    </div>
    <div class="flex px-4 bg-gray-100 text-center justify-between flex-wrap">
        <?php
        if (is_array($list)) {
        foreach ($list as $key => $value) {
            $sale = $value['product_price'] - $value['product_price'] * $value['product_discount'] / 100;
            echo "<div class='relative bg-white pb-5 mx-2 mb-10 overflow-hidden rounded-sm group' style='width: 271px'>";
        ?>
            <a class="absolute detail top-1/2 left-1/2 transform -translate-x-1/2  hidden group-hover:block group-hover:w-[168px] bg-white px-4 py-2 rounded-sm border-2 border-amber-500 text-amber-500 z-20" href="?controller=product&action=detail&id=<?php echo $value['product_id'] ?>">Xem chi tiết</a>
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <a class="absolute cart bottom-1/2 right-1/2 transform translate-x-1/2 -translate-y-1/2 hidden group-hover:block group-hover:w-max bg-amber-500 px-4 py-2 rounded-sm hover:bg-amber-600 text-white z-20" href="?controller=cart&action=add&id=<?php echo $value['product_id'] ?>">Thêm vào giỏ hàng</a>
            <?php
            }
            ?>
            <div class="absolute top-0 left-0 w-full h-full bg-black opacity-0 group-hover:opacity-50 transition duration-500 z-10"></div>
        <?php
            if ($value['product_discount'] > 0) {
                echo "<div class='px-3 absolute top-0 left-0 bg-rose-800 text-white'>" . $value['product_discount'] . "%" . "</div>";
            }
            echo "<a href='?controller=product&action=detail&id=" . $value['product_id'] . "'>";
            echo "<div class='w-full overflow-hidden'><img class='w-full' src='uploads/img/" . $value['product_img'] . "'></div>";
            echo '<p class="my-3">' . $value['product_name'] . '</p>';
            echo '<p class= "mb-3">' . getStar($star, $value) . '</p>';
            echo '<p>' . (($value['product_discount'] > 0) ? '<del>' . $value['product_price'] . ' VNĐ</del> ' . '<b>' . $sale . ' VNĐ</b>' : '<b>' . $value['product_price'] . ' VNĐ</b>')  . '</p>';
            echo "</a>";
            echo "</div>";
        }
    }
        ?>
    </div>
</div>

<script>
    let anh = document.getElementById('anh');
    let text = document.getElementById('text');
    let arr = [
        "uploads/img/banner-0.png",
        "uploads/img/banner-1.png",
        "uploads/img/banner-2.png",
    ];
    let index = 0;

    function start() {
        anh.src = arr[index];
        index++;
        if (index > 2) index = 0;
        t = setTimeout(start, 4000);
    }

    function nextImg() {
        index++;
        if (index > 2) index = 0;
        anh.src = arr[index];
    }

    function prevImg() {
        index--;
        if (index < 0) index = 2;
        anh.src = arr[index];
    }
</script>