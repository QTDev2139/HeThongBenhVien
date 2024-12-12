<div class="medicine">
    <h3 class="text-center mt-3 mb-3">QUẢN LÝ KHO THUỐC</h3>
    <form action="" class="update-medicine-frm " method="POST">
        <h4 class="update-title h5">Thêm thuốc mới:</h4>
        <!-- Thông tin thuốc -->
        <div class="d-flex w-100">
            <div class="w-50">
                <div class="input-group d-flex mt-3 pe-3">
                    <label class="input-group-text" for="nameThuocID">Tên thuốc:</label>
                    <input type="text" name="nameThuoc" id="nameThuocID" class="form-control" required />
                </div>
                <div class="input-group d-flex mt-3 pe-3">
                    <label class="input-group-text" for="typeThuocID">Loại thuốc:</label>
                    <input type="text" name="typeThuoc" id="typeThuocID" class="form-control" required />
                </div>
                <div class="input-group d-flex mt-3 pe-3">
                    <label class="input-group-text" for="companyID">Hãng:</label>
                    <input type="text" name="company" id="companyID" class="form-control" required />
                </div>
            </div>
            <div class="w-50">
                <div class="input-group d-flex mt-3 pe-3">
                    <label class="input-group-text" for="thanhPhanID">Thành phần:</label>
                    <input type="text" name="thanhPhan" id="thanhPhanID" class="form-control" required />
                </div>
                <div class="input-group d-flex mt-3 pe-3">
                    <label class="input-group-text" for="priceID">Giá:</label>
                    <input type="text" name="price" id="priceID" class="form-control" required />
                </div>
                <div class="input-group d-flex mt-3 pe-3">
                    <label class="input-group-text" for="quantityID">Số lượng tồn:</label>
                    <input type="text" name="quantity" id="quantityID" class="form-control" required />
                </div>
            </div>
        </div>
        <div class="w-100 d-flex">
            <input type="submit" name="AddSP" class="btn btn-outline-dark mt-3 mb-3 ps-4 pe-4" value="Thêm">
        </div>
    </form>
    <?php
    include_once("model/mThuoc.php");
    $p = new mThuoc();
    if (isset($_POST["AddSP"])) {
        $tenthuoc = $_POST["nameThuoc"];
        $typeThuoc = $_POST["typeThuoc"];
        $company = $_POST["company"];
        $thanhPhan = $_POST['thanhPhan'];
        $price = $_POST["price"];
        $quantity = $_POST["quantity"];
        if ($price > 0 && $quantity > 0) {
            $tblCty = $p->insertThuoc($tenthuoc, $typeThuoc, $company, $thanhPhan, $price, $quantity);
            if (!$tblCty) {
                echo "0 result";
            } else {
                echo '<script>alert("Thêm sản phẩm thành công");</script>';
            }
        } else
            echo "<script>alert('Thêmm thất bại')</script>";
    }

    ?>
    <form action="" class="medicine-frm" method="POST">
        <div class="search d-flex align-content-center">
            <div class="input-group mt-3 mb-3 d-flex me-3" style="width: 400px;">
                <input type="text" placeholder="Tìm kiếm..." name="searchInput" class="form-control" style="width: 200px;" />
                <button type="submit" name="submitSearchInput" value="Tim" class="btn btn-info text-white  me-2 input-group-text">Tìm</button>
            </div>
            
        </div>

        <?php
        include_once("model/mThuoc.php");

        $p = new mThuoc();
        $rowsPerPage = 30;

        // Lấy số trang hiện tại từ URL (mặc định là 1)
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

        // Tính toán offset (chỉ số bắt đầu của dữ liệu)
        $offset = ($page - 1) * $rowsPerPage;

        // Lấy dữ liệu phân trang
        // $tblThuoc = $p->selectThuocByName($_POST['searchInput']);
        if (isset($_REQUEST['submitSearchInput'])) {
            $tblThuoc = $p->selectThuocByName($_POST['searchInput']);
        } else {
            $tblThuoc = $p->selectThuocPagination($offset, $rowsPerPage);
        }

        // Lấy tổng số dòng để tính tổng số trang
        $totalRows = $p->countThuoc();
        $totalPages = ceil($totalRows / $rowsPerPage);

        // Hiển thị dữ liệu
        if ($tblThuoc == "error") {
            echo "ERROR";
        } else if (!$tblThuoc) {
            echo "0 result";
        } else {
            echo '<table class="table table-striped table-bordered">';
            echo '<thead class="text-center">
                        <tr>
                            <th class="bg-primary text-white">ID</th>
                            <th class="bg-primary text-white">Tên Thuốc</th>
                            <th class="bg-primary text-white">Loại Thuốc</th>
                            <th class="bg-primary text-white">Hãng</th>
                            <th class="bg-primary text-white">Giá</th>
                            <th class="bg-primary text-white">Số Lượng Tồn Kho</th>
                            <th class="bg-primary text-white">Hành Động</th>
                        </tr>
                      </thead>';
            echo '<tbody>';
            
            if ($_GET['page']) {
                $numpage = $_GET['page'];
            } else {
                $numpage = 1;
            }
            while ($r = $tblThuoc->fetch_assoc()) {
                
                echo '<tr>
                        <td class="text-center">' . $r['maThuoc'] . '</td>
                        <td>' . $r['tenThuoc'] . '</td>
                        <td>' . $r['LoaiThuoc'] . '</td>
                        <td>' . $r['Hang'] . '</td>
                        <td class="text-center">' . number_format($r['Gia'], 0, ',', '.') . ' đ</td>
                        <td class="text-center">' . $r['SoLuongTonKho'] . '</td>
                        <td class="text-center"><a href="index-staff.php?page-sub=Quanlythuoc&page='.$numpage .'&delete='. $r['maThuoc'] .'" onclick="return confirm(\'Bạn có chắc muốn xóa Khoa này không ?\')">Xóa</a> | <a href="index-staff.php?page-sub=UpdateThuoc&update=' . $r['maThuoc'] . '">Sửa</a></td>
                    </tr>';
            }
            echo '</tbody>';
            echo '</table>';
        }

        // Hiển thị phân trang
        echo '<ul class="pagination mt-5 d-flex justify-content-center">';
        if (isset($_REQUEST['submitSearchInput'])) {
            echo '<li class="page-item ' . ((isset($_GET['page']) && $_GET['page'] == 1) ? 'active' : '') . '"><a class="page-link" href="?page-sub=Quanlythuoc&page=1" >1</a></li>';
        } else {
            if ($page > 1) {
                echo '<li class="page-item"><a class="page-link" href="?page-sub=Quanlythuoc&page=' . ($page - 1) . '">Previous</a></li>';
            }
            for ($i = 1; $i <= $totalPages; $i++) {
                $active = $i == $page ? 'class="active"' : '';
                echo '<li class="page-item ' . ((isset($_GET['page']) && $_GET['page'] == $i) ? 'active' : '') . '"><a class="page-link" href="?page-sub=Quanlythuoc&page=' . $i . '" ' . $active . '>' . $i . '</a></li>';
            }
            if ($page < $totalPages) {
                echo '<li class="page-item"><a class="page-link" href="?page-sub=Quanlythuoc&page=' . ($page + 1) . '">Next</a></li>';
            }
        }
        echo '</ul>';

        $_SESSION["page"] =  $numpage;
        if (isset($_REQUEST["delete"])) {
            include("view/duocsi/DeleteThuoc/index.php");
        } 
        ?>
    </form>
</div>