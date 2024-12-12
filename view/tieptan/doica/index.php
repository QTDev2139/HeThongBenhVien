<div class="container">
    <form class="row" action="" method="post">
        <div class="title col-12 col-md-12 text-center">
            <div class="h2 my-4">Đổi ca trực khám</div>
        </div>
        <div class="sub-nav">


            <div class="shift-change col-12 col-md-12 mb-3 text-center">
                <select class="form-select w-50 mx-auto" name="shift-change" id="shift-change">
                    <option value="">Chọn mã ca</option>
                    <?php
                    include_once("controller/cThongtinNV.php");
                    $p = new cThongtinNV();
                    $info = $p->LayThongTinNV($_SESSION['dn'], $_SESSION['iduser']);
                    while ($r = $info->fetch_assoc()) {
                        $manv = $r["MaNV"];
                    }
                    include_once("controller/cXemLich.php");
                    $p = new cXemLich();
                    $dsca = $p->LayThongTinCa($manv);
                    if ($dsca !== -1 && $dsca !== 0) {
                        while ($row = $dsca->fetch_assoc()) {
                            if ($row['maCa'] == $_REQUEST['idca']) {
                                echo '<option value="' . $row['maCa'] . '" selected>Mã ca ' . $row['maCa'] . '</option>';
                            } else {
                                echo '<option value="' . $row['maCa'] . '" >Mã ca ' . $row['maCa'] . '</option>';
                            }
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="main-schudele row my-4">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Người trực, khám</th>
                        <th>Ngày</th>
                        <th>Khung giờ</th>
                        <th>Phòng</th>
                        <th>Loại ca</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $p = new cXemLich();
                    $dsca = $p->LayThongTinDoiCa($manv,$_SESSION['iduser']);
                    if ($dsca !== -1 && $dsca !== 0) {
                        $dem = 0;
                        while ($row = $dsca->fetch_assoc()) {
                            echo '<tr><td>' . ($dem++) . '</td>
                                <td>' . $row['Hoten'] . '</td>
                                <td>' . date("d/m/Y", strtotime($row['ngayTruc'])) . '</td>
                                <td>' . $row['khungGio'] . '</td>
                                <td>' . $row['tenPhong'] . '</td>
                                <td>' . $row['loaiCV'] . '</td>
                                <td>
                                    <button class="btn btn-primary mx-auto" type="button" name="btndoica" data-bs-toggle="modal" data-bs-target="#Modal'.($dem).'"  >Đổi ca</button>
                                    <div class="modal" tabindex="-1" id="Modal'.($dem).'" ">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Nhập lý do đổi ca</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <textarea name="lydo" class="form-control my-3" cols="3" rows="4"></textarea>
                                                    <button class="btn btn-primary" name="btnxn" type="submit" value="'.$row['maCa'].'">Xác nhận</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td></tr></form>';
                        }
                    }
                    if (isset($_REQUEST['btnxn'])) {
                        $madoi = $_REQUEST['shift-change'];
                        $mathaythe = $_REQUEST['btnxn'];
                        $lydo = $_REQUEST['lydo'];
                        include_once("controller/cPhieuXinDoiCa.php");
                        $dc = new cPhieuXinDoiCa();
                        $result = $dc->addPhieuDangKyKham($manv, $madoi,$mathaythe,$lydo);
                        if($result){
                            $dc->UpdateTTCa($madoi);
                            echo '<script>
                                    alert("Phiếu yêu cầu đổi lịch được thêm thành công!")
                                </script>';
                        } else {
                            echo '<script>
                                    alert("Phiếu yêu cầu đổi lịch được thêm thất bại!")
                                </script>';
                        }
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </form>
</div>



