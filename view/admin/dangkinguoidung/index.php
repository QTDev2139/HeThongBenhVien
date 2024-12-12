<?php
error_reporting(0);
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
    <div class="container">
        <div class="content">
            <div class="container-dki">
                <h3>THÊM MỚI</h3>
                <form id="login-form" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="usname" required>
                        <div class="invalid-feedback">Vui lòng nhập tên đăng nhập</div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" name="pass" required>
                        <div class="invalid-feedback">Vui lòng nhập mật khẩu</div>
                    </div>
                    <div class="mb-3">
                        <div class="btn-group">
                            <select class="form-select" aria-label="Default select example" name='vTro'>
                                <option selected value="">Chọn chức vụ</option>
                                <?php
                                include_once("controller/csanpham.php");
                                $p = new csanpham();
                                $tblSP = $p->getAllROLE();
                                while ($r = $tblSP->fetch_assoc()) {
                                    echo '  <option value="' . $r['idrole'] . '">' . $r['namerole'] . '</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-login" name="dKi">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
</body>
</html>
<?php
if (isset($_REQUEST['dKi'])) {
    $p2 = new csanpham();
    $tblSP2 = $p2->getUSER();
    $usname = strtolower(trim($_REQUEST["usname"]));
    $check = null;
    while ($r1 = $tblSP2->fetch_assoc()) {
        if (strtolower(trim($r1['nameuser'])) == $usname) {
            $check = $usname;
        }
    }
    //Kiểm tra xem các trường có được nhập đầy đủ không
    if (empty($_REQUEST['usname']) || empty($_REQUEST['pass']) || empty($_REQUEST['vTro'])) {
        echo '<script>alert("Vui lòng nhập đủ thông tin!"); </script>';

    } elseif ($check == $usname) {
        echo '<script>alert("Tên đăng nhập đã tồn tại!"); </script>';
    } else {
        $user = $_REQUEST['usname'];
        $password = $_REQUEST['pass'];
        $idrole = $_REQUEST['vTro'];
        $p->getADDROLE($user, $password, $idrole);
        //Hiển thị thông báo và chuyển hướng
        $stt = null;
        $tblSP3 = $p2->getUSERGIONG($_REQUEST['usname']);
        while ($r2 = $tblSP3->fetch_assoc()) {
            if (isset($tblSP3)) {
                $stt = $r2['iduser'];
            }
        }
        echo '<script>
                        alert("Thêm thành công");
                        window.location.href = "index.php?admin=themnguoidung&id=' . $stt . '"; 
                      </script>';
    }
}
?>