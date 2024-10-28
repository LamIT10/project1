<div class="text-black bg-white rounded-md px-3 py-10 z-11 w-2/3 m-auto mt-20 shadow-md shadow-slate-400">
    <div class="flex justify-between items-center p-2">
        <h1 class="text-xl font-semibold">Cập nhật danh mục</h1>
    </div>
    <hr>
    <form action="?role=admin&controller=category&action=update&id=<?= $category['category_id'] ?>" method=post class="p-5">
        <label class='' for="category_name">
            <div class='mb-3'>Tên danh mục</div>
            <input value="<?= $category['category_name'] ?>" class="border mb-5 border-slate-400 p-2 w-full rounded-md focus:outline-4 focus:outline-blue-600" type="text" name="category_name" id="">
        </label>
        <div class="flex justify-end gap-5">
            <button class="px-3 py-2 rounded-md block text-white bg-blue-600" type="submit" name='btn-update'>Cập nhật</button>
        </div>
    </form>
</div>
<script>
    document.body.style.overflow = 'hidden';
</script>