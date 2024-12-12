<?php
class CMain_Staff
{
    public function getChucNang($role)
    {
        switch ($role) {
            case 1:
                echo '<li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index-staff.php?page-sub=trangchu">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=quanly">Quản lý</a>
                        </li>';
                break;
            case 2:
                echo '<li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index-staff.php?page-sub=trangchu">Trang chủ</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=xemlichtruckham">Xem lịch trực khám</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=doica">Đổi ca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=xemdskham">Xem danh sách khám</a>
                        </li>
                      <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=phieukham">Xem lịch sử phiếu khám</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=laphsnt">Lập hồ sơ điều trị nội trú</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=xemhoso">Xem hồ sơ bệnh án nội trú</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=xemdsthuoc">Xem danh sách thuốc bhyt</a>
                        </li>';
                break;
            case 3:
                echo '<li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index-staff.php?page-sub=trangchu">Trang chủ</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=xemlichtruckham">Xem lịch trực khám</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=doica">Đổi ca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=xemdanhsachdtnt">Xem danh sách điều trị nội trú</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=ghinhandtnt">Ghi nhận điều trị nội trú</a>
                        </li>';
                break;
            case 4:
                echo '<li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index-staff.php?page-sub=trangchu">Trang chủ</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=xemlichtruckham">Xem lịch trực khám</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=doica">Đổi ca</a>
                        </li>
                        <li class="nav-item">
                    <a class="nav-link" href="index-staff.php?page-sub=danhsach">Xem danh sách hóa đơn</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index-staff.php?page-sub=baocao">Báo cáo</a>
                </li>';
                break;
            case 5:
                echo '<li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index-staff.php?page-sub=trangchu">Trang chủ</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=xemlichtruckham">Xem lịch trực khám</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=doica">Đổi ca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=Quanlythuoc">Quản lý thuốc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=DanhSachDonThuoc">Xem danh sách đơn thuốc</a>
                        </li>';
                break;
            case 6:
                echo '<li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index-staff.php?page-sub=trangchu">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=dangky">Đăng ký khám</a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=xemlichtruckham">Xem lịch trực khám</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=doica">Đổi ca</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index-staff.php?page-sub=quanlyhoso">Quản lý hổ sơ bệnh nhân</a>
                        </li>';
                break;
            case 7:
                echo '<li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index-staff.php?page-sub=trangchu">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index-staff.php?page-sub=lenlichtruckham">Lên lịch trực khám</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index-staff.php?page-sub=lenlichtruckhamdieuduong">Lên lịch trực kh</a>
                        </li>
                        ';
                break;
            default:
                break;
        }
    }
}
