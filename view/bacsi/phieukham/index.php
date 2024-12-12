<?php 
include_once("controller/cPhieuKham.php");
$p= new cPhieKham();
$pk = $p->layPK();
if($pk){
    echo '<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                   <th scope="col">Mã PK</th>
                   <th scope="col">Mã PDKK</th>
                   <th scope="col">Mã BN</th>
                   <th scope="col">Mã BS</th>
                   <th scope="col">Mã toa thuốc</th>
                   <th scope="col">Mã ca</th>
                   <th scope="col">Mã chuyên khoa</th>
                   <th scope="col">Triệu chứng</th>
                   <th scope="col">Chuẩn đoán</th>
                   <th scope="col">Ngày tái khám</th>
                </tr>
            </thead>';

    while($r=mysqli_fetch_assoc($pk)){
        echo '<tbody>
                <tr>
                    <td>'.$r["MaPK"].'</td>
                    <td>'.$r["maPhieuDangKyKham"].'</td>
                    <td>'.$r["MaBenhNhan"].'</td>
                    <td>'.$r["MaBacSi"].'</td>
                    <td>'.$r["MaToaThuoc"].'</td>
                    <td>'.$r["MaCa"].'</td>
                    <td>'.$r["MaChuyenKhoa"].'</td>
                    <td>'.$r["TrieuChung"].'</td>
                    <td>'.$r["ChuanDoan"].'</td>
                    <td>'.$r["NgayTaiKham"].'</td>
                </tr>
            </tbody>';
    }

    echo '</table>
    </div>
</div>';
}
?>
