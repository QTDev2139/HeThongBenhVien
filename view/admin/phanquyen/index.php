<?php
error_reporting(0);
include_once("controller/csanpham.php");
$p = new csanpham();
$tblSP = $p->getND($_REQUEST['mand']);
$tblSP1 = $p->getAllROLE();
$r = $tblSP->fetch_assoc();
if (isset($_REQUEST['sua'])) {
    $idrole = $_REQUEST['vTro'];
    $iduser = $_REQUEST['mand'];
    $p1 = new csanpham();
    $tblSP3 = $p->getTENROLE($idrole);
    while ($r3 = $tblSP3->fetch_assoc()) {
        $chucvu = $r3['namerole'];
    }
    $p->suaROLEUSER($idrole, $iduser);
    $p->suaROLEND($iduser, $chucvu);
    echo '<script>alert("Sửa thành công")</script>';
    echo '<script>window.location.href = "index.php?admin=phanquyen&mand=' . $iduser . '"</script>'; // điều hướng về trang...
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lí người dùng</title>
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
    <div class="content">
        <div class="container-dki">
            <h3>THAY ĐỔI QUYỀN</h3>
            <form id="login-form" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="hoten" value="<?php echo $r['Hoten']; ?>">
                    <div class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="chucvu" class="form-label">Chức vụ</label>
                    <input type="text" class="form-control" name="sdt" value="<?php echo $r['Chucvu']; ?>">
                    <div class="text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="quyen" class="form-label">Thay đổi quyền<span class="text-danger"></span></label>
                    <?php
                    echo "<select name='vTro'>";
                    echo "<option value='' disabled selected>Chọn quyền</option>";
                    while ($r1 = $tblSP1->fetch_assoc()) {
                        echo '<option value="' . $r1['idrole'] . '">' . $r1['namerole'] . ' </option>';
                    }
                    echo "</select>"; ?>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-login" name="sua">Thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>