<?php
if (!isset($_SESSION['nameuser'])) {
    echo "<script>alert('Bạn cần đăng nhập để xem chi tiết hồ sơ!');</script>";
    header("refresh:0.5; url='login.php'");
    exit();
}

include_once("controller/cNguoiDung.php");

$p = new cNguoiDung();
$phone = $_SESSION['nameuser'];
$patientDetails = $p->getPatientDetails($phone);

if (!$patientDetails) {
    echo "<script>alert('Không tìm thấy hồ sơ bệnh nhân!');</script>";
    header("refresh:0.5; url='?page-sub=trangchu'");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết hồ sơ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #e6f7ff;
        }
        .profile-container {
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 800px;
        }
        h2 {
            color: #007bff;
            text-align: center;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
            color: #0056b3;
        }
        .form-control[readonly] {
            background-color: #f0f8ff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="profile-container">
            <h2>Chi tiết hồ sơ</h2>
            <form>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mã bệnh nhân:</label>
                        <input type="text" class="form-control" value="<?php echo $patientDetails['maBenhNhan']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Họ tên:</label>
                        <input type="text" class="form-control" value="<?php echo $patientDetails['HoTen']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Số điện thoại:</label>
                        <input type="text" class="form-control" value="<?php echo $patientDetails['SoDienThoai']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email:</label>
                        <input type="email" class="form-control" value="<?php echo $patientDetails['email']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Địa chỉ:</label>
                        <input type="text" class="form-control" value="<?php echo $patientDetails['diaChi']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ngày sinh:</label>
                        <input type="date" class="form-control" value="<?php echo $patientDetails['ngaySinh']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Giới tính:</label>
                        <input type="text" class="form-control" value="<?php echo $patientDetails['gioiTinh']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">CCCD:</label>
                        <input type="text" class="form-control" value="<?php echo $patientDetails['CCCD']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mã BHYT:</label>
                        <input type="text" class="form-control" value="<?php echo $patientDetails['maBHYT']; ?>" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Mức BHYT:</label>
                        <input type="text" class="form-control" value="<?php echo $patientDetails['mucBHYT']; ?>" readonly>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
