<?php



//cách xử lí khác
include_once("controller/cPhieuDangKyKham.php");
$p= new cPhieuDangKyKham();
// if(isset($_REQUEST["maBenhNhan"])){
    
//     $MaBN= $_REQUEST["maBenhNhan"];
$MaBN= $_REQUEST["maBenhNhan"];
$maPDKK=$_REQUEST["maPhieuDangKyKham"];
$tt=$p->getByMaBN($MaBN);
if($tt){
    while($r= mysqli_fetch_assoc($tt)){
        
        $tenBN=$r["HoTen"];
        $maPDKK=$r["maPhieuDangKyKham"];
        $matoathuoc=$r["MaToaThuoc"];
        // $maCK=$r["MaChuyenKhoa"];
        // $trieuchung=$r["TrieuChung"];
        // $chuandoan=$r["ChuanDoan"];
        // $ghichu=$r["GhiChu"];
        // $ngaytk=$r["NgayTaiKham"];
        // $maca=$r["maCa"];
        // echo $r["HoTen"];
    }
}

//xử lí nhập dữ liệu
if(isset($_REQUEST["btnLapHoSo"])){
    include_once("controller/cPhieuKham.php");
    $a= new cPhieKham();
    
    $kq= $a->addPK($maPDKK,$MaBN,$_REQUEST["addBS"],$_REQUEST["maToaThuoc"],$_REQUEST["addCa"],$_REQUEST["addck"],$_REQUEST["trieuChung"],$_REQUEST["chuanDoan"],$_REQUEST["ghiChu"],$_REQUEST["ngayTaiKham"]);
    if($kq){
        echo '<script>alert("Lâp phieu kham thanh cong")</script>';
    }else{
        echo '<script>alert("Lap phieu that bai")</script>';
    }
}


?>

<div class="container">
    <h3 class="text-center text-primary mb-4">Lập Phiếu Khám</h3>

    <form action="" method="POST" class="p-4 border rounded bg-light shadow" enctype="multipart/form-data">
        <!-- Row 1 -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="maBenhNhan" class="form-label">Mã Bệnh Nhân</label>
                <input type="text" name="maBenhNhan" id="maBenhNhan" class="form-control" 
                    value="<?php if (isset($MaBN)) echo $MaBN; ?>" placeholder="Nhập mã bệnh nhân" readonly required>
            </div>
            <div class="col-md-6">
                <label for="maToaThuoc" class="form-label">Mã Toa Thuốc</label>
                <input type="text" name="maToaThuoc" id="maToaThuoc" class="form-control" 
                    value="<?php if (isset($matoathuoc)) echo $matoathuoc; ?>" placeholder="Nhập mã toa thuốc" >
            </div>
        </div>

        <!-- Row 2 -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Tên Bệnh Nhân</label>
                <input type="text" name="name" id="name" class="form-control" 
                    value="<?php if (isset($tenBN)) echo $tenBN; ?>" placeholder="Nhập tên bệnh nhân">
            </div>
            <div class="col-md-6">
                <label for="addck" class="form-label">Chuyên Khoa</label>
                <select name="addck" id="addck" class="form-select">
                    <?php 
                        include_once("controller/cChuyenKhoa.php");
                        $b = new cChuyenKhoa();
                        $ck = $b->getChuyenKhoa();
                        if ($ck) {
                            while ($r = mysqli_fetch_assoc($ck)) {
                                echo "<option value=".$r["maChuyenKhoa"].">".$r["tenChuyenKhoa"]."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
        </div>

        <!-- Row 3 -->
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <label for="trieuChung" class="form-label">Triệu Chứng</label>
                <textarea name="trieuChung" id="trieuChung" class="form-control" rows="3" 
                    placeholder="Nhập triệu chứng" required><?= $data['TrieuChung'] ?? '' ?></textarea>
            </div>
            <div class="col-md-6">
                <label for="chuanDoan" class="form-label">Chẩn Đoán</label>
                <textarea name="chuanDoan" id="chuanDoan" class="form-control" rows="3" 
                    placeholder="Nhập chẩn đoán" required></textarea>
            </div>
        </div>

        <!-- Row 4 -->
        <div class="row g-3 mb-3">
            <div class="col-md-4">
                <label for="ngayTaiKham" class="form-label">Ngày Tái Khám</label>
                <input type="date" name="ngayTaiKham" id="ngayTaiKham" class="form-control" placeholder="dd/mm/yyyy" required>
            </div>
            <div class="col-md-4">
                <label for="addBS" class="form-label">Bác Sĩ</label>
                <select name="addBS" id="addBS" class="form-select">
                    <?php 
                        include_once("controller/cBacSi.php");
                        $a = new cBacsi();
                        $bs = $a->getBS();
                        if ($bs) {
                            while ($r = mysqli_fetch_assoc($bs)) {
                                echo "<option value=".$r["MaBacSi"].">".$r['MaBacSi']."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="addCa" class="form-label">Mã Ca</label>
                <select name="addCa" id="addCa" class="form-select">
                    <?php 
                        include_once("controller/cPhieuKham.php");
                        $c = new cPhieKham();
                        $cc = $c->getCa();
                        if ($cc) {
                            while ($r = mysqli_fetch_assoc($cc)) {
                                echo "<option value=".$r["maCa"].">".$r['maCa']."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
        </div>

        <!-- Row 5 -->
        <div class="mb-3">
            <label for="ghiChu" class="form-label">Ghi Chú</label>
            <textarea name="ghiChu" id="ghiChu" class="form-control" rows="3" placeholder="Nhập ghi chú (nếu có)"></textarea>
        </div>

      

        <!-- Submit Button -->
        <input type="hidden" name="maPhieuDangKyKham" value="<?php  echo $_REQUEST["maPhieuDangKyKham"]?>">

        <button type="submit" name="btnLapHoSo" class="btn btn-primary w-100 py-2">
            <i class="bi bi-file-earmark-text"></i> Lập Hồ Sơ
        </button>
    </form>
</div>
