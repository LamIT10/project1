
    <section class="bg-gray-100 rounded-2xl py-10 px-20 m-10">

        <form class="flex gap-10 space-y-4 md:space-y-6 h-full" action="?controller=register&action=checkRegister" method="post" enctype="multipart/form-data">

            <div class="w-2/3">
                <h1 class="text-xl leading-tight text-center font-bold tracking-tight text-slate-800  md:text-xl dark:text-white mb-5">
                    Đăng kí tài khoản
                </h1>
                <div>
                    <label for="customer_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Họ và tên</label>
                    <input type="text" name="customer_name" id="name" class="bg-gray-50 border mb-4 border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="customer_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="customer_email" id="email" class="bg-gray-50 border mb-4 border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com">
                </div>
                <div>
                    <label for="customer_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Số điện thoại</label>
                    <input type="text" name="customer_phone" id="customer_phone" class="bg-gray-50 mb-4 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div>
                    <label for="customer_pass" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                    <input type="password" name="customer_pass" id="customer_pass" class="bg-gray-50 mb-10 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <button type="submit" name="btn-register" class="w-full text-white bg-amber-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Xác nhận cập nhật</button>
            </div>
            <div class="img w-1/3 bg-white rounded-lg shadow-lg p-6 h-max round">

                <input id='anh' type="file" class="mt-5" name="customer_img" id="">
            </div>
        </form>
    </section>
