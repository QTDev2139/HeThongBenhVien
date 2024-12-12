<?php
    //error_reporting(0);
    include_once("controller/cquanli.php");
    $p = new csanpham();
    if(isset($_REQUEST['mand']))
    {
        $p -> xoaND($_REQUEST['mand']);
        echo '<script>alert("Đã xóa người dùng");window.location.href = "index-staff.php?page-sub=quanli";</script>';
    }else{
        echo '<script>alert("Lỗi");</script>';
    }
?>