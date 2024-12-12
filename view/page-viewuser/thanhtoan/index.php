<!-- Lê Thành Đạt -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    <div class="header_TT text-center mb-4">
        <h3 style='color: red;'>Chi Tiết Thông Tin Khám</h3>
    </div>

<?php
include("controller/cHoaDon.php");

    $obj = new cHoaDon();
    include("controller/cPhieuDangKyKham.php");

    $obj1 = new cPhieuDangKyKham();

    if (isset($_GET["page"])) {
        $maBN = intval($_GET["cate"]);
        $maCa = intval($_GET["cate1"]);
        $sdt = intval($_GET["cate2"]);

        $sql = "SELECT * FROM hoaDon WHERE maBenhNhan = '$maBN';";
        $tblSP = $obj->getAllHD($sql);

        if ($tblSP == -1) {
            echo "<p>Lỗi khi truy vấn cơ sở dữ liệu.</p>";
        } elseif ($tblSP == 0) {
            echo "<p>Không có dữ liệu.</p>";
        } else {
            while ($r = $tblSP->fetch_assoc()) {
                echo '<form action="" method="post">';
                // Thông tin bệnh nhân
                echo "<div class='header_TT mb-3'>";
                echo "<h5 style='color: blue;'>Thông Tin Hóa Đơn Đăng Ký Khám</h5>";
                echo "</div>";
                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='maHoaDon' class='form-label'>Mã Hóa Đơn</label><input type='text' class='form-control' name='maHoaDon' id='maHoaDon' value='". $r["maHoaDon"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='maBenhNhan' class='form-label'>Mã Bệnh Nhân</label><input type='text' class='form-control' id='maBenhNhan' value='". $r["maBenhNhan"] ."' readonly></div>";
                echo "</div>";

                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='NgayLap' class='form-label'>Ngày Lập</label><input type='text' class='form-control' id='NgayLap' value='". $r["NgayLap"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='TongTien' class='form-label'>Tổng Tiền</label><input type='text' class='form-control' id='TongTien' value='". $r["TongTien"] ."' readonly></div>";
                echo "</div>";

                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='TrangThaiThanhToan' class='form-label'>Trạng Thái Thanh Toán</label><input type='text' class='form-control' id='TrangThaiThanhToan' value='". $r["TrangThaiThanhToan"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='NgayThanhToan' class='form-label'>Ngày Thanh Toán</label><input type='text' class='form-control' id='NgayThanhToan' value='". $r["NgayThanhToan"] ."' readonly></div>";
                echo "</div>";

                echo "<div class='row mb-3'>";
                echo "<div class='col-md-6'><label for='LoaiHoaDon' class='form-label'>Loại Hóa Đơn</label><input type='text' class='form-control' id='LoaiHoaDon' value='". $r["LoaiHoaDon"] ."' readonly></div>";
                echo "<div class='col-md-6'><label for='sdt' class='form-label'>Tài Khoản</label><input type='text' class='form-control' id='sdt' value='0$sdt | Mật khẩu: 123456' readonly></div>";
                echo "</div>";

                

                echo '<div class="text-center my-3 d-flex justify-content-center">';
                echo "<a href='javascript:history.back()' class='btn btn-danger mt-3' style='margin-right: 100px;'>Quay lại</a>";
                
                // Nút thanh toán
                echo '<button type="submit" name="redirect" class="btn btn-success mt-3">Thanh Toán</button>';
                echo '</div>';
                echo "</form>";
                
       
                // Nếu người dùng nhấn nút "Thanh Toán", sẽ chuyển hướng đến trang VNPAY
                if (isset($_POST["redirect"])) {
                    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    
                    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
                    $vnp_Returnurl = "http://localhost:80/HeThongBenhVien/index.php";
                    $vnp_TmnCode = "Q8DV3GWS"; // Mã website tại VNPAY
                    $vnp_HashSecret = "LP2HMVVZUHB3M1HOCAKB1TR0KCBSKA8B"; // Chuỗi bí mật
                    
                    $vnp_TxnRef = rand(1000,9999); // Mã đơn hàng
                    $vnp_OrderInfo = 'Thanh toán hóa đơn khám bệnh';
                    $vnp_OrderType = 'bill';
                    $vnp_Amount = $r["TongTien"] * 10; // Số tiền (tính bằng đồng)
                    $vnp_Locale = 'Vn';
                    $vnp_BankCode = 'NCB'; // Mã ngân hàng
                    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
                    
                    $inputData = array(
                        "vnp_Version" => "2.1.0",
                        "vnp_TmnCode" => $vnp_TmnCode,
                        "vnp_Amount" => $vnp_Amount,
                        "vnp_Command" => "pay",
                        "vnp_CreateDate" => date('YmdHis'),
                        "vnp_CurrCode" => "VND",
                        "vnp_IpAddr" => $vnp_IpAddr,
                        "vnp_Locale" => $vnp_Locale,
                        "vnp_OrderInfo" => $vnp_OrderInfo,
                        "vnp_OrderType" => $vnp_OrderType,
                        "vnp_ReturnUrl" => $vnp_Returnurl,
                        "vnp_TxnRef" => $vnp_TxnRef,
                    );
                    
                    ksort($inputData);
                    $query = "";
                    $i = 0;
                    $hashdata = "";
                    foreach ($inputData as $key => $value) {
                        if ($i == 1) {
                            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                        } else {
                            $hashdata .= urlencode($key) . "=" . urlencode($value);
                            $i = 1;
                        }
                        $query .= urlencode($key) . "=" . urlencode($value) . '&';
                    }
                    
                    $vnp_Url = $vnp_Url . "?" . $query;
                    $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);
                    $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
                    
                    // Redirect đến VNPAY
                    $sql1 = "INSERT INTO phieudangkykham (maBenhNhan, maCa, maHoaDon, maTiepTan, NgayDangKy, TrangThai) 
                        VALUES ('" . $r["maBenhNhan"] . "', '" . $maCa . "', '" . $r["maHoaDon"] . "', NULL, CURDATE(), 'Đã Thanh Toán')";
                    echo $sql1;
                    $obj1->addPhieuDangKyKham($sql1);
                    header('Location: ' . $vnp_Url);
                    exit();
                }
            }
        }
    }
?>

</body>
</html>
