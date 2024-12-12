
<?php 
    include_once("controller/cThongtinNV.php");
    include_once("controller/cXemLich.php");
    $p = new cThongtinNV();
    $ltk = new cXemLich();
    $info = $p->LayThongTinNV($_SESSION['dn'],$_SESSION['iduser']);
    while ($r = $info->fetch_assoc()) {
        $ten = $r["Hoten"];
        $chuyenkhoa = $r["tenChuyenKhoa"];
        $manv = $r["MaNV"];
        $chucvu = $r["Chucvu"];
        $email = $r["Email"];
    }
    $_SESSION['idnv'] = $manv;
?>
<div class="main-content container">
    <div class="row">
        <div class="info col-md-7 col-11 px-3 m-3 border border-info rounded">
            <h2 class="text-center my-3">Thông tin nhân viên</h2>
            <div class="card mb-3 py-3 px-2" >
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="upload/image/homepage-staff/avatar-user.jpg" class="img-thumbnail rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-text"><b>Họ tên:</b> <?php echo $ten ?></p>
                            <p class="card-text"><b>Mã nhân viên:</b> <?php echo $manv ?></p>
                            <p class="card-text"><b>Chuyên khoa:</b> <?php 
                            if(isset($chuyenkhoa)){
                                echo $chuyenkhoa ;
                            } else {
                                echo "Không có";
                            }
                            ?></p>
                            <p class="card-text"><b>Chức vụ:</b> <?php echo $chucvu ?></p>
                            <p class="card-text"><b>Email:</b> <?php echo $email ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="calendar col-md-4 col-12 m-3 row">
            <div class="col-md-12 col-6">
                <div class="card border border-info rounded mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Lịch khám trong tuần</h5>
                        <div class="row my-2">
                            <div class="col-6">
                                <h2 class="card-subtitle mb-2 text-muted"><?php echo $ltk->LaySoCa($_SESSION['idnv'],"Ca khám")?></h2>
                            </div>
                            <div class="col-6">
                                <i class="fa-solid fa-calendar d-flex justify-content-end fa-2xl text-info"></i>
                            </div>
                        </div>
                        <a href="index-staff.php?page-sub=xemlichtruckham" class="card-link">Xem chi tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-6">
                <div class="card border border-info rounded ">
                    <div class="card-body">
                        <h5 class="card-title">Lịch trực trong tuần</h5>
                        <div class="row my-2">
                            <div class="col-6">
                                <h2 class="card-subtitle mb-2 text-muted"><?php echo $ltk->LaySoCa($_SESSION['idnv'],"Ca trực")?></h2>
                            </div>
                            <div class="col-6">
                                <i class="fa-regular fa-calendar d-flex justify-content-end fa-2xl text-info"></i>
                            </div>
                        </div>
                        <a href="index-staff.php?page-sub=xemlichtruckham" class="card-link">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

