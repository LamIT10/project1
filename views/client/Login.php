<section class="bg-gray-50 rounded-2xl dark:bg-gray-900 m-5" style="background:url('uploads/img/bg1.jpg') no-repeat;background-size: cover; background-position: center">
    <div class=" flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
        <div style="background-color: rgba(255, 237, 213, 0.8);" class="w-full rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8 shadow-xl">
                <h1 class="text-xl leading-tight text-center tracking-tight text-slate-800  md:text-8xl dark:text-white">
                    <i class="fa-regular fa-circle-user text-yellow-700"></i>
                </h1>
                <?php
                $msg = getFlashData('msg');
                $color = getFlashData('color');
                getMessage($color, $msg);
                ?>
                <!-- <div class='mx-auto p-3 text-center rounded-md border border-red-500 text-red-800 bg-red-200'>" . $msg . "</div> -->
                <form class="space-y-4 md:space-y-6" action="?controller=login&action=checkLogin" method=post>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mật khẩu</label>
                        <input type="password" name="pass" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800">
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="text-gray-500 dark:text-gray-300">Nhớ mật khẩu</label>
                            </div>
                        </div>
                        <a href="?controller=login&action=forget" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Quên mật khẩu?</a>
                    </div>
                    <button type="submit" name='btn-login' class="w-full text-white bg-amber-500 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Đăng nhập</button>
                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        Bạn chưa có tài khoản? <a href="?controller=register" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Đăng kí</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>