<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duyệt yêu cầu đổi lịch</title>
    
<style>
    
</style>
</head>
<body>
    <div class="container">
        <div class="content">
            <div class="title1" style="text-align: center;font-size: 30px;padding-bottom: 20px;">Duyệt yêu cầu đổi lịch</div>
            <?php
            include_once("controller/cquanli.php");
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
                    <td><a class="btn btn-primary " href="index-staff.php?page-sub=duyetyeucau&mp='.$r['maPhieuYCDL'].'">Xem chi tiết</a></td></tr>';
                }
                    ?>
                
            </table>
        </div>
    </div>
</body>

</html>