<div class="container flex gap-5 px-10 py-5">
    <div class="w-1/5">
        <div class="border">
            <h2 class="bg-amber-400 p-4 font-semibold"><i class="fa-solid fa-list"></i> DANH MỤC SẢN PHẨM</h2>
            <?php
            if (is_array($category)) {
            echo '<ul>';
            foreach ($category as $key => $value) {
                echo '<li class=""><a class="hover:bg-gray-100 block p-3" href="?controller=product&action=searchByCategory&key=' . $value['category_id'] . '">' . $value['category_name'] . '</a></li>';
            }
            echo '</ul>';
        }
            ?>
        </div>
        <div class="overflow-hidden mt-5"><img class="w-full hover:scale-110 duration-300" src="uploads/img/sidebar0.jpg" alt=""></div>
        <div class="overflow-hidden mt-5"><img class="w-full hover:scale-110 duration-300" src="uploads/img/sidebar1.jpg" alt=""></div>
    </div>
    <div class="w-4/5 ">
        <div class="p-4 border-l-4 border-amber-400 bg-gray-100 font-semibold"><?= $product['product_name'] ?></div>
        <div class="bg-gray-100 flex">
            <div class="w-1/2 px-5 pb-5">
                <img class="shadow-md rounded-md shadow-slate-400" src="uploads/img/<?= $product['product_img'] ?>" alt="">
            </div>
            <div class="detail w-1/2 p-5">
                <?php
                $sale = $product['product_price'] - $product['product_price'] * $product['product_discount'] / 100;
                echo '<div class="font-bold text-3xl mb-2">' . $product['product_name'] . '</div>';
                echo '<div class="mt-3">' . getStar($star, $product) . '</div>';
                if ($product['product_discount'] > 0) echo '<div class="py-1 px-2 w-max text-white bg-red-500 rounded-tl-md rounded-br-md">Giảm ' . $product['product_discount'] . '%</div>';
                echo '<p class="my-3">' . (($product['product_discount'] > 0) ? '<del>' . $product['product_price'] . ' VNĐ</del> ' . '<b class="text-red-500 text-3xl">' . $sale . ' VNĐ</b>' : '<b class="text-red-500 text-3xl">' . $product['product_price'] . ' VNĐ</b>')  . '</p>';
                if (isset($_SESSION['user'])) {
                ?>
                    <form action="?controller=cart&action=add" method="post">
                        <input type="hidden" name="product_id" value="<?= $product['product_id'] ?>">
                        <input type="number" class=" bg-white border border-black p-1 rounded-md w-10" min="1" value="1" name="cart_quantity" id="">
                        <button id="addToCart" type="submit" class="mt-5 text-white bg-amber-500 hover:bg-amber-600 rounded-md px-5 py-3">Thêm vào giỏ hàng</button>
                        <?php
                        echo "<br> <br>";
                        $msg = getFlashData('msg');
                        $color = getFlashData('color');
                        getMessage($color, $msg);
                        ?>
                    </form>
                <?php
                } else {
                    echo '<div class="mt-5"><a class="text-white bg-amber-500 hover:bg-amber-600 rounded-md px-5 py-3" href="?controller=login">Đăng nhập để mua hàng</a></div>';
                }
                ?>
            </div>
        </div>
        <div class="des mt-5">
            <div class="p-4 border-l-4 border-amber-400 bg-gray-100 font-semibold">Mô tả sản phẩm</div>
            <div class="bg-gray-100 px-5 pb-5"><?= $product['product_des'] ?></div>
        </div>
        <div class="danhgia bg-gray-100 mt-5 text-center p-5">
            <?php
            if (isset($_SESSION['user'])) {
            ?>
                <form class="" action="?controller=comment&product_id=<?= $_GET['id'] ?>" method="post">
                    <div><textarea class="p-2 border border-amber-700 rounded-lg w-full h-24" type="text" name="postComment" id="" placeholder="Để lại bình luận..." required></textarea></div>
                    <div class="">
                        <span>Đánh giá</span>
                        <select name="postStar" class=" text-amber-500 border border-amber-500 my-5" id="" required>
                            <option value="" hidden selected>&#9733</option>
                            <option class="text-yellow-400 p-10" value="1">&#9733</option>
                            <option class="text-yellow-400" value="2">&#9733 &#9733</option>
                            <option class="text-yellow-400" value="3">&#9733 &#9733 &#9733</option>
                            <option class="text-yellow-400" value="4">&#9733 &#9733 &#9733 &#9733</option>
                            <option class="text-yellow-400" value="5">&#9733 &#9733 &#9733 &#9733 &#9733</option>
                        </select>
                    </div>
                    <div><button class="p-2 bg-amber-500 text-white rounded-md font-medium" type="submit" name="btn-comment">GỬI ĐÁNH GIÁ</button></div>
                </form>
            <?php
            } else {
                echo '<div class="mt-5"><a class="text-white bg-amber-500 hover:bg-amber-600 rounded-md px-5 py-3" href="?controller=login">Đăng nhập để bình luận</a></div>';
            }
            ?>
        </div>
        <div class="p-4 border-l-4 mt-5 border-amber-400 bg-gray-100 font-semibold">Tất cả bình luận</div>
        <div class="bg-gray-100  px-5 pb-5">
            <div class="bg-white p-5">
                <?php
                if (empty($comment)) {
                    echo "Hãy là người bình luận đầu tiên!";
                } else {
                    foreach ($comment as $key => $value) {
                ?>
                        <div class="flex gap-2">
                            <div class='img w-14 h-14 rounded-full bg-orange-300'><img class="object-cover rounded-full w-full h-full" src="uploads/img/<?= $value['customer_img'] ?>" alt=""></div>
                            <div>
                                <div><b><?= $value['customer_name'] ?></b></div>
                                <div class='text-amber-500'><?= starComment($value['comment_star']) ?></div>
                                <div class='text-sm mt-3'><?= $value['comment_date'] ?></div>
                                <div class="text-slate-800"><?= $value['comment_content'] ?></div>
                            </div>
                        </div>
                <?php
                        if (isset($_SESSION['user'])) {
                            if ($value['customer_id'] == getSession('user')['customer_id']) {
                                echo "<div class='text-right'><a class='text-red-500' href='?controller=comment&action=deleteComment&idCmt=$value[comment_id]&idPro=$product[product_id]'>Xoá bình luận</a></div>";
                            }
                        }
                        echo "<hr>";
                        echo "<br>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<script>


</script>