<div class='p-5'>
    <div class='mb-5 w-max rounded-lg p-3 mx-auto flex justify-center bg-white items-center  shadow-md'>
        <h1 class='w-max bg-white text-lg font-bold text-blue-900'><i class="fa-solid fa-bag-shopping"></i> QUẢN LÝ KHÁCH HÀNG</h1>
    </div>
    <form action="?role=admin&controller=customer&action=deleteByCheckBox" method="post">
        <div class="w-full mx-auto mb-2"><button id="deleteAll" name="btn-delete-checkbox" type="submit" class="text-red-600 bg-red-50 border border-red-600  p-2 block rounded-md w-max"><i class="fa-solid fa-trash-can"></i> Xoá các mục đã chọn</button></div>
        <table class="w-full mx-auto text-sm text-left rtl:text-right dark:text-gray-400">
            <thead class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr class=" bg-gradient-to-br from-slate-800 to-blue-950 text-white">
                    <th class='pl-5'><input id="checkBoxAll" class="checkBox" type="checkbox" name="" id=""></th>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Họ và tên</th>
                    <th scope="col" class="px-6 py-3">Ảnh</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Số điện thoại</th>
                    <th scope="col" class="px-6 py-3 text-center"> Hành động
                    </th>
                </tr>
            </thead>
            <?php
            if(is_array($listCustomer)){
                
            foreach ($listCustomer as $key => $value) {

                echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-100'>";
            ?>
                <td class="pl-5"><input class="checkBoxSingle checkBox" name="<?php echo $value['customer_id'] ?>" onclick="changecolor()" type="checkbox" name="" id=""></td>
    </form>
    <?php
                foreach ($value as $a => $b) {
                    if ($a == "customer_pass" || $a == "customer_role") continue;
                    if ($a == "customer_img") echo "<td class='block w-20 h-20 overflow-hidden'><img class='w-full p-1' src='uploads/img/$b'></td>";
                    else
                        echo "<td class='px-4 py-4'>$b</td>";
                }
    ?>
    <td class='px-6 py-4'>
        <div class='flex items-center justify-center gap-10'>
            <a class="edit text-white px-3 py-1 bg-blue-700 rounded-md" href="?role=admin&controller=customer&action=edit&id=<?= $value['customer_id'] ?>"><i class="fa-solid fa-pen-to-square"></i></a>
            <a onclick="return confirm('Bạn có chắc muốn xoá không?')" class="text-red-600 px-3 py-1 bg-red-50 border border-red-600 rounded-md" href="?role=admin&controller=customer&action=delete&id=<?= $value['customer_id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
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
</script>
</div>