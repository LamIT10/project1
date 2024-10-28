<h1 class="text-center mt-10 font-bold">GIỎ HÀNG CỦA BẠN</h1>
<div class="flex gap-10 w-11/12 mx-auto my-5">
    <div class="w-4/5">
        <table class="table-auto w-full text-md text-left">
            <thead>
                <tr class="bg-slate-200">
                    <th scope="col" class="px-6 py-3">STT</th>
                    <th scope="col" class="px-6 py-3">Tên sản phẩm</th>
                    <th scope="col" class="px-6 py-3">Ảnh</th>
                    <th scope="col" class="px-6 py-3">Giá</th>
                    <th scope="col" class="px-6 py-3">Số lượng</th>
                    <th scope="col" class="px-6 py-3">Thành tiền</th>
                    <th scope="col" class="px-6 py-3"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (is_array($listCart)) {
                foreach ($listCart as $key => $value) {
                    echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-100'>";
                    echo "<td class='px-6 py-5'>" . $key + 1 . "</td>";
                    echo "<td class='px-6 py-5'>" . $value['product_name'] . "</td>";
                    echo "<td class='px-6 py-5 w-40'><img class='w-full' src='uploads/img/" . $value['product_img'] . "'></td>";
                    echo "<td class='px-6 py-5'>" . $value['product_price'] . " VNĐ" . "</td>";
                    echo "<td class='px-6 py-5'><span class='py-1 px-3 rounded-md border border-slate-800'>" . $value['cart_quantity'] . "</span></td>";
                    echo "<td class='px-6 py-5'>" . $value['product_price'] * $value['cart_quantity'] . " VNĐ" . "</td>";
                ?>
                    <td><a onclick="return confirm('Bạn có chắc muốn xoá đơn hàng này khỏi giỏ hàng?')" href="?controller=cart&action=delete&id=<?= $value['cart_id'] ?>" class="text-red-600 px-3 py-1 bg-red-50 border border-red-600 rounded-md"><i class="fa-solid fa-trash-can"></a></td>
                <?php
                    echo "</tr>";
                }
            }
                ?>
            </tbody>
        </table>
    </div>
    <div class="w-1/5 bg-slate-100 p-2 border-l-4 border-slate-500">
        <a href="?controller=product" class="mt-10 px-5 py-3 w-max mx-auto bg-blue-600 text-white rounded-md block">Mua thêm sản phẩm</a>
    </div>
</div>