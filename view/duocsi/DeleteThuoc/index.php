
<?php 
    include_once("model/mThuoc.php");
    $p = new mThuoc();
    $tblCty = $p -> deleteThuoc($_REQUEST["delete"]);
    if (!$tblCty) {
        echo "0 result";
    } else {
        echo '<script>alert("Xóa sản phẩm thành công");';
        echo 'window.location.href = "index-staff.php?page-sub=Quanlythuoc&page=' . $_SESSION["page"] . '";</script>';
    }

?>