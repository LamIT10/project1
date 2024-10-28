<div class='p-5'>
    <div class='mb-5 w-max font-bold  rounded-md p-3 mx-auto flex justify-center text-blue-900 bg-white items-center  shadow-md'>
        QUẢN LÝ BÌNH LUẬN
    </div>
    <table class="w-full mx-auto text-sm text-left rtl:text-right dark:text-gray-400">
        <thead class="text-xs text-gray-800 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr class=" bg-gradient-to-br from-slate-800 to-blue-950 text-white">
                <th scope="col" class="px-6 py-3">STT</th>
                <th scope="col" class="px-6 py-3">Sản phẩm</th>
                <th scope="col" class="px-6 py-3">Số bình luận</th>
                <th scope="col" class="px-6 py-3">Cũ nhất</th>
                <th scope="col" class="px-6 py-3">Mới nhất</th>
                <th scope="col" class="px-6 py-3">Chi tiết</th>
            </tr>
        </thead>
        <?php
        if (is_array($list)) {
        foreach ($list as $key => $value) {
            echo "<tr class='text-black bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-slate-100'>";
        ?>
            <?php
            $key += 1;
            echo "<td class='px-6 py-4'>" . "$key" . "</td>";
            echo "<td class='px-6 py-4'>" . $value['product_name'] . "</td>";
            echo "<td class='px-6 py-4'>" . $value['count'] . "</td>";
            echo "<td class='px-6 py-4'>" . $value['day_max'] . "</td>";
            echo "<td class='px-6 py-4'>" . $value['day_min'] . "</td>";
            ?>
            <td class='px-6 py-4'>
                <div class='flex items-center justify-center gap-10'>
                    <a class="text-amber-500 border border-amber-500 px-3 py-1 bg-amber-50 rounded-3xl hover:bg-amber-500 hover:text-white" href="?role=admin&controller=comment&action=detail&id=<?= $value['product_id'] ?>"><i class="fa-solid fa-circle-info"></i> Chi tiết</a>
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