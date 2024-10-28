<?php
function getStar($data = [], $value = [])
{
    if (empty($data)) return "<p class='pb-5'>Chưa có đánh giá</p>";
    $check = true;
    foreach ($data as $key => $data) {
        if ($data['product_id'] == $value['product_id']) {
            $starI = $data['star'];
            switch ($starI) {
                case '1':
                    return sao(1) . sao(0) . sao(0) . sao(0) . sao(0);
                    break;
                case '2':
                    return sao(1) . sao(1) . sao(0) . sao(0) . sao(0);
                    break;
                case '3':
                    return sao(1) . sao(1) . sao(1) . sao(0) . sao(0);
                    break;
                case '4':
                    return sao(1) . sao(1) . sao(1) . sao(1) . sao(0);
                    break;
                case '5':
                    return sao(1) . sao(1) . sao(1) . sao(1) . sao(1);
                    break;
            }
            if ($starI <= 1.5 && $starI > 1) {
                return sao(1) . sao(2) . sao(0) . sao(0) . sao(0);
            } else if ($starI <= 2.5 && $starI > 2) {
                return sao(1) . sao(1) . sao(2) . sao(0) . sao(0);;
            } else if ($starI <= 3.5 && $starI > 3) {
                return sao(1) . sao(1) . sao(1) . sao(2) . sao(0);
            } else if ($starI <= 4.5 && $starI > 4) {
                return sao(1) . sao(1) . sao(1) . sao(1) . sao(2);
            } else if ($starI <= 5 && $starI > 4.5) {
                return sao(1) . sao(1) . sao(1) . sao(1) . sao(2);
            }
        } else {
            $check = false;
        }
    }
    if ($check == false) {
        $check = true;
        return "<p>Chưa có đánh giá</p>";
    }
}
function sao($x)
{
    switch ($x) {
        case '0':
            echo '<i class="fa-regular fa-star text-yellow-400"></i>'; //sao rỗng
            break;
        case '1':
            echo '<i class="fa-solid fa-star text-yellow-400"></i>'; //sao 
            break;
        case '2':
            echo '<i class="fa-regular fa-star-half-stroke text-yellow-400"></i>';
            break; // sao hafl
    }
}
function starComment($rate)
{
    switch ($rate) {
        case '1':
            echo '&#9733&#9734&#9734&#9734&#9734';
            break;
        case '2':
            echo '&#9733&#9733&#9734&#9734&#9734';
            break;
        case '3':
            echo '&#9733&#9733&#9733&#9734&#9734';
            break;
        case '4':
            echo '&#9733&#9733&#9733&#9733&#9734';
            break;
        case '5':
            echo '&#9733&#9733&#9733&#9733&#9733';
            break;
    }
}
function deleteByCheckBox($property, $controller)
{
    if (isset($_POST['btn-delete-checkbox'])) {
        $arr = [];
        foreach ($_POST as $key => $value) {
            $arr[] = $key;
        }
        $arrAfter = array_diff($arr, ['btn-delete-checkbox', 'all']);
        $listParam = array_values($arrAfter);
        $count = count($listParam);
        if ($count == 0) {
            header("location: ?role=admin&controller=$controller");
        }
        function param($n)
        {
            $count = "";
            for ($i = 0; $i < $n; $i++) {
                $count .= ($i == ($n - 1)) ? "?" : "?,";
            }
            return $count;
        }
        $count = param($count);
        if ($property->deleteByCheckBox($count, $listParam)) {
            header("location: ?role=admin&controller=$controller");
        }
    }
}
function getMessage($color, $msg)
{
    echo !empty($msg) ? "<div class='mx-auto p-3 text-center rounded-md border border-$color-500 text-$color-800 bg-$color-200'>" . $msg . "</div>" : '';
}
function changeController($controller)
{
    $actionNeedUser = ['LogoutController', 'AccountController', "CartController"];
    if (!isset($_SESSION['user'])) {
        if (in_array($controller, $actionNeedUser)) {
            header("location: ?controller=login");
        }
    }
}
function checkAdmin($role)
{
    if (!isset($_SESSION['user']) || $_SESSION['user']['customer_role'] == 0) {
        require 'views/common/404.php';
        exit();
    }
}
