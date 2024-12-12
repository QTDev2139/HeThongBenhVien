<?php
error_reporting(0);
include_once("controller/csanpham.php");
$p = new csanpham();
//$r =$tblSP -> fetch_assoc(); 
if (isset($_REQUEST['sua'])) {
    // Kiểm tra xem các trường có được nhập đầy đủ không
    if (empty($_REQUEST['chuyenKhoa'])) {
        echo '<script>alert("Vui lòng nhập chuyên khoa!");</script>';
    } else {
        $ckhoa = $_REQUEST['chuyenKhoa'];
        $manv = $_REQUEST['id'];
        $p->addTTBS($manv, $ckhoa);
        echo '<script>alert("Thêm thành công")</script>';
        //echo '<script>window.location.href = "index.php?admin=.....";</script>'; // điều hướng về trang...
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chọn chuyên khoa cho bác sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</head>
<style>
    .container-dki {
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .form-control:focus {
        box-shadow: 0 0 5px rgba(255, 0, 0, 0.6);
        border-color: red;
    }

    .btn-login {
        background-color: darkcyan;
        color: white;
        border: none;
    }

    .btn-login:hover {
        background-color: deepskyblue;
    }

    .forgot-password {
        text-align: right;
    }

    h3 {
        text-align: center;
    }
</style>

<body>
    <div class="container">
        <div class="content">
            <div class="container-dki">
                <h3>THÊM MỚI</h3>
                <form id="login-form" method="post">
                    <div class="mb-3">
                        <div class="btn-group">
                            <select class="form-select" aria-label="Default select example" name='chuyenKhoa'>
                                <option selected value="">Chọn chuyên khoa</option>
                                <?php
                                $tblSP1 = $p->getAllCK();
                                while ($r = $tblSP1->fetch_assoc()) {
                                    echo '<option value="' . $r['maChuyenKhoa'] . '">' . $r['tenChuyenKhoa'] . ' </option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="sua" class="btn btn-login" name="dKi">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>