<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách bệnh nhân</title>
    <link rel="stylesheet" href="css/tieptan.css">
    <style>
        /* Loại bỏ gạch chân cho tất cả các thẻ a */
        a {
            text-decoration: none;
        }

        /* Có thể thêm kiểu dáng cho liên kết nếu cần */
        a.btn-primary {
            color: #007bff;
            font-weight: bold;
        }

        a.btn-primary:hover {
            color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="content">
        <h2>Danh sách bệnh nhân</h2>

        <!-- Thanh tìm kiếm -->
        <form id="searchForm" action="" method="get">
            <input type="text" name="txtsearch" placeholder="Tìm kiếm mã bệnh nhân..." value="<?php echo isset($_GET['searchKeyword']) ? $_GET['searchKeyword'] : ''; ?>" />
            <button type="submit" name="btnSearch">Tìm kiếm</button>
        </form>

        <?php
        include("controller/cBenhNhan.php");

        $cBenhNhan = new cBenhNhan();
        
        $benhNhanList = $cBenhNhan->searchBenhNhan(); // Gọi phương thức tìm kiếm

        
        

        if ($benhNhanList) {
            echo "<div class='benhnhan-table-wrapper'>"; // Bọc bảng trong div cuộn
            echo "<table class='benhnhan-table'>";
            echo "<tr>
                    <th>Mã bệnh nhân</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Giới tính</th>
                    <th>Hành động</th>
                  </tr>";

            foreach ($benhNhanList as $benhNhan) {
                // Tạo liên kết đến trang chi tiết hồ sơ
                echo "<tr>
                        <td><a href='?page-sub=xemhoso&id={$benhNhan['maBenhNhan']}'>{$benhNhan['maBenhNhan']}</a></td>
                        <td>{$benhNhan['HoTen']}</td>
                        <td>{$benhNhan['ngaySinh']}</td>
                        <td>{$benhNhan['gioiTinh']}</td>
                        <td>
                            <a href='?page-sub=edit&id={$benhNhan['maBenhNhan']}' class='btn-primary'>Sửa</a>
                            <a href='?page-sub=delete&id={$benhNhan['maBenhNhan']}' class='btn-danger' onclick='return confirm(\"Bạn có chắc chắn muốn xóa?\")'>Xóa</a>
                        </td>
                      </tr>";
            }
            echo "</table>";
            echo "</div>";
        } else {
            echo "<p>Không có dữ liệu bệnh nhân.</p>";
        }
        ?>
    </div>
</body>

</html>
