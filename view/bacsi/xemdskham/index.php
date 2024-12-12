<div class="d-flex justify-content-center">
    <div class="table-responsive w-75">
        <?php
        include_once("controller/cBenhNhan.php");

        $p = new cBenhnhan();
        $hd = $p->getBN();

        if ($hd) {
            
            echo '<div class="table-responsive">';
            echo '<table class="table table-striped table-hover text-center">';
            echo '<thead class="table-dark">';
            echo '<tr>
                    <th>Mã Phiếu</th>
                    <th>Mã Bệnh Nhân</th>
                    <th>Mã Ca</th>
                    <th>Mã Hóa Đơn</th>
                    <th>Mã Tiếp Tân</th>
                    <th>Ngày Đăng Ký</th>
                    <th>Trạng Thái</th>
                    <th>Thao Tác</th>
                </tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($r = mysqli_fetch_assoc($hd)) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($r["maPhieuDangKyKham"]) . '</td>';
                echo '<td>' . htmlspecialchars($r["maBenhNhan"]) . '</td>';
                echo '<td>' . htmlspecialchars($r["maCa"]) . '</td>';
                echo '<td>' . htmlspecialchars($r["maHoaDon"]) . '</td>';
                echo '<td>' . htmlspecialchars($r["maTiepTan"]) . '</td>';
                echo '<td>' . htmlspecialchars($r["NgayDangKy"]) . '</td>';
                echo '<td>' . htmlspecialchars($r["TrangThai"]) . '</td>';
                echo '<td>
                
                   <a href="index-staff.php?page-sub=lapphieukham&maPhieuDangKyKham=' . urlencode($r['maPhieuDangKyKham']) . '&maBenhNhan=' . urlencode($r['maBenhNhan']) . '" class="btn btn-primary">Lập Phiếu Khám</a>

                    <a href="index-staff.php?page-sub=xulynhap&maBenhNhan=' . urlencode($r['maBenhNhan']) . '" class="btn btn-secondary">Lập Hồ Sơ Nội Trú</a>
                </td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p class="text-center">Không có dữ liệu nào được tìm thấy.</p>';
        }
        ?>
    </div>
</div>

