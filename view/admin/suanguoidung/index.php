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
        /* phần sửa */
        .header1 {
            background-color: #00b3b3;
            text-align: center;
            padding: 10px;
            border-radius: 10px;
            margin: 20px auto;
            width: 300px;
        }

        .form1 {
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: inline-block;
            width: 180px;
            text-align: left;
            color: #333;
            font-weight: bold;
        }

        .form-group input {
            border: 1px solid #ccc;
            border-radius: 20px;
            padding: 10px;
            width: 200px;
            text-align: center;
        }

        .buttons {
            margin-top: 20px;
        }

        .buttons button {
            border: none;
            border-radius: 20px;
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
            font-weight: bold;
        }

        .buttons button.edit {
            background-color: #00b3b3;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="content">
            <?php
            include_once("controller/csanpham.php");
            $p = new csanpham();
            $tblSP = $p->getND($_REQUEST['mand']);
            $r = $tblSP->fetch_assoc();
            if (isset($_REQUEST['sua'])) {
                // Kiểm tra xem các trường có được nhập đầy đủ không
                if (empty($_REQUEST['suahoten']) || empty($_REQUEST['suaemail']) || empty($_REQUEST['suasdt']) || empty($_REQUEST['suadiachi'])) {
                    echo '<script>alert("Vui lòng nhập đủ thông tin!");</script>';
                } else {
                    $ten = $_REQUEST['suahoten'];
                    $sdt = $_REQUEST['suasdt'];
                    $email = $_REQUEST['suaemail'];
                    $diachi = $_REQUEST['suadiachi'];
                    $manv = $_REQUEST['mand'];
                    $p->suaND($ten, $sdt, $email, $diachi, $manv);
                    echo '<script>alert("Sửa thành công")</script>';
                    //echo '<script>window.location.href = "index.php?admin=.....";</script>'; // điều hướng về trang...
                }
            }
            ?>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form1">
                    <div class="header1">Quản lý người dùng</div>
                    <div class="form-group">
                        <label>Họ Tên</label>
                        <?php echo '<td><input type="text" name="suahoten" value="' . $r['Hoten'] . '"></td>'; ?>
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại</label>
                        <?php echo '<td><input type="text" name="suasdt" value="' . $r['SDT'] . '"></td>'; ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <?php echo '<td><input type="text" name="suaemail" value="' . $r['Email'] . '"></td>'; ?>
                    </div>
                    <div class="form-group">
                        <label>Địa chỉ</label>
                        <?php echo '<td><input type="text" name="suadiachi" value="' . $r['Diachi'] . '"></td>'; ?>
                    </div>
                    <div class="buttons">
                        <button type="button" class="btn btn-danger">Hủy</button>
                        <button type="submit" name="sua" class="btn btn-primary">Sửa</button>
                    </div>
                </div>
            </form>
        </div>
</body>

</html>