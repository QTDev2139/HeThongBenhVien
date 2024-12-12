<script>
function printInvoice() {
    // Lấy nội dung của phần hóa đơn
    var printContents = document.getElementById("invoice-container").innerHTML;
    var originalContents = document.body.innerHTML;

    // Thay thế toàn bộ nội dung của trang bằng phần hóa đơn
    document.body.innerHTML = printContents;

    // Mở hộp thoại in
    window.print();

    // Sau khi in xong, phục hồi lại nội dung trang ban đầu
    document.body.innerHTML = originalContents;
}

function thanhToan(maHoaDon, rowId) {
    // Gửi yêu cầu AJAX tới server
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "xuly_thanhtoan.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Nhận phản hồi từ server
            const response = JSON.parse(xhr.responseText);

            if (response.success) {
                // Cập nhật trạng thái trên giao diện
                document.getElementById("trangthai-" + rowId).textContent = "Đã thanh toán";
                alert("Thanh toán thành công!");
            } else {
                alert("Thanh toán thất bại: " + response.message);
            }
        }
    };

    // Gửi dữ liệu
    xhr.send("maHoaDon=" + maHoaDon);
}
</script>

<h2 class="mb-4 text-center ">Danh sách hóa đơn</h2>
<!-- Bộ lọc -->
<div class="d-flex justify-content-center mb-3">
    <form action="index-staff.php" method="get" class="d-flex justify-content-center w-75">
        <input type="hidden" name="page-sub" value="danhsach">
        <input type="text" class="form-control w-50" placeholder="Tìm kiếm theo mã bệnh nhân" name="btnTukhoa">
        <input type="submit" class="btn btn-primary ms-2" value="Lọc" name="btnTimkiem">
    </form>
</div>

<!-- Bảng hóa đơn -->
<div class="d-flex justify-content-center">
    <div class="table-responsive w-75">
        <?php 
                include_once("controller/cHoaDon.php");

                $p= new cHoaDon();
                // if(isset($_REQUEST["btnTimkiem"])){
                //     $hd=$p->getHDByMaHD($_REQUEST["btnTukhoa"]);
                // }else 
                if(isset($_REQUEST["btnTimkiem"])) {
                    
                   $hd= $p->getHDByMaBN($_REQUEST["btnTukhoa"]); 
                } else {
                    $hd= $p->getHD();
                }
                
                if($hd){
                    echo ' <div class="table-responsive">';
                    echo '<table class="table table-striped table-hover text-center">';
                    echo '<thead class="table-dark">';
                    echo '<tr>
                            
                            <th>Mã hóa đơn</th>
                            <th>Mã bệnh nhân</th>
                            <th>Ngày lập</th>
                            <th>Tổng tiền</th>
                            <th>Trạng thái</th>
                            <th>Ngày thanh toán</th>
                            <th>Loại hóa đơn</th>
                            <th>Hành động</th>
                        </tr>';
                    echo '</thead>';

                while($r= mysqli_fetch_assoc($hd)){
                    echo '<tbody>';
                    echo '<tr>';
                    echo ' <td>'.$r["maHoaDon"].'</td>';
                    echo ' <td>'.$r["maBenhNhan"].'</td>';
                    echo ' <td>'.$r["NgayLap"].'</td>';
                    echo ' <td>'.$r["TongTien"].'</td>';
                    echo ' <td>'.$r["TrangThaiThanhToan"].'</td>';
                    echo ' <td>'.$r["NgayThanhToan"].'</td>';
                    echo ' <td>'.$r["LoaiHoaDon"].'</td>';
                    echo '<td>
    <form method="POST" action="">
    <input type="hidden" name="maHoaDon" value="'.$r["maHoaDon"].'">
    <input type="hidden" name="maBenhNhan" value="'.$r["maBenhNhan"].'"> <!-- Thêm trường ẩn -->
    <input type="submit" class="btn btn-success btn-sm" value="Thanh toán" name="thanhtoan">
    <button class="btn btn-secondary btn-sm" onclick="printInvoice()">In</button>
</form>
   
</td>
';
                    echo '  </tr>';
                    echo '</tbody>';

              
               
                }
                echo '  </table>';
                echo '  </div>';
                   
                }

                if (isset($_REQUEST["thanhtoan"])) {
                    $maHD = $_POST["maHoaDon"]; // Lấy mã hóa đơn từ form
                    $maBN = isset($_POST["maBenhNhan"]) ? $_POST["maBenhNhan"] : null; // Kiểm tra và lấy mã bệnh nhân
                    $trangthai = "Đã thanh toán"; // Đặt trạng thái là 'Đã thanh toán'
                    $ngaytt = date("Y-m-d H:i:s"); // Lấy thời gian hiện tại
                
                    // Gọi phương thức cập nhật
                    $result = $p->updateThanhToan($maHD, $maBN, $trangthai, $ngaytt);
                
                    // Cập nhật phiếu đăng kí khám
                    $resultSTT = $p->updateSTT($maHD);
                
                    // Kiểm tra kết quả và thông báo
                    if ($result) {
                        echo json_encode(["success" => true]);
                    } else {
                        echo json_encode(["success" => false, "message" => "Không thể cập nhật trạng thái"]);
                    }
                }
                
                
             ?>
    </div>
</div>
<!-- in hóa dd -->
<div id="invoice-container" style="display:none;">
    <?php
    include_once("controller/cHoaDon.php");
    $p = new cHoaDon();
    if (isset($_GET['maHoaDon'])) {
        $maHoaDon = $_GET['maHoaDon'];
        $hd = $p->getHDByMaHD($maHoaDon);  // Lấy thông tin hóa đơn từ cơ sở dữ liệu

        if ($hd) {
            $r = mysqli_fetch_assoc($hd);
            echo '<h2>Thông tin hóa đơn #' . $r['maHoaDon'] . '</h2>';
            echo '<table class="table table-bordered">';
            echo '<tr><th>Mã bệnh nhân</th><td>' . $r['maBenhNhan'] . '</td></tr>';
            echo '<tr><th>Ngày lập</th><td>' . $r['NgayLap'] . '</td></tr>';
            echo '<tr><th>Tổng tiền</th><td>' . number_format($r['TongTien'], 0, ',', '.') . ' VND</td></tr>';
            echo '<tr><th>Trạng thái thanh toán</th><td>' . $r['TrangThaiThanhToan'] . '</td></tr>';
            echo '<tr><th>Ngày thanh toán</th><td>' . $r['NgayThanhToan'] . '</td></tr>';
            echo '<tr><th>Loại hóa đơn</th><td>' . $r['LoaiHoaDon'] . '</td></tr>';
            echo '</table>';
        }
    }
    ?>
</div>