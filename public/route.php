<?php
session_start();
require_once('../config.php');
if (isset($_GET['c'])) {
    $controller = $_GET['c'];
    if (isset($_GET['a'])) {
        $action = $_GET['a'];
    } else {
        $action = 'index';
    }
} else {
    $controller = 'dashboard';
    $action = 'index';
}
ob_start();

switch ($controller) {
    case 'dashboard':
        switch ($action) {
            case 'index':
                require_once('dashboard.php');

                break;
            case 'dang_nhap':
                require_once('dang_nhap.php');

                break;
            case 'dang_ky':
                require_once('dang_ky.php');

                break;
            case 'logout':
                unset($_SESSION['dang-nhap']);
                header('location: index.php?c=dashboard&a=index');
                break;
            case 'tim_kiem':
                require_once('modules/search.php');
                break;

            default:
                # code...
                break;
        }
        break;
    case 'gio_hang':
        switch ($action) {
            case 'xem_gio_hang':
                require_once('modules/gio_hang/view.php');
                break;

            case 'them_gio_hang':
                require_once('modules/gio_hang/add.php');
                break;

            case 'xoa_san_pham':
                require_once('modules/gio_hang/delete.php');
                break;

            case 'giam_so_luong':
                require_once('modules/gio_hang/minus.php');
                break;

            case 'tang_so_luong':
                require_once('modules/gio_hang/plus.php');
                break;

            case 'xoa_gio_hang':
                require_once('modules/gio_hang/destroy.php');
                break;
            case 'dat_hang':
                require_once('modules/gio_hang/order.php');
                break;
        }
        break;

    case 'xem_san_pham':
        switch ($action) {
            case 'xem_tat_ca':
                require_once('modules/view_all.php');
                break;
        }
        break;
    case 'khach_hang':
        switch ($action) {
            case 'cap_nhat':
                require_once('modules/khach_hang/update.php');
                break;
        }
        break;
    default:
        break;
}

if (isset($_GET['tim_kiem'])) {
    header('location: index.php?c=xem_san_pham&a=xem_tat_ca&q=' . $_GET['tim_kiem']);
}

$content = ob_get_contents();
ob_get_clean();
require_once('layouts/application.php');
