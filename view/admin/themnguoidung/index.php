<?php
error_reporting(0);

include_once("controller/csanpham.php");
$p = new csanpham();
$p1 = new csanpham();
$p2 = new csanpham();
$tblSP = $p1->getNAMER($_REQUEST['id']);
while ($r = $tblSP->fetch_assoc()) {
    $chucvu = $r['namerole'];
    $idr = $r['idrole'];
}

$errorMessages = [
    'hoten' => '',
    'sdt' => '',
    'email' => '',
    'diachi' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Lấy dữ liệu từ form
    $hoten = trim($_POST['hoten']);
    $sdt = trim($_POST['sdt']);
    $email = trim($_POST['email']);
    $diachi = trim($_POST['diachi']);

    // Kiểm tra họ tên
    // Kiểm tra họ tên (cho phép có dấu)
    if (empty($hoten) || !preg_match("/^[\p{L}\s]+$/u", $hoten)) {
        $errorMessages['hoten'] = 'Họ tên phải bắt đầu bằng chữ hoa.';
    }
    // Kiểm tra số điện thoại
    if (empty($sdt) || !preg_match("/^\d{10,11}$/", $sdt)) {
        $errorMessages['sdt'] = 'Số điện thoại không hợp lệ. Vui lòng nhập 10-11 chữ số.';
    }

    // Kiểm tra email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessages['email'] = 'Email không đúng định dạng.';
    }

    // Kiểm tra địa chỉ
    if (empty($diachi)) {
        $errorMessages['diachi'] = 'Địa chỉ không được để trống.';
    }

    // Nếu không có lỗi, xử lý dữ liệu
    if (!array_filter($errorMessages)) {


        if (isset($_REQUEST['them'])) {
            $iduser = $_REQUEST['id'];
            $ten = $_REQUEST['hoten'];
            $sdt = $_REQUEST['sdt'];
            $email = $_REQUEST['email'];
            $diachi = $_REQUEST['diachi'];
            $p->getADDND($ten, $sdt, $email, $diachi, $chucvu, $iduser);
            $tblSP2 = $p2->getIDNV($iduser);
            while ($r1 = $tblSP2->fetch_assoc()) {
                $manv = $r1['MaNV'];
            }
            echo $idr;
            echo $manv;
            if ($idr == 2) {
                echo '<script>
                                alert("Thêm thành công");
                                window.location.href = "index.php?admin=themchuyenkhoabacsi&id=' . $manv . '"; 
                              </script>';
            } elseif ($idr == 3) {
                echo '<script>
                                alert("Thêm thành công");
                                window.location.href = "index.php?admin=themchuyenkhoadieuduong&id=' . $manv . '"; 
                              </script>';
            } else {
                echo '<script>alert("Thêm thành công")</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm thông tin chi tiết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
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
</head>

<body>
    <div class="container-dki">
        <h3>THÊM MỚI</h3>
        <form id="login-form" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="username" class="form-label">Họ tên<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="hoten"
                    value="<?= htmlspecialchars($_POST['hoten'] ?? '') ?>">
                <div class="text-danger"><?= $errorMessages['hoten'] ?></div>
            </div>
            <div class="mb-3">
                <label for="sdt" class="form-label">Số điện thoại<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="sdt" value="<?= htmlspecialchars($_POST['sdt'] ?? '') ?>">
                <div class="text-danger"><?= $errorMessages['sdt'] ?></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="email"
                    value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <div class="text-danger"><?= $errorMessages['email'] ?></div>
            </div>
            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ<span class="text-danger">*</span></label>
                <input type="text" class="form-control" name="diachi"
                    value="<?= htmlspecialchars($_POST['diachi'] ?? '') ?>">
                <div class="text-danger"><?= $errorMessages['diachi'] ?></div>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-login" name="them">Thêm</button>
            </div>
        </form>
    </div>
    </div>
</body>

</html>