
</head>

<body>
    <div class="container-fluid">
        <div class="header row my-1">
            <div class="logo col-md-3 col-sm-3">
                <a href="index.php?page=trangchu"><img class="w-100" src="upload/image/homepage/logo.jpg" alt="Logo"></a>
            </div>
            <div class="nav-top col-md-9 col-sm-9 row">
                <div class="nav-search col-md-6 col-sm-12 px-1 align-self-center my-3">
                    <form class="row" action="" method="post">
                        <div class="col-9">
                            <input class="form-control rounded-pill border border-dark" type="text"
                                placeholder="Nhập tên bác sĩ">
                        </div>
                        <div class="col-3">
                            <input class="btn btn-outline-primary rounded-pill" type="submit" value="Tìm kiếm">
                        </div>
                    </form>
                </div>
                <div class="nav-contact col-md-4 px-1 align-self-center my-3">
                    <a href="index.php?page=dangky" class="btn btn-primary rounded-pill">ĐĂNG KÝ KHÁM</a>
                    <button class="btn btn-danger rounded-pill">TƯ VẤN: 1800 0000</button>
                </div>
                <div class="col-md-1"></div>
                <div class="nav-login col-md-1  align-self-center my-3 ">
                    
                            <?php 
                                if(isset($_SESSION["dn"])){
                                    echo'<div class="dropdown" style="z-index:1500;">
                                        <a class="btn btn-primary rounded-circle d-flex align-items-center justify-content-center shadow"
                                            href="index.php?page=dangnhap"
                                            style="width: 60px; height: 60px;" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="fa-solid fa-user fa-lg"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="index.php?page=xemphieu">Hồ Sơ</a></li>
                                            <li><a class="dropdown-item" href="view/logout.php" onclick="return confirm(\'Bạn có muốn đăng xuất?\');">Đăng xuất</a></li>
                                        </ul>
                                        </div>';
                                } else {
                                    echo'<a class="px-3 py-3 border rounded-pill" href="index.php?page=dangnhap" class="nav-item nav-link" data-bs-toggle="modal" data-bs-target="#loginModal">';
                                    echo'<i class="fa-solid fa-user fa-2xl"> </i>';
                                    echo'</a> ' ;                             }
                            ?>
                </div>

            </div>
        </div>
        <div class="nav-main sticky-top">
            <nav class="navbar navbar-expand-lg bg-body-tertiary py-4 h5">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="index.php?page=trangchu">Trang chủ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=gioithieu">Giới thiệu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=chuyenkhoa">Chuyên khoa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=bacsi">Bác sĩ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=lienhe">Liên hệ</a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="content">