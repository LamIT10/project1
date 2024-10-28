<section>
    <form class="flex gap-10 space-y-4 md:space-y-6 h-full bg-white w-2/3 mt-10 mx-auto shadow-md shadow-slate-400 p-10 rounded-lg" action="?role=admin&controller=customer&action=add" method="post" enctype="multipart/form-data">
        <div class="w-full">
            <h1 class="text-xl leading-tight font-bold tracking-tight text-slate-800  md:text-xl dark:text-white mb-6">
                <?php
                echo isset($_GET['check']) ? 'Thêm quản trị viên mới' : 'Thêm khách hàng mới';
                ?>
            </h1>
            <hr>
            <div class="flex justify-between mt-6 gap-5">
                <div class="w-1/2">
                    <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Họ và tên</label>
                    <input type="text" name="customer_name" id="name" class="w-full border mb-4 border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>
                <div class="w-1/2">
                    <label for="customer_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số điện thoại</label>
                    <input type="text" name="customer_phone" id="customer_phone" class="w-full mb-4 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>
            </div>
            <div>
                <label for="customer_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="customer_email" id="email" class="w-full border mb-4 border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
            </div>

            <div>
                <label for="customer_pass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                <input type="password" name="customer_pass" id="customer_pass" class="w-full mb-4 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
            </div>
            <div>
                <label for="customer_img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ảnh</label>
                <input id='anh' type="file" class="w-full mb-4 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="customer_img" id="">
            </div>
            <?php
            if (isset($_GET['check'])) {
            ?>
                <div>
                    <label for="customer_img" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Chức vụ</label>
                        <div class='flex items-center justify-center gap-10 border mb-5 border-slate-400 py-2 px-7 rounded-md'>
                            <label><input type="radio" name="customer_role" id="" value="2"> Quản lý</label>
                            <label><input type="radio" name="customer_role" id="" value="1"> Nhân viên</label>
                        </div>
                </div>
            <?php
            }
            ?>
            <div class="flex gap-5 justify-end">
                <button type="reset" class="text-white bg-amber-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Nhập lại</button>
                <button type="submit" name="btn-add" class="text-white bg-green-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Thêm mới</button>
            </div>
        </div>
    </form>
</section>