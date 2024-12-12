<?php 
include_once("controller/cPhieuDangKyKham.php");
$p= new cPhieuDangKyKham();
// Kiểm tra nếu có 'maBenhNhan' trong request, nếu không thì mặc định là null
$MaBN = isset($_REQUEST["maBenhNhan"]) ? $_REQUEST["maBenhNhan"] : null;

$tt=$p->getByMaBN($MaBN);
if($tt){
    while($r=mysqli_fetch_assoc($tt)){
        $tenBN=$r["HoTen"];
    }

}

//xử lí dữ liệu nhập 
if(isset($_REQUEST["btnLapHoSo"])){
    include_once("controller/cPhieuKham.php");
    $q= new cPhieKham();
    $hs=$q->themHS($MaBN,$_REQUEST["addBS"],$_REQUEST["addck"],$_REQUEST["addDD"],$_REQUEST["ngaynv"],$_REQUEST["trieuChung"],$_REQUEST["chuanDoan"]);
    if($hs){
        echo '<script>alert("Lâp hồ sơ bệnh án nội trú thanh cong")</script>';
    }else{
        echo '<script>alert("Lap that bai")</script>';
    }
}
?>
<div class="container">
    <h3 class="text-center text-primary mb-4">Lập Hồ Sơ Nội Trú</h3>
    <form action="" method="POST" class="p-4 border rounded bg-light" enctype="multipart/form-data">
        <!-- Row 1 -->
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="maBenhNhan" class="form-label">Mã Bệnh Nhân</label>
                <input type="text" name="maBenhNhan" id="maBenhNhan" class="form-control"
                    value="<?php if (isset($MaBN)) echo $MaBN; ?>" placeholder="Nhập mã bệnh nhân" readonly required>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label">Tên Bệnh Nhân</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="" placeholder="Nhập tên bệnh nhân">
            </div>
        </div>

        <!-- Row 2 -->


        <div class="row g-3 mb-3">
            <div class="col-md-3">
                <label for="ngaynv" class="form-label">Ngày nhập viện</label>
                <input type="date" name="ngaynv" id="ngaynv" class="form-control" placeholder="dd/mm/yyyy" required>
            </div>
            <div class="col-md-3">
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
            <div class="col-md-3">
                <label for="addDD" class="form-label">Điều dưỡng</label>
                <select name="addDD" id="addDD" class="form-select">
                    <?php 
                        include_once("controller/cPhieuKham.php");
                        $a = new cPhieKham();
                        $dd = $a->getDD();
                        if ($dd) {
                            while ($r = mysqli_fetch_assoc($dd)) {
                                echo "<option value=".$r["maDieuDuong"].">".$r['HoTen']."</option>";
                            }
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-3">
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
                <textarea name="trieuChung" id="trieuChung" class="form-control" rows="3" placeholder="Nhập triệu chứng"
                    required><?= $data['TrieuChung'] ?? '' ?></textarea>
            </div>
            <div class="col-md-6">
                <label for="chuanDoan" class="form-label">Chẩn Đoán</label>
                <textarea name="chuanDoan" id="chuanDoan" class="form-control" rows="3" placeholder="Nhập chẩn đoán"
                    required></textarea>
            </div>
        </div>

        <!-- Row 4 -->
        <div class="mb-3">
            <label for="ghiChu" class="form-label">Ghi Chú</label>
            <textarea name="ghiChu" id="ghiChu" class="form-control" rows="2"
                placeholder="Nhập ghi chú (nếu có)"></textarea>
        </div>

        <!-- Hidden Input for MaPhieuDangKyKham -->
        <input type="hidden" name="maPhieuDangKyKham" value="<?= htmlspecialchars($data['maPhieuDangKyKham']) ?>">

        <!-- Submit Button -->
        <button type="submit" name="btnLapHoSo" class="btn btn-primary w-100">Lập Hồ Sơ</button>
    </form>
</div>