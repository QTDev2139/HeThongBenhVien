
<div class="container my-5">
    <div class="header_TT text-center mb-4">
        <h3>PHIẾU ĐĂNG KÝ KHÁM BỆNH</h3>
    </div>
    <?php
include("controller/cPhieuKham.php");

if (!isset($_SESSION["nameuser"])) {
    die("Lỗi: Người dùng chưa đăng nhập.");
}

$obj = new cPhieKham();

if (isset($_GET["page"] )) {
    $phone = intval($_SESSION["nameuser"]); // Ép kiểu số
    $phone = str_pad($phone, strlen($phone) + 1, "0", STR_PAD_LEFT);

    $sql = "SELECT pd.maPhieuDangKyKham, bn.*, ck.tenChuyenKhoa, ct.khungGio 
            FROM phieudangkykham pd 
            JOIN benhnhan bn ON bn.maBenhNhan = pd.maBenhNhan 
            JOIN catruckham ct ON pd.maCa = ct.maCa 
            JOIN chuyenkhoa ck ON ct.maChuyenKhoa = ck.maChuyenKhoa 
            WHERE bn.SoDienThoai = '$phone';
            ";
    // echo "$sql";
    $tblSP = $obj->getAllSP($sql);

    if ($tblSP == -1) {
        echo "<p>Lỗi khi truy vấn cơ sở dữ liệu.</p>";
    } elseif ($tblSP == 0) {
        echo "<p>Không có dữ liệu.</p>";
    } else {
         // Tổng số bản ghi
         $totalRecords = $tblSP->num_rows;
         // Số hàng trên mỗi trang
         $rowsPerPage = 10;
         // Tổng số trang
         $totalPages = ceil($totalRecords / $rowsPerPage);
         // Trang hiện tại
         $currentPage = isset($_GET['page']) ? intval($_GET['page']) : 1;
         $currentPage = max(1, min($currentPage, $totalPages));
         // Xác định offset
         $offset = ($currentPage - 1) * $rowsPerPage;
 
         
 
        echo '<form action="" method="post">';
        echo "<table class='table table-bordered'>";
        echo "<thead class='table-light text-center'>";
        echo "<tr><th>STT</th><th>Tên phiếu</th><th>Chi tiết</th></tr>";
        echo "</thead>";
        echo "<tbody>";
        $dem = $offset; // Bắt đầu từ số hàng hiện tại

        while ($r = $tblSP->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='text-align: center;'>".(++$dem)."</td>";
            echo "<td style='text-align: left;'>".'Mã Phiếu: '.$r["maPhieuDangKyKham"].'  |  '.'ChuyenKhoa: '.$r["tenChuyenKhoa"].'  |  '.'Ngày Khám: '.$r["khungGio"]."</td>";
            echo "<td style='text-align: center;'><a  href='?page=chitietPDKK&cate=".$r['maPhieuDangKyKham']."'>Xem</a></td>";
            echo "</tr>";
        }
        echo "</tbody></table></form>";
        // Hiển thị nút chuyển trang
        echo "<nav aria-label='Page navigation'>";
        echo "<ul class='pagination justify-content-center'>";
        for ($i = 1; $i <= $totalPages; $i++) {
            $active = ($i == $currentPage) ? "active" : "";
            echo "<li class='page-item $active'><a class='page-link' href='?page=phieudangkykham&page1=$i'>$i</a></li>";
        }
        echo "</ul>";
        echo "</nav>";
        echo'<div class="text-center mt-3">';
            echo "<a href='javascript:history.back()' class='btn btn-danger mt-3'>Quay lại</a>";
        echo'</div>';
    }
}
?>
</div>

<!-- Thêm link Bootstrap từ CDN
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->

