 <!-- form add product -->
 <div id="formAddProduct" class="text-black shadow-md shadow-slate-400  bg-white rounded-xl p-3 w-11/12 mx-auto my-10">
     <div class="flex justify-between items-center pl-2 py-7">
         <h1 class="text-xl font-semibold">Thêm sản phẩm mới</h1>
     </div>
     <hr>
     <form action="?role=admin&controller=product&action=add" method=post class="p-5" enctype="multipart/form-data">
         <div class="flex justify-between gap-10">
             <label class='w-1/2' for="product_name">
                 <div class='mb-3'>Tên sản phẩm</div>
                 <input class="border mb-5 border-slate-400 p-2 w-full rounded-md focus:outline-4 focus:outline-green-500" type="text" name="product_name" id="">
             </label>
             <label class='w-1/2' for="product_price">
                 <div class='mb-3'>Giá sản phẩm</div>
                 <input class="border mb-5 border-slate-400 p-2 w-full rounded-md focus:outline-4 focus:outline-green-500" type="number" name="product_price" id="">
             </label>
         </div>
         <div class="flex justify-between gap-10">
             <label class='w-1/2' for="product_img">
                 <div class='mb-3'>Ảnh sản phẩm</div>
                 <input class="border mb-5 border-slate-400 p-2 w-full rounded-md focus:outline-4 focus:outline-green-500" type="file" name="product_img" id="">
             </label>
             <label class='w-1/2' for="product_date">
                 <div class='mb-3'>Ngày nhập</div>
                 <input class="border mb-5 border-slate-400 p-2 w-full rounded-md focus:outline-4 focus:outline-green-500" type="date" name="product_date" id="">
             </label>
         </div>
         <div class="flex justify-between gap-10">
             <label class='w-1/2' for="product_unique">
                 <div class='mb-3 '>Hàng đặc biệt</div>
                 <div class='flex items-center justify-between border mb-5 border-slate-400 py-2 px-7 rounded-md'>
                     <label><input class="text-3xl" type="radio" name="product_unique" id="" value="0"> Sản phẩm thường</label>
                     <label><input type="radio" name="product_unique" id="" value="1"> Sản phẩm đặc biệt</label>
                 </div>
             </label>
             <label class='w-1/2' for="product_discount">
                 <div class='mb-3'>Giảm giá (%)</div>
                 <input class="border mb-5 border-slate-400 p-2 w-full rounded-md focus:outline-4 focus:outline-green-500" type="number" name="product_discount" id="">
             </label>
         </div>
         <label class='' for="category_id">
             <div class='mb-3'>Danh mục</div>
             <select name="category_id" id="" class="border mb-5 border-slate-400 p-2 w-full rounded-md focus:outline-4 focus:outline-green-500" type="text" name="category_id" id="">
                 <option value="" hidden>--Chọn danh mục--</option>
                 <?php
                    foreach ($listCategory as $key => $value) {
                        echo '<option value="' . $value['category_id'] . '">' . $value['category_name'] . '</option>';
                    }
                    ?>
             </select>
         </label>
         <label class='' for="product_des">
             <div class='mb-3'>Mô tả</div>
             <textarea class="border mb-5 h-32 border-slate-400 p-2 w-full rounded-md focus:outline-4 focus:outline-green-500" type="text" name="product_des" id=""></textarea>
         </label>
         <div class="flex justify-end gap-5">
             <button class="px-3 py-2 rounded-md block text-white bg-amber-500" type="reset"><i class="fa-solid fa-rotate-right"></i> Nhập lại</button>
             <button class="px-3 py-2 rounded-md block text-white bg-green-500" type="submit" name='btn-add'>Thêm mới</button>
         </div>
     </form>
 </div>
 <!-- end form add product-->