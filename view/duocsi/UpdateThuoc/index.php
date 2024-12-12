<?php
include_once("model/mThuoc.php");
$p = new mThuoc();
if (isset($_REQUEST['update'])) {
    $tblThuoc = $p->selectThuocByID($_REQUEST['update']);
}
while ($r = $tblThuoc->fetch_assoc()) {
?>
    <div class="medicine">
        <h3 class="text-center mt-3 mb-3">QUẢN LÝ THUỐC</h3>
        <form action="" class="update-medicine-frm" method="POST">
            <h4 class="update-title h5">Sửa Thông Tin Thuốc:</h4>

            <!-- Thông tin thuốc -->
            <div class="tbl-update">
                <!-- Thông tin thuốc -->
                <div class=" w-100">
                    <div class="w-100">
                        <div class="input-group d-flex mt-3 pe-3">
                            <label class="input-group-text" for="nameThuocID">Tên thuốc:</label>
                            <input type="text" name="nameThuoc" id="nameThuocID" class="form-control" value="<?php echo $r['tenThuoc']; ?>" required />
                        </div>
                        <div class="input-group d-flex mt-3 pe-3">
                            <label class="input-group-text" for="typeThuocID">Loại thuốc:</label>
                            <input type="text" name="typeThuoc" id="typeThuocID" class="form-control" value="<?php echo $r['LoaiThuoc']; ?>" required />
                        </div>
                        <div class="input-group d-flex mt-3 pe-3">
                            <label class="input-group-text" for="companyID">Hãng:</label>
                            <input type="text" name="company" id="companyID" class="form-control" value="<?php echo $r['Hang']; ?>" required />
                        </div>
                    </div>
                    <div class="w-100">
                        <div class="input-group d-flex mt-3 pe-3">
                            <label class="input-group-text" for="thanhPhanID">Thành phần:</label>
                            <input type="text" name="thanhPhan" id="thanhPhanID" class="form-control" value="<?php echo $r['ThanhPhan']; ?>" required />
                        </div>
                        <div class="input-group d-flex mt-3 pe-3">
                            <label class="input-group-text" for="priceID">Giá:</label>
                            <input type="text" name="price" id="priceID" class="form-control" value="<?php echo $r['Gia']; ?>" required />
                        </div>
                        <div class="input-group d-flex mt-3 pe-3">
                            <label class="input-group-text" for="quantityID">Số lượng tồn:</label>
                            <input type="text" name="quantity" id="quantityID" class="form-control" value="<?php echo $r['SoLuongTonKho']; ?>" required />
                        </div>
                    </div>
                </div>
                <div class="w-100 d-flex mt-3">
                    <input type="submit" name="AddThuoc" class="btn btn btn-info text-white mt-3 mb-3 ps-4 pe-4 me-3" value="Sửa">
                    <input type="reset" name="closeThuoc" class="btn btn btn-danger mt-3 mb-3 ps-4 pe-4" value="Hủy">
                </div>
            </div>

        </form>
    </div>

<?php }
if (isset($_REQUEST['AddThuoc'])) {
    $mathuoc = $_REQUEST['update'];
    $tenthuoc = $_POST["nameThuoc"];
    $typeThuoc = $_POST["typeThuoc"];
    $company = $_POST["company"];
    $thanhPhan = $_POST['thanhPhan'];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $tblThuoc = $p->updateThuoc($mathuoc, $tenthuoc, $typeThuoc, $company, $thanhPhan, $price, $quantity, $tblThuoc);
    if (!$tblThuoc) {
        echo '<script>alert("0 result");';
        echo 'window.location.href = "index-staff.php?page-sub=Quanlythuoc&page=' . $_SESSION["page"] . '";</script>';
    } else {
        echo '<script>alert("Update sản phẩm thành công");';
        echo 'window.location.href = "index-staff.php?page-sub=Quanlythuoc&page=' . $_SESSION["page"] . '";</script>';
    }
    if (isset($_REQUEST['closeThuoc'])) {
        echo $_REQUEST['closeThuoc'];
        header('location:index-staff.php?page-sub=Quanlythuoc&page=' . $_SESSION["page"]);
    }
}
?>