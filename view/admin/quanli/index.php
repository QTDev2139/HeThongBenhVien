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
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center ">
                <span>Danh Sách Người Dùng</span>
            </div>
            <table class="table table-striped table table-hover table table-bordered border-primary">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Họ tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include_once("controller/csanpham.php");
                    $p = new cSanpham();
                    $tblSP = $p->getALLND();
                    $dem = 1;
                    while ($r = $tblSP->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>$dem</td>";
                        echo "<td>" . $r['Hoten'] . "</td>";
                        echo "<td>" . $r['SDT'] . "</td>";
                        echo "<td>" . $r['Email'] . "</td>";
                        echo "<td>" . $r['Diachi'] . "</td>";
                        echo "<td>" . $r['Chucvu'] . "</td>";
                        echo '<td>
                        <button type="button" class="btn btn-outline-danger"><a href="index.php?admin=xoanguoidung&mand=' . $r['MaNV'] . '">Xóa</a></button>
                        <button type="button" class="btn btn-outline-info"><a href="index.php?admin=suanguoidung&mand=' . $r['MaNV'] . '">Sửa</a></button>
                        </td>';
                        $dem++;
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
</body>
</html>