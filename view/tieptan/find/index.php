<?php
// Bao gồm controller
include("controller/cBenhNhan.php");

// Kiểm tra nếu có từ khóa tìm kiếm
$searchKeyword = isset($_GET['searchKeyword']) ? $_GET['searchKeyword'] : '';

// Khởi tạo đối tượng controller
$cBenhNhan = new cBenhNhan();

// Gọi phương thức tìm kiếm với từ khóa nếu có
$benhNhanList = $cBenhNhan->searchBenhNhan($searchKeyword); 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm bệnh nhân</title>
    <link rel="stylesheet" href="css/tieptan.css">
</head>

<body>
    <div class="content">
        <h2>Kết quả tìm kiếm bệnh nhân</h2>

        <?php if ($benhNhanList) { ?>
            <div class="benhnhan-table-wrapper"> <!-- Bọc bảng trong div cuộn -->
                <table class="benhnhan-table">
                    <tr>
                        <th>Mã bệnh nhân</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Giới tính</th>
                        <th>Hành động</th> <!-- Cột hành động -->
                    </tr>
                    <?php foreach ($benhNhanList as $benhNhan) { ?>
                        <tr>
                            <td><?php echo $benhNhan['maBenhNhan']; ?></td>
                            <td><?php echo $benhNhan['HoTen']; ?></td>
                            <td><?php echo $benhNhan['ngaySinh']; ?></td>
                            <td><?php echo $benhNhan['gioiTinh']; ?></td>
                            <td>
                                <a href="edit.php?id=<?php echo $benhNhan['maBenhNhan']; ?>" class="btn-primary">Sửa</a>
                                <a href="delete.php?id=<?php echo $benhNhan['maBenhNhan']; ?>" class="btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        <?php } else { ?>
            <p>Không có dữ liệu bệnh nhân.</p>
        <?php } ?>
    </div>
</body>

</html>
