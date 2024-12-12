<form action="#" class="frm-prescription" method="POST">
    <h3 class="prescription-title h4 text-center text-info mt-4">DANH SÁCH ĐƠN THUỐC</h3>
    <div class="d-flex justify-content-center">
        <div class="input-group w-50 mt-4 mb-4 ">
            <input
                type="text"
                class="form-control"
                name="benhNhanInput"
                placeholder="Mã bệnh nhân..." />
            <button class="btn btn-primary input-group-text " name="searchBenhNhan" require>Tìm</button>
        </div>
    </div>
    <table class="table table-striped table-bordered">

        <?php
        include_once("model/mHoaDonThanhToan.php");
        $p = new mHoaDonThanhToan();
        if (isset($_REQUEST["searchBenhNhan"])) {
            $tblThuoc = $p->selectDonThuocByIDBenhNhan($_POST['benhNhanInput']);
            if ($tblThuoc == "error") {
                echo "ERROR";
            } else if (!$tblThuoc) {
                echo "0 result";
            } else {
                echo '<tr>
                    <th class="bg-primary text-white">Mã đơn thuốc</th>
                    <th class="bg-primary text-white">Chuyên khoa</th>
                    <th class="bg-primary text-white">Bác sĩ kê đơn</th>
                    <th class="bg-primary text-white">Ngày kê đơn</th>
                    <th class="bg-primary text-white">Trạng thái</th>
                    <th class="bg-primary text-white">Hành động</th>
                </tr>';
                while ($r = $tblThuoc->fetch_assoc()) {
                    echo '
                    <tr>
                        <td>' . $r['maToaThuoc'] . '</td>
                        <td>' . $r['tenChuyenKhoa'] . '</td>
                        <td>' . $r['Hoten'] . '</td>
                        <td>' . $r['ngayKeToa'] . '</td>
                        <td>' . $r['trangthai'] . '</td>';
                        if($r['trangthai']== "Đã thanh toán") {
                            echo'
                                <td><span class="text-secondary" >Thanh toán</span></td>';
                            
                        } else {
                            echo'
                                <td><a href="index-staff.php?page-sub=LapHoaDonThanhToan&toathuoc=' . $r['maToaThuoc'] . '" >Thanh toán</a></td>
                            </tr>';
                        }
                }
            }
        }
        ?>

    </table>
</form>