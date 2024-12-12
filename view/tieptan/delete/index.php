<?php
include("controller/cBenhNhan.php");
if (isset($_GET['id'])) {
    $maBenhNhan = $_GET['id'];
    $cBenhNhan = new cBenhNhan();
    $cBenhNhan->deleteBN($maBenhNhan);
    header('Location: quanlyhoso/index.php');
    exit();
} else {
    echo "Mã bệnh nhân không hợp lệ.";
}
?>
