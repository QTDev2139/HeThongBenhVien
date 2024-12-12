<?php
ob_start(); // Bật chế độ đệm đầu ra
session_start();
// error_reporting(0);
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 'trangchu';
    }
    include_once("layout/header.php");
    if(file_exists('css/'.$page.'.css')){
        echo '<link rel="stylesheet" href="css/'.$page.'.css">';
    }
    switch($page){
        case 'trangchu': 
            echo '<title>Trang chủ</title>'; 
            break;
        case '404': 
            echo '<title>Trang chủ</title>'; 
            break;
        case 'gioithieu': 
            echo '<title>Giới thiệu</title>'; 
            break;
        case 'bacsi': 
            echo '<title>Bác sĩ</title>'; 
            break;
        case 'lienhe': 
            echo '<title>Liên hệ</title>'; 
            break;
        case 'chuyenkhoa': 
            echo '<title>Chuyên khoa</title>'; 
            break;
        case 'dangky': 
            echo '<title>Đăng ký</title>'; 
            break;
        case 'thanhtoan': 
            echo '<title>Thanh Toán</title>'; 
            break;
        case 'xemphieu': 
            echo '<title>Xem phiếu</title>'; 
            break;
        case 'phieukham': 
            echo '<title>Phiếu khám</title>'; 
            break;
        case 'phieudangkykham': 
            echo '<title>Phiếu Đăng ký Khám</title>'; 
            break;
        case 'chitietPK': 
            echo '<title>Chi tiết phiếu khám</title>'; 
            break;
        case 'chitietPDKK': 
            echo '<title>Chi tiết phiếu đăng ký khám</title>'; 
            break;
        case 'chitiethoso': 
            echo '<title>Chi tiết Hồ Sơ</title>'; 
            break;
    }
    include_once("layout/nav.php");

    if(isset($_GET['page'])){
        $page = $_GET['page'];
    } else {
        $page = 'trangchu';
    }
    if(file_exists('view/page-viewuser/'.$page.'/index.php')){
        include_once('view/page-viewuser/'.$page.'/index.php');
    }else {
        include_once('view/page-viewuser/404/index.php');
    }
    include_once("view/login.php");

    include_once("layout/footer.php");
?>
