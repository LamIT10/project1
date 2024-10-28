<div class="w-1/3 mx-auto my-20">
    <form class="w-full p-5 shadow-md shadow-slate-800 rounded-md" action="?controller=login&action=getpass" method="post">
        <label for="email">
            Nhập email của bạn:
        </label>
        <div class="my-5">
            <input class="w-full border border-slate-400 p-2 rounded-md" type="text" name="email" id="">
        </div>
        <?php
        $msg = getFlashData('msg');
        $color = getFlashData('color');
        getMessage($color, $msg);
        ?>
        <!-- <div class='mx-auto p-3 text-center rounded-md border border-green-500 text-green-800 bg-green-200'>" . $msg . "</div> -->

        <button class="block w-full mt-10 px-3 py-2 rounded-sm text-white bg-green-500" type="submit" name="btn-forget">Lấy lại mật khẩu</button>
    </form>
</div>