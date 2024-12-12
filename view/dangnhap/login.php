<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .container-login {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control:focus {
            box-shadow: 0 0 5px rgba(255, 0, 0, 0.6);
            border-color: red;
        }
        .btn-login {
            background-color: red;
            color: white;
            border: none;
        }
        .btn-login:hover {
            background-color: darkred;
        }
        .forgot-password {
            text-align: right;
        }
        h2 {
            text-align: center;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container-login">
        <h2>Đăng Nhập</h2>
        <form id="login-form" onsubmit="handleLogin(event)" method="post" name="frmLogin"> 
            <div class="mb-3">
                <label for="username" class="form-label">Mã số hoặc số điện thoại <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="username" name="nameuser" placeholder="Nhập mã số hoặc số điện thoại" required>
                <div class="invalid-feedback">Vui lòng nhập tên đăng nhập</div>

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu" required>
                <div class="invalid-feedback">Vui lòng nhập mật khẩu</div>

            </div>
            <div class="mb-3 forgot-password">
                <a href="#" onclick="showForgotPasswordMessage()" class="text-decoration-none text-primary">Quên mật khẩu?</a>
            </div>
            <div class="d-grid">
                <button type="submit" class="btn btn-login" name="btnLogin">Đăng Nhập</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php

if (isset($_REQUEST["btnLogin"])) {
    include_once("controller/cNguoiDung.php");
    $p = new CNguoiDung();
    $nameuser = $_REQUEST["nameuser"];
    $password = $_REQUEST["password"];
    $ketqua = $p->getND($nameuser, $password);
}
?>