<?php
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$quantity = count($listProduct);
?>
<div class='p-5'>
    <div class='mb-5 w-max rounded-lg p-3 mx-auto flex justify-center bg-white items-center  shadow-md'>
        <h1 class='w-max bg-white text-lg font-bold text-blue-900'><i class="fa-solid fa-bag-shopping"></i> QUẢN LÝ SẢN PHẨM</h1>
    </div>
    <div class="grid grid-cols-3 justify-between items-center mb-2">
        <form id="formDelete" action="?role=admin&controller=product&action=deleteByCheckBox" method="post" class=''>
            <div class="w-full mx-auto"><button id="deleteAll" name="btn-delete-checkbox" type="submit" class="text-red-600 bg-red-50 border border-red-600  px-2 py-1 rounded-md w-max"><i class="fa-solid fa-trash-can"></i> Xoá các mục đã chọn</button></div>
        </form>
        <form action="" method="get" class="bg-blue-950 w-max focus:border-none focus:ring-0 overflow-hidden rounded-sm">
            <input type="hidden" name="role" value="admin">
            <input type="hidden" name="controller" value="product">
            <input type="hidden" name="action" value="searchProductByName">
            <input class="px-2 py-1" type="text" name="product_name" id="" placeholder="Tên sản phẩm...">
            <button type="submit" class="px-2 py-1 text-white font-bold bg-blue-950"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <form action="" method="get" class="mx-auto text-center bg-blue-950 w-max  overflow-hidden rounded-sm">
            <input type="hidden" name="role" value="admin">
            <input type="hidden" name="controller" value="product">
            <input type="hidden" name="action" value="searchProductByCategory">
            <select name="category_id" id="" class="px-2 py-1 border border-white">
                <option value="" hidden>--Chọn loại hàng--</option>
                <?php
                if (is_array($listCategory)) {
                foreach ($listCategory as $key => $value) {
                    echo "<option value='" . $value['category_id'] . "'>" . $value['category_name'] . "</option>";
                }
            }
                ?>
            </select>
            <button type="submit" class="px-2 py-1 text-white font-bold bg-blue-950"><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>

    </div>
    <div class="overflow-auto">
        <table class="w-full mx-auto text-sm text-left rtl:text-right dark:text-gray-400">
            <thead class=" text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" style="font-size: 10px">
                <tr class=" bg-gradient-to-br from-slate-800 to-blue-950 text-white text-center overflow-auto">
                    <th class='px-2'><input form="formDelete" id="checkBoxAll" class="checkBox" type="checkbox" name="" id=""></th>
                    <th scope="col" class="px-1 py-3 border-x border-slate-600">STT</th>
                    <th scope="col" class="px-1 py-3 border-x border-slate-600">Tên sản phẩm</th>
                    <th scope="col" class="px-1 py-3 border-x border-slate-600">Giá tiền</th>
                    <th scope="col" class="px-1 py-3 border-x border-slate-600">Ảnh</th>
                    <th scope="col" class="px-1 py-3 border-x border-slate-600">Số lượt xem</th>
                    <th scope="col" class="px-1 py-3 border-x border-slate-600">Ngày nhập</th>
                    <th scope="col" class="px-1 py-3 border-x border-slate-600">Hàng đặc biệt</th>
                    <th scope="col" class="px-1 py-3 border-x border-slate-600">Giảm giá</th>
                    <th scope="col" class="px-1 py-3 border-x border-slate-600">Danh mục</th>
                    <th scope="col" class="px-1 py-3 border-x border-slate-600"> <a href="?role=admin&controller=product&action=create" id="add" class="px-1 py-2 bg-green-500 text-white rounded-md block hover:bg-green-700"><i class="fa-solid fa-plus"></i> Thêm sản phẩm</a>
                    </th>
                </tr>
            </thead>
            <?php
            if (is_array($listProduct)) {
            foreach ($listProduct as $key => $value) {
                if ($key < ($page * 10) - 10) continue;
                if ($key >= $page * 10) break;
                echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-100'>";
            ?>
                <td class="px-2"><input form="formDelete" class="checkBoxSingle checkBox" name="<?php echo $value['product_id'] ?>" onclick="changecolor()" type="checkbox" name="" id=""></td>
                <td class="px-2"><?= $key + 1 ?></td>
                <?php
                foreach ($value as $a => $b) {
                    if ($a == 'product_des') continue;
                    if ($a == 'product_id') continue;
                    if ($a == 'category_id') continue;
                    if ($a == 'product_img') {
                        echo "<td class='px-2 py-3'><img class='w-28' src='uploads/img/$b' alt=''></td>";
                    } else
                        echo "<td class='px-2 py-3'>$b</td>";
                }
                ?>
                <td class='px-2 py-3'>
                    <div class='flex items-center justify-center gap-3'>
                        <a class="edit text-white px-3 py-1 bg-blue-700 rounded-md" href="?role=admin&controller=product&action=edit&id=<?= $value['product_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a onclick="return confirm('Bạn có chắc chắc muốn xoá không?')" class="text-red-600 px-3 py-1 bg-red-50 border border-red-600 rounded-md" href="?role=admin&controller=product&action=delete&id=<?= $value['product_id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
                    </div>
                </td>
            <?php
                echo "</tr>";
            }
        }
            ?>
        </table>
    </div>
    
    <div class=" mt-5 p-2 flex items-center justify-end gap-5">
        <a id="increasePage" href="?role=admin&controller=product&page=<?= $page - 1 ?>" class="p-2 bg-amber-500 hover:bg-amber-600 disabled:bg-slate-700 text-white rounded-md <?= ($page == 1) ? 'pointer-events-none bg-zinc-400' : '' ?>">
            << Trang trước</a>
                <a id="decreasePage" href="?role=admin&controller=product&page=<?= $page + 1 ?>" class="p-2 bg-amber-500 hover:bg-amber-600 disabled:bg-slate-700 text-white rounded-md <?= ($quantity <= ($page * 10)) ? 'pointer-events-none bg-zinc-400' : '' ?>">Trang tiếp >></a>
    </div>
    <script>
        var deleteAll = document.getElementById('deleteAll');
        var checkBoxAll = document.getElementById('checkBoxAll');
        var checkBoxSingle = document.querySelectorAll('.checkBoxSingle');
        var checkBox = document.querySelectorAll('.checkBox');
        var edit = document.querySelectorAll('.edit');

        const deleteColor = (x) => {
            if (x == false) {
                deleteAll.style.backgroundColor = 'rgb(254, 242, 242)';
                deleteAll.style.color = 'rgb(220, 38, 38)';
                deleteAll.style.border = '1px solid rgb(220, 38, 38)';

            } else {
                deleteAll.style.backgroundColor = 'rgb(220, 38, 38)';
                deleteAll.style.color = 'white';
                deleteAll.style.border = 'none';
            }
        }

        function changecolor() {
            let check = true;
            checkBox.forEach(element => {
                if (element.checked == true) {
                    check = false;
                    deleteColor(1);
                }
                if (check == true) {
                    deleteColor(0);
                }
            });
        }
        checkBoxAll.addEventListener('click', function() {
            checkBoxSingle.forEach(element => {
                element.checked = this.checked;
                deleteColor(this.checked);
            });
        })
        add.addEventListener('click', function() {
            document.getElementById('formAddProduct').style.display = 'block';
            overLay.style.display = 'block';
            document.body.style.overflow = 'hidden';
        })

        function closeForm() {
            document.getElementById('formAddProduct').style.display = 'none';
            overLay.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    </script>
</div>