<div class="container my-3">
    <h2 class="text-center my-4">Danh sách bệnh nhân điều trị nội trú</h2>
    <div class="d-flex justify-content-center mb-3">
        <form action="" method="POST" class="d-flex justify-content-center w-75">
            <input type="text" class="form-control w-50" placeholder="Tìm kiếm theo tên bệnh nhân" name="btnTukhoa">
            <input type="submit" class="btn btn-primary ms-2" value="Lọc" name="btnTimkiem">
        </form>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr class="text-center">
                <th>STT</th>
                <th>Mã bệnh nhân</th>
                <th>Tên bệnh nhân</th>
                <th>Ngày nhập viện</th>
                <th>Giới tính</th>
                <th>Phòng</th>
                <th>Giường</th>
                <th>Chức năng</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                include_once("controller/cBenhNhan.php");
                $c= new cBenhNhan();
                
                if(isset($_REQUEST["btnTimkiem"])){
                    $bn = $c->layHSNT($_REQUEST["btnTukhoa"]);
                }else {
                    $bn = $c->layHSNT();
                }    
                $dem=1;          
                while ($r = mysqli_fetch_assoc($bn)) {
                   
                    echo '<tr class="text-center">
                            <th >'.($dem++).'</th>
                            <td >' . $r["maBenhNhan"] . '</td>
                            <td>' . $r["HoTen"] . '</td>
                            <td>' . $r["NgayNhapVien"] . '</td>
                            <td>' . $r["gioiTinh"] . '</td>
                            <td>' . $r["tenPhong"] . '</td>
                            <td>' . $r["maGiuong"] . '</td>
                            <td >
                                <a href="index-staff.php?page-sub=chitiethsdtnt&mahs='.$r["maHSBANT"].'" class="btn btn-sm btn-primary">Xem chi tiết</a>
                            </td>
                        </tr>';
                }
            ?>
        </tbody>
    </table>
</div>