<?php 
    include_once("controller/cBenhNhan.php");
    $c = new cBenhNhan();
    if(isset($_REQUEST["mahs"])){
        $_SESSION['mahsdt'] = $_REQUEST["mahs"];
        $hs = $c->layCTHSDTNT($_REQUEST["mahs"]);
        if($hs){
            while ($r = mysqli_fetch_assoc($hs)) {
                $mahs = $_REQUEST["mahs"];
                $ten  = $r['HoTen']; 
                $mabn = $r['maBenhNhan'];
                $chuandoan= $r['ChuanDoan'];
            }
        }
    }
   
    if(isset($_REQUEST['btnLapHoSo'])){
        include_once('controller/cPhieuTheoDoi.php');
        $manv = $_REQUEST['manv'];
        $mahs = $_REQUEST['mahs'];
        $ha = $_REQUEST['huyetap'];
        $nt = $_REQUEST['nhiptim'];
        $tdc = $_REQUEST['thuocdacap'];
        $ttsk= $_REQUEST['TTSK'];
        $ngn = $_REQUEST['ngayghinhan'];
        $gc = $_REQUEST['ghichu'];
        $ptd = new cPhieuTheoDoi();
        if($ptd->addPhieuTheoDoi($mahs,$manv,$ha,$nt,$tdc,$ttsk,$ngn,$gc)){
            echo '<script>alert("Ghi nhận thông tin thành công!")</script>';
            // header("Location:index-staff.php?page-sub=xemdanhsachdtnt");
        } else {
            echo '<script>alert("Ghi nhận thông tin thất bại!")</script>';
        }
       
    }
?>

<div class="container">
    <h3 class="text-center text-primary my-5">GHI NHẬN ĐIỀU TRỊ NỘI TRÚ</h3>

    <form action="" method="POST" class="p-4 border rounded bg-light shadow" enctype="multipart/form-data">
        <!-- Row 1 -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="maHoSo" class="form-label">Mã Hồ Sơ Điều Trị Nội Trú</label>
                <input type="text" name="maHoSo" id="maHoSo" class="form-control" 
                    value="<?php if (isset($mahs)) echo $mahs ?>"  readonly required placeholder="Nhập mã hồ sơ điều trị nội trú">
            </div>
            <div class="col-md-6">
                <label for="maBenhNhan" class="form-label">Mã Bệnh Nhân</label>
                <input type="text" name="maBenhNhan" id="maBenhNhan" class="form-control" 
                    value="<?php if (isset($mabn)) echo $mabn; ?>" placeholder="Nhập mã bệnh nhân" >
            </div>
        </div>

        <!-- Row 2 -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Tên Bệnh Nhân</label>
                <input type="text" name="name" id="name" class="form-control" 
                    value="<?php if (isset($ten)) echo $ten; ?>" placeholder="Nhập tên bệnh nhân">
            </div>
            <div class="col-md-6">
                <label for="addck" class="form-label">Chuẩn Đoán</label>
                <input type="text" name="chuandoan" id="chuandoan" class="form-control" 
                    value="<?php if (isset($chuandoan)) echo $chuandoan; ?>" readonly>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="nhimtim" class="form-label">Nhịp Tim</label>
                <input type="text" name="nhiptim"  class="form-control" placeholder="Nhập nhịp tim">
            </div>
            <div class="col-md-6">
                <label for="huyetap" class="form-label">Huyết Áp</label>
                <input type="text" name="huyetap"  class="form-control" placeholder="Nhập huyết áp">
            </div>
        </div>

        <!-- Row 3 -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="TTSK" class="form-label">Trạng Thái Sức Khoẻ</label>
                <textarea name="TTSK" class="form-control" rows="3" 
                    placeholder="Nhập trạng thái sức khoẻ" required></textarea>
            </div>
            <div class="col-md-6">
                <label for="ghichu" class="form-label">Ghi Chú</label>
                <textarea name="ghichu"  class="form-control" rows="3" 
                    placeholder="Nhập ghi chú (Nếu có)"></textarea>
            </div>
        </div>

         <!-- Row 3 -->
         <div class="row g-3 mb-3">
            <div class="col-md-12">
                <label for="thuocdacap" class="form-label">Thuốc Đã Cấp</label>
                <textarea name="thuocdacap" class="form-control" rows="3" 
                    placeholder="Nhập các thuốc đã cấp" required></textarea>
            </div>

        </div>

        <!-- Row 4 -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="ngayghinhan" class="form-label">Ngày Ghi Nhận</label>
                <input type="date" name="ngayghinhan" class="form-control" value="<?php echo date("Y-m-d")?>" readonly required>
            </div>
            <div class="col-md-6">
                <label for="manv" class="form-label">Mã Nhân Viên Ghi Nhận</label>
                <input type="text" name="manv"  class="form-control" 
                    value="<?php echo $_SESSION['idnv'] ?>" readonly>
            </div>
        </div>

        <button type="submit" name="btnLapHoSo" class="btn btn-primary w-100 py-2"> Ghi nhận
        </button>
    </form>
</div>
