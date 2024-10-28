<div class='p-5'>
    <div class='mb-5 w-max rounded-lg p-3 mx-auto flex justify-center bg-white items-center  shadow-md'>
        <h1 class='w-max bg-white text-lg font-bold text-blue-900'><i class="fa-solid fa-bag-shopping"></i> CHI TIẾT BÌNH LUẬN</h1>
    </div>
    <form action="?role=admin&controller=comment&action=deleteByCheckBox&id=<?= $_GET['id'] ?>" method="post">
        <div class="w-full mx-auto mb-2"><button id="deleteAll" name="btn-delete-checkbox" type="submit" class="text-red-600 bg-red-50 border border-red-600  p-2 block rounded-md w-max"><i class="fa-solid fa-trash-can"></i> Xoá các mục đã chọn</button></div>
        <table class="w-full mx-auto text-sm text-left rtl:text-right dark:text-gray-400">
            <thead class=" text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400" style="font-size: 10px">
                <tr class="bg-slate-800 text-white text-center">
                    <th class='px-2'><input id="checkBoxAll" class="checkBox" type="checkbox" name="" id=""></th>
                    <th scope="col" class="px-1 py-3">Nội dung</th>
                    <th scope="col" class="px-1 py-3">Đánh giá</th>
                    <th scope="col" class="px-1 py-3">Thời gian bình luận</th>
                    <th scope="col" class="px-1 py-3">Người bình luận</th>
                    <th scope="col" class="px-1 py-3"></th>
                </tr>
            </thead>
            <?php
            foreach ($commentDetail as $key => $value) {
                echo "<tr class='bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-100'>";
            ?>
                <td class="px-2"><input class="checkBoxSingle checkBox" name="<?php echo $value['comment_id'] ?>" onclick="changecolor()" type="checkbox" name="" id=""></td>
    </form>
    <?php
                echo "<td class='px-2 py-3'>" . $value['comment_content'] . "</td>";
    ?>
    <td class='px-2 py-3 text-amber-400 text-xl'><?php starComment($value['comment_star']) ?></td>
    <?php
                echo "<td class='px-2 py-3'>" . $value['comment_date'] . "</td>";
                echo "<td class='px-2 py-3'>" . $value['customer_name'] . "</td>";
    ?>
    <td class='px-2 py-3'>
        <div class='flex items-center justify-center gap-3'>
            <a onclick="return confirm('Bạn có chắc chắc muốn xoá không?')" class="text-red-600 px-3 py-1 bg-red-50 border border-red-600 rounded-md" href="?role=admin&controller=comment&action=delete&comment_id=<?= $value['comment_id'] ?>&product_id=<?= $value['product_id'] ?>"><i class="fa-solid fa-trash-can"></i></a>
        </div>
    </td>
<?php
                echo "</tr>";
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