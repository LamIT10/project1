        <div class="relative sidebar w-1/5 bg-gradient-to-br from-slate-800 to-blue-950">
            <div class="p-5">
                <div class="logo relative bg-amber-400 px-5 py-2 rounded-xl">
                    <img class='w-2/3 block mx-auto' src="uploads/img/logo.png" alt="">
                </div>
            </div>
            <div class="menu text-white  h-screen">
                <ul>
                    <li class="px-3 py-2"><a class="py-3 px-5 rounded-3xl block hover:bg-white hover:text-slate-950 transition duration-[400ms]" href="?role=admin&conttroller=home"><i class="fa-solid fa-house"></i> Trang chủ</a></li>
                    <li class="px-3 py-2"><a class="py-3 px-5 rounded-3xl block hover:bg-white hover:text-slate-950 transition duration-[400ms]" href="?role=admin&controller=category"><i class="fa-solid fa-list"></i> Danh mục</a></li>
                    <li class="px-3 py-2"><a class="py-3 px-5 rounded-3xl block hover:bg-white hover:text-slate-950 transition duration-[400ms]" href="?role=admin&controller=product"><i class="fa-solid fa-bag-shopping"></i> Sản phẩm</a></li>
                    <li class="px-3 py-2">
                        <div id="dropParent" class="py-3 px-5 rounded-3xl block hover:bg-white hover:text-slate-950 transition duration-[400ms]" href=""><i class="fa-solid fa-user-group"></i> Người dùng</div>
                        <div class="downChild hidden w-5/6 right mt-1 rounded-3xl" id="downChild">
                            <div class="w-1/6"></div>
                            <div class="w-5/6">
                                <a class="py-2 px-5  border border-x-amber-100 rounded-3xl block  hover:bg-white hover:text-slate-950 transition duration-[400ms]" href="?role=admin&controller=customer"><i class="fa-solid fa-user-group"></i> Khách hàng</a>
                                <a class="py-2 mt-1 px-5  border border-x-amber-100 rounded-3xl block  hover:bg-white hover:text-slate-950 transition duration-[400ms]" href="?role=admin&controller=customer&action=admin"><i class="fa-solid fa-user-tie"></i> Quản trị viên</a>
                            </div>
                        </div>
                    </li>
                    <li class="px-3 py-2"><a class="py-3 px-5 block rounded-3xl hover:bg-white hover:text-slate-950 transition duration-[400ms]" href="?role=admin&controller=comment"><i class="fa-solid fa-comment-dots"></i> Bình luận</a></li>
                    <li class="px-3 py-2"><a class="py-3 px-5 block rounded-3xl hover:bg-white hover:text-slate-950 transition duration-[400ms]" href="?role=client"><i class="fa-solid fa-desktop"></i> Xem trang web</a></li>
                </ul>
            </div>
        </div>
        <div id="overLay" class="absolute top-0 left-0 w-full h-full bg-black opacity-70 z-101 hidden"></div>
        </div>
        <!-- form add -->
        <div id="formAdd" class="text-black absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 bg-white rounded-xl p-3  z-105 hidden w-1/3">
            <div class="flex justify-between items-center p-2">
                <h1 class="text-xl font-semibold">Thêm danh mục</h1>
                <div class="text-right text-2xl w-max " id="closeForm" onclick="closeForm()"><i class="hover:bg-red-200 p-2 rounded-full fa-regular fa-circle-xmark text-red-600"></i></div>
            </div>
            <hr>
            <form action="?role=admin&controller=category&action=add" method=post class="p-5">
                <label class='' for="category_name">
                    <div class='mb-3'>Tên danh mục</div>
                    <input class="border mb-5 border-slate-400 p-2 w-full rounded-md focus:outline-4 focus:outline-green-500" type="text" name="category_name" id="">
                </label>
                <div class="flex justify-end gap-5">
                    <button class="px-3 py-2 rounded-md block text-white bg-amber-500" type="reset"><i class="fa-solid fa-rotate-right"></i> Nhập lại</button>
                    <button class="px-3 py-2 rounded-md block text-white bg-green-500" type="submit" name='btn-add'>Thêm mới</button>
                </div>
            </form>
        </div>
        <!-- end form add -->
        <script>
            let dropParent = document.getElementById('dropParent');
            let dropChild = document.getElementById('downChild');
            dropParent.addEventListener('click', function() {
                if (dropChild.style.display == 'flex') {
                    dropChild.style.display = 'none';
                } else {
                    dropChild.style.display = 'flex';
                }
            })
        </script>