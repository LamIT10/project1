<div class='p-5 border'>
    <div class='mb-5 w-max p-3 rounded-md mx-auto bg-white items-center  shadow-md'>
        <h1 class='text-center font-bold w-max bg-white text-lg text-blue-900'><i class="fa-solid fa-list"></i> QUẢN LÝ DANH MỤC</h1>
    </div>
    <?php 
    $msg = getFlashData('msg');
    $color = getFlashData('color');
    getMessage($color, $msg);
    echo "<br>";
    ?>
    <form action="?role=admin&controller=category&action=deleteByCheckBox" method="post">
        <div class="w-5/6 mx-auto mb-2"><button id="deleteAll" name="btn-delete-checkbox" type="submit" class="text-red-600 bg-red-50 border border-red-600  p-2 block rounded-md w-max"><i class="fa-solid fa-trash-can"></i> Xoá các mục đã chọn</button></div>
        <table class="w-5/6 mx-auto text-sm text-left rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class=" bg-gradient-to-br from-slate-800 to-blue-950 text-white">
                    <th class='pl-5'><input id="checkBoxAll" class="checkBox" type="checkbox" name="" id=""></th>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Tên</th>
                    <th scope="col" class="px-6 py-3 text-center">
                        <div id="add" class="px-4 py-2 bg-green-500 text-white rounded-md mx-auto w-max hover:bg-green-700"><i class="fa-solid fa-plus"></i> Thêm danh mục</div>
                    </th>
                </tr>
            </thead>
            <?php
            if (is_array($listCategory)) {
            foreach ($listCategory as $key => $value) {
                echo "<tr class='text-black bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-100'>";
            ?>
                <td class="pl-5"><input class="checkBoxSingle checkBox" name="<?php echo $value['category_id'] ?>" onclick="changecolor()" type="checkbox" name="" id=""></td>
    </form>
    <?php
                foreach ($value as $a => $b) {
                    echo "<td class='px-4 py-4'>$b</td>";
                }
    ?>
    <td class='px-6 py-4'>
        <div class='flex items-center justify-center gap-10'>
            <a class="edit text-white px-3 py-1 bg-blue-700 rounded-md" href="?role=admin&controller=category&action=edit&id=<?= $value['category_id'] ?>"><i class="fa-solid fa-pen-to-square"></i> Sửa</a>
            <a onclick="return confirm('Các sản phẩm nằm trong danh mục này đều sẽ bị xoá. Bạn có chắc chắc muốn xoá không?')" class="text-red-600 px-3 py-1 bg-red-50 border border-red-600 rounded-md" href="?role=admin&controller=category&action=delete&id=<?= $value['category_id'] ?>"><i class="fa-solid fa-trash-can"></i> Xoá</a>
        </div>
    </td>
<?php
                echo "</tr>";
            }
        }
?>
</table>
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
        document.getElementById('formAdd').style.display = 'block';
        overLay.style.display = 'block';
        document.body.style.overflow = 'hidden';
    })

    function closeForm() {
        document.getElementById('formAdd').style.display = 'none';
        overLay.style.display = 'none';
        document.body.style.overflow = 'auto';
    }
</script>
</div>