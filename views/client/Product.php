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
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$quantity = count($listSearch);
?>
<div class="container mt-5 px-10 flex gap-5 justify-between">
    <div class="w-1/5">
        <div class="border">
            <h2 class="bg-amber-400 p-4 font-semibold"><i class="fa-solid fa-list"></i> DANH MỤC SẢN PHẨM</h2>
            <?php
            if (is_array($listCategory)) {
            echo '<ul>';
            foreach ($listCategory as $key => $value) {
                echo '<li class=""><a class="hover:bg-gray-100 block p-3" href="?controller=product&action=searchByCategory&key=' . $value['category_id'] . '">' . $value['category_name'] . '</a></li>';
            }
            echo '</ul>';
        }
            ?>
        </div>
        <div class="overflow-hidden mt-5"><img class="w-full hover:scale-110 duration-300" src="uploads/img/sidebar0.jpg" alt=""></div>
        <div class="overflow-hidden mt-5"><img class="w-full hover:scale-110 duration-300" src="uploads/img/sidebar1.jpg" alt=""></div>
    </div>

    <div class="w-4/5">
        <div class="p-4 border-l-4 border-amber-400 bg-gray-100 font-semibold">TẤT CẢ SẢN PHẨM</div>
        <div class="grid px-5 pb-5 grid-cols-3 gap-3 bg-gray-100 text-center ">
            <?php
            if (is_array($listSearch)) {
            $check = true;
            foreach ($listSearch as $key => $value) {
                if ($key < ($page * 9) - 9) continue;
                if ($key >= $page * 9) break;
                $sale = $value['product_price'] - $value['product_price'] * $value['product_discount'] / 100;
                echo "<div class='bg-white pb-5 overflow-hidden relative group rounded-lg'>";
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
                    echo "<div class='px-3 absolute top-0 left-0 bg-rose-800 text-white'>-" . $value['product_discount'] . "%" . "</div>";
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
        <div class=" my-5 p-2 flex items-center justify-end gap-5">
            <a id="increasePage" href="?controller=product&page=<?= $page - 1 ?>" class="p-2 bg-amber-500 hover:bg-amber-600 disabled:bg-slate-700 text-white rounded-md <?= ($page == 1) ? 'pointer-events-none bg-zinc-400' : '' ?>">
                << Trang trước</a>
                    <a id="decreasePage" href="?controller=product&page=<?= $page + 1 ?>" class="p-2 bg-amber-500 hover:bg-amber-600 disabled:bg-slate-700 text-white rounded-md <?= ($quantity <= ($page * 10)) ? 'pointer-events-none bg-zinc-400' : '' ?>">Trang tiếp >></a>
        </div>
    </div>

</div>