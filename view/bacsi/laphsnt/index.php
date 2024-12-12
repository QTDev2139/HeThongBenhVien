<h2 class="mb-4 text-center ">Danh sách bệnh nhân</h2>
<!-- Bộ lọc -->
<div class="d-flex justify-content-center mb-3">
    <form action="index-staff.php" method="get" class="d-flex justify-content-center w-75">
        <input type="hidden" name="page-sub" value="laphsnt">
        <input type="text" class="form-control w-50" placeholder="Tìm kiếm theo mã bệnh nhân" name="btnTukhoa">
        <input type="submit" class="btn btn-primary ms-2" value="Lọc" name="btnTimkiem">
    </form>
</div>
<?php 

//trường hợp bệnh nhân chưa khám, muốn lập hồ sơ nội trú,  đã có thông tin mã bệnh nhân

include_once("controller/cBenhNhan.php");
$c= new cBenhNhan();

if(isset($_REQUEST["btnTimkiem"])){
    $bn = $c->layBNByMaBN($_REQUEST["btnTukhoa"]);
}else {
    $bn = $c->layBN();
}

if($bn){
    echo '<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover table-sm table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Mã bệnh nhân</th>
                    <th>Họ tên</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>';
while ($r = mysqli_fetch_assoc($bn)) {
    echo '<tr>
            <td>' . $r["maBenhNhan"] . '</td>
            <td>' . $r["HoTen"] . '</td>
            <td>' . $r["ngaySinh"] . '</td>
            <td>' . $r["SoDienThoai"] . '</td>
            <td>
                <a href="index-staff.php?page-sub=xulynhap&maBenhNhan='.$r["maBenhNhan"].'" class="btn btn-sm btn-primary">Lập hồ sơ</a>
               
                
            </td>
        </tr>';
}
echo '      </tbody>
        </table>
    </div>
</div>';


}


?>