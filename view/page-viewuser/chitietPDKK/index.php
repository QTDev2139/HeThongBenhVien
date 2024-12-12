
<div class="container my-5">
    <div class="header_TT text-center mb-4">
        <h3 style='color: red;'>Chi Tiết Phiếu Khám</h3>
    </div>
    
        
    
    
    <?php
    include("controller/cPhieuKham.php");

    if (!isset($_SESSION["nameuser"])) {
        die("Lỗi: Người dùng chưa đăng nhập.");
    }

    $obj = new cPhieKham();

    if (isset($_GET["page"])) {
        $phone = intval($_SESSION["nameuser"]); // Ép kiểu số
        $phone = str_pad($phone, strlen($phone) + 1, "0", STR_PAD_LEFT);
        $cate = $_GET['cate'];

        $sql = "SELECT 
                pd.maPhieuDangKyKham, 
                pd.NgayDangKy, 
                bn.HoTen AS BenhNhan, 
                bn.ngaySinh,
                bn.gioiTinh,
                bn.maBHYT,
                bn.diaChi,
                bn.CCCD,
                bn.SoDienThoai, 
                bn.email, 
                ck.tenChuyenKhoa, 
                ct.khungGio,
                ct.ngayTruc,
                nv.Hoten AS BacSi,
                nv.Email AS BacSiEmail 
            FROM 
                phieudangkykham pd
            JOIN 
                benhnhan bn ON bn.maBenhNhan = pd.maBenhNhan
            LEFT JOIN 
                catruckham ct ON pd.maCa = ct.maCa
            LEFT JOIN 
                chuyenkhoa ck ON ct.maChuyenKhoa = ck.maChuyenKhoa
            LEFT JOIN 
                nhanvien nv ON ct.maNhanVien = nv.MaNV
            WHERE 
                bn.SoDienThoai = $phone
                AND pd.maPhieuDangKyKham = $cate;

            ";

        $tblSP = $obj->getAllSP($sql);

        if ($tblSP == -1) {
            echo "<p>Lỗi khi truy vấn cơ sở dữ liệu.</p>";
        } elseif ($tblSP == 0) {
            echo "<p>Không có dữ liệu.</p>";
        } else {
            while ($r = $tblSP->fetch_assoc()) {
                echo '<form action="" method="post">';
                
                // Thông tin bệnh nhân
                echo"<div class='header_TT mb-3'>";
                echo"<h5 style='color: blue;'>Thông Tin Bệnh Nhân</h5>";
                echo"</div>";
                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='TenBenhNhan' class='form-label'>Tên Bệnh Nhân</label><input type='text' class='form-control' id='TenBenhNhan' value='". $r["BenhNhan"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='NgaySinh' class='form-label'>Ngày Sinh</label><input type='text' class='form-control' id='NgaySinh' value='". $r["ngaySinh"] ."' readonly></div>";
                echo "</div>";
                
                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='SDT' class='form-label'>SĐT</label><input type='text' class='form-control' id='SDT' value='". $r["SoDienThoai"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='GioiTinh' class='form-label'>Giới Tính</label><input type='text' class='form-control' id='GioiTinh' value='". $r["gioiTinh"] ."' readonly></div>";
                echo "</div>";

                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='Email' class='form-label'>Email</label><input type='text' class='form-control' id='Email' value='". $r["email"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='BHYT' class='form-label'>BHYT</label><input type='text' class='form-control' id='BHYT' value='". $r["maBHYT"] ."' readonly></div>";
                echo "</div>";

                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='DiaChi' class='form-label'>Địa Chỉ</label><input type='text' class='form-control' id='DiaChi' value='". $r["diaChi"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='CCCD' class='form-label'>CCCD</label><input type='text' class='form-control' id='CCCD' value='". $r["CCCD"] ."' readonly></div>";
                echo "</div>";
                
                // Thông tin khám
                echo"<div class='header_TT  mb-3'>";
                echo"<h5 style='color: blue;'>Thông Tin Khám</h5>";
                echo"</div>";
                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='BacSi' class='form-label'>Bác Sĩ</label><input type='text' class='form-control' id='ChuyenKhoa' value='". $r["BacSi"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='ChuyenKhoa' class='form-label'>Chuyên Khoa</label><input type='text' class='form-control' id='ChuyenKhoa' value='". $r["tenChuyenKhoa"] ."' readonly></div>";
                echo "</div>";
                
                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='NgayKham' class='form-label'>Khung Giờ</label><input type='text' class='form-control' id='khungGio' value='". $r["khungGio"] ." | ". $r["ngayTruc"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='NgayDangKy' class='form-label'>Ngày Đăng Ký</label><input type='text' class='form-control' id='NgayDangKy' value='". $r["NgayDangKy"] ."' readonly></div>";
                echo "</div>";
                
                
                echo'<div class="text-center mt-3">';

                echo "<a href='javascript:history.back()' class='btn btn-danger mt-3'>Quay lại</a>";
                echo'</div>';

                echo "</form>";
            }
        }
        }
    
    ?>
</div>

<!-- Thêm link Bootstrap từ CDN -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
