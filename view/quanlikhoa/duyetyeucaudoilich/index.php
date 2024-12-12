<?php
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyệt yêu cầu đổi lịch</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
<style>
    .title1{
        text-align: center;
        font-size: 30px;
        padding-bottom: 20px;
    }
</style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="title1">Duyệt yêu cầu đổi lịch</div>
            <?php
            include_once("controller/csanpham.php");
            $p = new cSanpham();
            $tblSP = $p->getALLNVYCDL();
            ?>
            <table class="table table-success table-striped table-bordered border-primary table-hover">
                <tr>
                    <th>Nhân viên</th>
                    <th>Chức vụ</th>
                    <th>Trạng thái</th>
                    <th>Tùy chọn</th>
                </tr>
                
                    <?php
                    while ($r = $tblSP->fetch_assoc()) {
                        echo '
                        <tr>
                    <td>' . $r['Hoten'] . '</td>
                    <td>' . $r['Chucvu'] . '</td>
                    <td>' . $r['trangThai'] . '</td>
                    <td><a class="btn btn-primary " href="index.php?quanlikhoa=duyetyeucau&mp='.$r['maPhieuYCDL'].'">Xem chi tiết</a></td></tr>';
                }
                    ?>
                
            </table>
        </div>
    </div>
</body>

</html>