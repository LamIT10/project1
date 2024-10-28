<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture</title>
    <link rel="stylesheet" href="src/output.css?v=<?= time() ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container m-auto flex flex-row-reverse" id="con">
        <div class="w-4/5 bg-gradient-to-br from-indigo-50 to-teal-50">
            <header class='py-2 px-3 flex relative items-center justify-end gap-3 bg-white' style="box-shadow: 0 0 15px 0 rgba(0, 0, 0,0.5);">
                <div class="text-right " id="info">
                    <h1 class="font-medium text-lg"><?= getSession('user')['customer_name'] ?> </h1>
                    <p class="text-sm">
                        <?php (getSession('user')['customer_role'] == 1 ? print('Nhân viên') : print('Quản lý')) ?>
                    </p>
                </div>
                <div class="rounded-full w-12 h-12 overflow-hidden"><img class="w-full" src="uploads/img/<?= getSession('user')['customer_img'] ?>" alt=""></div>
                <i id="down" class="fa-solid fa-chevron-down p-2 rounded-full hover:bg-slate-200"></i>
                <a id="choose" class="py-2 px-3 bg-red-500 text-white absolute z-50 -bottom-full hidden transform -translate-y-1/2  text-sm rounded-md hover:bg-red-700" href="?controller=logout"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a>
            </header>
            <script>
                let down = document.getElementById('down');
                let choose = document.getElementById('choose');

                down.addEventListener('click', function() {
                    if (choose.classList.contains("hidden")) {
                        choose.classList.remove("hidden");
                    } else {
                        choose.classList.add("hidden");
                    }
                });
            </script>