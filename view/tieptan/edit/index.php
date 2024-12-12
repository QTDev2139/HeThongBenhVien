<?php
// Kết nối với controller
include("controller/cBenhNhan.php");

// Kiểm tra xem có yêu cầu chỉnh sửa hay không
if (isset($_GET['id'])) {
    $maBenhNhan = $_GET['id'];
    $cBenhNhan = new cBenhNhan();
    $benhNhan = $cBenhNhan->getBNById($maBenhNhan);
}

// Hàm kiểm tra dữ liệu đầu vào
function validateInput($hoTen, $soDienThoai, $email, $cccd, $maBHYT) {
    // Kiểm tra họ tên (chỉ chứa chữ cái A-Z và a-z)
    if (!preg_match("/^[A-Za-z ]+$/", $hoTen)) {
        return "Họ tên chỉ được chứa ký tự A-Z và a-z!";
    }
    
    // Kiểm tra số điện thoại (chỉ chứa 10 chữ số)
    if (!preg_match("/^\d{10}$/", $soDienThoai)) {
        return "Số điện thoại phải gồm 10 chữ số!";
    }

    // Kiểm tra email (có đuôi @)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Email không hợp lệ!";
    }

    // Kiểm tra CCCD (phải có 12 số)
    if (!preg_match("/^\d{10}$/", $cccd)) {
        return "CCCD phải gồm 10 số!";
    }

    // Kiểm tra mã BHYT (2 chữ cái in hoa và 13 số)
    if (!preg_match("/^[A-Z]{2}\d{13}$/", $maBHYT)) {
        return "Mã BHYT phải có 2 ký tự in hoa và 13 số!";
    }

    return null; // Không có lỗi
}

// Nếu có dữ liệu POST, tiến hành cập nhật
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $maBenhNhan = $_POST['maBenhNhan'];
    $hoTen = $_POST['hoTen'];
    $soDienThoai = $_POST['soDienThoai'];
    $email = $_POST['email'];
    $diaChi = $_POST['diaChi'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $cccd = $_POST['cccd'];
    $maBHYT = $_POST['maBHYT'];
    $mucBHYT = $_POST['mucBHYT'];

    // Kiểm tra tính hợp lệ của dữ liệu đầu vào
    $error = validateInput($hoTen, $soDienThoai, $email, $cccd, $maBHYT);
    if ($error) {
        echo "<script>alert('$error');</script>";
    } else {
        // Cập nhật thông tin bệnh nhân
        $updateSuccess = $cBenhNhan->updateBN($maBenhNhan, $hoTen, $soDienThoai, $email, $diaChi, $ngaySinh, $gioiTinh, $cccd, $maBHYT, $mucBHYT);

        if ($updateSuccess) {
            echo "<script>
                    alert('Cập nhật thành công!');
                    window.location.href = '?page-sub=quanlyhoso';
                  </script>";
        } else {
            echo '<p>Cập nhật không thành công!</p>';
        }

        // Cập nhật lại thông tin bệnh nhân
        $benhNhan = $cBenhNhan->getBNById($maBenhNhan);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa thông tin bệnh nhân</title>
    <!-- Thêm CDN Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJxnF4f3l3pZqjJ6t1NoEJh3aJr8+rZgNc6twHmjj5I4t8f9UQJq1Gfa0Rgz" crossorigin="anonymous">
    <!-- Thêm CSS tùy chỉnh -->
    <style>
        body {
            background-color: #f0f8ff; /* Màu nền sáng xanh da trời */
        }
        h1 {
            color: #1E90FF; /* Màu xanh da trời cho tiêu đề */
        }
        .btn-custom {
            background-color: #1E90FF; /* Nút màu xanh da trời */
            color: white;
        }
        .btn-custom:hover {
            background-color: #4682B4; /* Màu tối hơn khi hover */
        }
        .form-label {
            color: #1E90FF; /* Màu xanh da trời cho nhãn */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h1 class="text-center mb-4">Chỉnh sửa thông tin bệnh nhân</h1>
    <form method="post" action="">
        <input type="hidden" name="maBenhNhan" value="<?php echo $benhNhan['maBenhNhan']; ?>">
        <div class="row mb-3">
            <label for="hoTen" class="col-sm-2 col-form-label">Họ tên:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="hoTen" id="hoTen" value="<?php echo $benhNhan['HoTen']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="soDienThoai" class="col-sm-2 col-form-label">Số điện thoại:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="soDienThoai" id="soDienThoai" value="<?php echo $benhNhan['SoDienThoai']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" id="email" value="<?php echo $benhNhan['email']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="diaChi" class="col-sm-2 col-form-label">Địa chỉ:</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="diaChi" id="diaChi"><?php echo $benhNhan['diaChi']; ?></textarea>
            </div>
        </div>
        <div class="row mb-3">
            <label for="ngaySinh" class="col-sm-2 col-form-label">Ngày sinh:</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="ngaySinh" id="ngaySinh" value="<?php echo $benhNhan['ngaySinh']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="gioiTinh" class="col-sm-2 col-form-label">Giới tính:</label>
            <div class="col-sm-10">
                <select class="form-select" name="gioiTinh" id="gioiTinh">
                    <option value="Nam" <?php echo $benhNhan['gioiTinh'] == 'Nam' ? 'selected' : ''; ?>>Nam</option>
                    <option value="Nữ" <?php echo $benhNhan['gioiTinh'] == 'Nữ' ? 'selected' : ''; ?>>Nữ</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <label for="cccd" class="col-sm-2 col-form-label">CCCD:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="cccd" id="cccd" value="<?php echo $benhNhan['CCCD']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="maBHYT" class="col-sm-2 col-form-label">Mã BHYT:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="maBHYT" id="maBHYT" value="<?php echo $benhNhan['maBHYT']; ?>">
            </div>
        </div>
        <div class="row mb-3">
            <label for="mucBHYT" class="col-sm-2 col-form-label">Mức BHYT:</label>
            <div class="col-sm-10">
                <select class="form-select" name="mucBHYT" id="mucBHYT">
                    <option value="0.5" <?php echo $benhNhan['mucBHYT'] == '0.5' ? 'selected' : ''; ?>>0.5</option>
                    <option value="0.8" <?php echo $benhNhan['mucBHYT'] == '0.8' ? 'selected' : ''; ?>>0.8</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-10 offset-sm-2 text-end">
                <button type="submit" class="btn btn-success">Cập nhật</button>
            </div>
        </div>
    </form>
</div>

<!-- Thêm CDN Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-k+PWu9Cq+uCmfu3XbgjxodlGpq5Ow0tiTfOwqOZti7l2U9Tf5uAK/8IMUgRf2WgK" crossorigin="anonymous"></script>

</body>
</html>
