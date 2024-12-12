<!-- Lê Thành Đạt -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu Khám Bệnh</title>
    <!-- Thêm link Bootstrap từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
<div class="container mt-5">
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
                    pk.MaPK AS MaPhieuKham, 
                    pk.NgayTaiKham, 
                    pk.TrieuChung, 
                    pk.ChuanDoan, 
                    bn.HoTen AS BenhNhan, 
                    bn.ngaySinh, 
                    bn.gioiTinh, 
                    bn.SoDienThoai, 
                    bn.email, 
                    bn.maBHYT, 
                    bn.diaChi, 
                    bn.CCCD, 
                    ck.TenChuyenKhoa, 
                    ct.khungGio, 
                    nv.HoTen AS BacSi, 
                    nv.Email AS BacSiEmail, 
                    tt.maToaThuoc, 
                    GROUP_CONCAT(
                        CONCAT(
                            ttc.TenThuoc, ' (',ctt.soLuongCapPhat, ' ','), ', 
                            'Tần suất: ', ctt.tanSuat, ', ',
                            'Thời gian: ', ctt.thoiGianSuDung, ', ',
                            'Hướng dẫn: ', ctt.huongDanSuDung
                        ) SEPARATOR ' | '
                    ) AS ThuocChiTiet
                FROM 
                    phieukham pk
                JOIN 
                    benhnhan bn ON bn.maBenhNhan = pk.MaBenhNhan
                LEFT JOIN 
                    catruckham ct ON pk.MaCa = ct.maCa
                LEFT JOIN 
                    chuyenkhoa ck ON pk.MaChuyenKhoa = ck.maChuyenKhoa
                LEFT JOIN 
                    bacsi bs ON bs.MaBacSi = pk.MaBacSi
                LEFT JOIN 
                    nhanvien nv ON nv.MaNV = bs.MaBacSi
                LEFT JOIN 
                    toathuoc tt ON tt.maToaThuoc = pk.MaToaThuoc
                LEFT JOIN 
                    chitiettoathuoc ctt ON ctt.maToaThuoc = tt.maToaThuoc
                LEFT JOIN 
                    thuoc ttc ON ttc.maThuoc = ctt.maThuoc
                WHERE 
                    bn.SoDienThoai = $phone
                    AND pk.MaPK = $cate
                GROUP BY 
                    pk.MaPK;

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
                echo "<div class='col-md-6'><label for='BacSi' class='form-label'>Tên Bác Sĩ</label><input type='text' class='form-control' id='BacSi' value='". $r["BacSi"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='BacSiEmail' class='form-label'>Mail tư vấn</label><input type='text' class='form-control' id='BacSiEmail' value='". $r["BacSiEmail"] ."' readonly></div>";
                echo "</div>";
                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='ChuyenKhoa' class='form-label'>Chuyên Khoa</label><input type='text' class='form-control' id='ChuyenKhoa' value='". $r["TenChuyenKhoa"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='TrieuChung' class='form-label'>Triệu Chứng</label><input type='text' class='form-control' id='TrieuChung' value='". $r["TrieuChung"] ."' readonly></div>";
                echo "</div>";
                
                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='ChuanDoan' class='form-label'>Chuẩn Đoán</label><input type='text' class='form-control' id='ChuanDoan' value='". $r["ChuanDoan"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='NgayTaiKham' class='form-label'>Ngày Tái Khám</label><input type='text' class='form-control' id='NgayTaiKham' value='". $r["NgayTaiKham"] ."' readonly></div>";
                echo "</div>";
                
                // Thông tin toa thuốc
                echo"<div class='header_TT  mb-3'>";
                echo"<h5 style='color: blue;'>Thông Tin Thuốc</h5>";
                echo"</div>";
                
                
                echo "<div class='row mb-3'>";
                echo "<div class='col-md-12'><label for='ThuocChiTiet' class='form-label'>Cách dùng</label><textarea class='form-control' id='ThuocChiTiet' rows='4' readonly>". $r["ThuocChiTiet"] ."</textarea></div>";
                echo "</div>";
                
                // Ghi chú
               
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
</body>
</html>
