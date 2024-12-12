<?php 
include_once("controller/cPhieuKham.php");
$p= new cPhieKham();
$hs = $p->layHS();
if($hs){
    echo '<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                   <th scope="col">Mã HSBA</th>
                   <th scope="col">Mã BN</th>
                    <th scope="col">Tên bệnh nhân</th>
                   <th scope="col">Mã BS</th>
                   <th scope="col">Chuyên khoa</th>
                   <th scope="col">Mã phác đồ điều trị</th>
                   <th scope="col">Điều dưỡng</th>
                   <th scope="col">Triệu chứng</th>
                   <th scope="col">Chuẩn đoán</th>
                   <th scope="col">Ngày nhập viện</th>
                </tr>
            </thead>';

    while($r=mysqli_fetch_assoc($hs)){
        echo '<tbody>
                <tr>
                    <td>'.$r["maHSBANT"].'</td>
                    <td>'.$r["maBenhNhan"].'</td>
                    <td>'.$r["TenBN"].'</td>
                    <td>'.$r["maBacSi"].'</td>
                    <td>'.$r["tenChuyenKhoa"].'</td>
                    <td>'.$r["maPhacDoDieuTri"].'</td>
                    <td>'.$r["TenDD"].'</td>
                    <td>'.$r["TrieuChung"].'</td>
                    <td>'.$r["ChuanDoan"].'</td>
                    <td>'.$r["NgayNhapVien"].'</td>
                </tr>
            </tbody>';
    }

    echo '</table>
    </div>
</div>';
}
?>
