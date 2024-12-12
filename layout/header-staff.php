<?php
// error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bệnh viện Tương Lai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link rel="short icon" type="image/png" href="upload/image/homepage/logo-min.png">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
        .modal {
            z-index: 1150; 
            }
        .modal-backdrop {
             z-index: 1140;
        }
    </style>
</head>

<body>       
    <div class="container-fluid">
        <div class="header row ">
            <div class="logo col-md-9 col-12 my-3">
                <a  href="index-staff.php">
                    <img style="width: 14rem;"  src="upload/image/homepage/logo.jpg" alt="Logo" class="logo me-2">
                </a>
            </div>
            
            <!-- Nút "Đăng xuất" nằm bên phải -->
                <div class="nav-login col-md-3 col-12  align-self-center my-3 " style="z-index:1100;">
                    <?php
                        if (isset($_SESSION["dn"])) {
                            include("controller/cUser.php");
                            $obj = new cUser();
                            $nameuser = $_SESSION["nameuser"]; // Giả sử nameuser có trong session
                            
                            // Truy vấn lấy thông tin nhân viên
                            $sql = "SELECT *
                                    FROM nhanvien n
                                    JOIN user u ON n.iduser = u.iduser
                                    JOIN role r ON u.idrole = r.idrole
                                    WHERE u.nameuser = '$nameuser';";
                            

                            // Gọi hàm getUser từ controller
                            $tblSP = $obj->getUser($sql);
                            
                    if ($tblSP == -1) {
                        echo "<p>Lỗi khi truy vấn cơ sở dữ liệu.</p>";
                    } elseif ($tblSP == 0) {
                        echo "<p>Không có dữ liệu.</p>";
                    } else {
                        
                        // Nếu có dữ liệu, duyệt và hiển thị thông tin
                        while ($r = $tblSP->fetch_assoc()) {
                            $_SESSION["iduser"] =  $r["iduser"];
                            echo '<div class="dropdown d-flex align-items-center">
                        <a class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center shadow"
                        href="index.php?page=dangnhap"
                        style="width: 60px; height: 60px;" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user fa-lg"></i>
                        </a>
                        <div class="ms-2"> <!-- Thêm tên người dùng bên phải nút -->
                            <span>' . 'Chào ' . $r["Hoten"] . '</span>
                        </div>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index-staff.php?page-sub=trangchu">Hồ sơ</a></li>
                            <li><a class="dropdown-item" href="view/logout.php" onclick="return confirm(\'Bạn có chắc chắn muốn đăng xuất?\');">Đăng xuất</a></li>
                        </ul>
                    </div>';

                        }
                    }
                } else {
                    echo '<a class="px-3 py-3 border rounded-pill" href="index-staff.php?page=dangnhap" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">';
                    echo '<i class="fa-solid fa-user fa-2xl"> </i>';
                    echo '</a>';
                }
                ?>

                </div>
        </div>
        <div class="nav row sticky-top">
            <nav class="navbar col-12 navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">