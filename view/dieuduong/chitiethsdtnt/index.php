<div class="container my-3">
    <h2 class="text-center my-5 text-primary">CHI TIẾT HỒ SƠ ĐIỀU TRỊ NỘI TRÚ</h2>

    <?php
    include_once("controller/cBenhNhan.php");
    $c = new cBenhNhan();
    $_SESSION['mahsdt'] = $_REQUEST["mahs"];
    $hs = $c->layCTHSDTNT($_REQUEST["mahs"]);
    while ($r = mysqli_fetch_assoc($hs)) {
        echo '<div class="row mx-5 px-5 p-4 border rounded bg-light shadow">
                        <div class="col-12 row my-3">
                            <h3  class="my-3 text-primary">Thông tin bệnh nhân</h3>
                            <div class="col-6">
                                <ul class="list-unstyled">
                                    <li><b>Họ tên: </b>' . $r['HoTen'] . '</li>
                                    <li><b>Giới tính: </b>' . $r['gioiTinh'] . '</li>
                                    <li><b>Ngày sinh: </b>' . $r['ngaySinh'] . '</li>
                                    <li><b>Ngày nhập viện: </b>' . $r['NgayNhapVien'] . '</li>
                                    <li><b>Phòng: </b>' . $r['tenPhong'] . '</li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-unstyled">
                                    <li><b>Chuẩn đoán: </b>' . $r['ChuanDoan'] . '</li>
                                    <li><b>Triệu chứng: </b>' . $r['TrieuChung'] . '</li>
                                    <li><b>Ghi chú: </b> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-12 row">
                            <h3 class="my-3 text-primary">Thông tin điều trị</h3>
                            <ul class="list-unstyled">
                                <li><b>Hướng điều trị: </b>' . $r['HuongDieuTri'] . '</li>
                                <li><b>Điều trị cụ thể: </b>' . $r['DieuTriCuThe'] . '</li>
                            </ul>
                        </div>
        <div class="col-12 row my-3">
            <h3 class="text-center text-primary">Toa thuốc</h3>';

        echo '<div class="treatment-section">
            <table class="table table-striped table-bordered w-100">
            <table class="table table-striped table-bordered w-100">';
        include_once("model/mHoaDonThanhToan.php");
        $ps = new mHoaDonThanhToan();
        $tblThuoc = $ps->selectThuocDieuTriByIDToaThuoc($r['maToaThuoc'] );
        echo '<tr>
                                <th>Mã thuốc</th>
                                <th>Tên thuốc</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th>Giảm BHYT</th>
                                <th>Thành tiền</th>
                            </tr>';
            while ($rs = $tblThuoc->fetch_assoc()) {

                $thanhtien = $rs['soLuongCapPhat'] * $rs['Gia'] - $rs['soLuongCapPhat'] * $rs['Gia'] * ($rs['mucBHYT'] / 100);
                echo '
                            
                            <tr>
                                <td>' . $rs['maThuoc'] . '</td>
                                <td>' . $rs['tenThuoc'] . '</td>
                                <td>' . $rs['soLuongCapPhat'] . '</td>
                                <td>' . number_format($rs['Gia'], 0, ',', ',') . ' VND</td>
                                <td>' . $rs['mucBHYT'] . '%</td>
                                <td>' . number_format($thanhtien, 0, ',', ',') . ' VND</td>
                            </tr>';
            }
        }
    ?>
    </table>
</div>
</div>
</div>
        <div class="row">
            <div class="col-12 text-center my-4">
                <a class="btn btn-primary mx-1" href="index-staff.php?page-sub=xemdanhsachdtnt">Quay lại</a>
                <a class="btn btn-info mx-1" href="index-staff.php?page-sub=ghinhandtnt&mahs=<?php echo $_SESSION['mahsdt']?>">Ghi nhận theo dõi nội trú</a>
            </div>
        </div>

</div>