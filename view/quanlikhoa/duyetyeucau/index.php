
        <div class="content">
            <div class="title" style="text-align: center;
            font-size: 30px;
            padding-bottom: 20px;">Duyệt yêu cầu đổi lịch</div>
            <?php
            include_once("controller/cquanli.php");
            $p = new cSanpham();
            $tblSP = $p->getNVYCDL($_REQUEST['mp']);
            $r = $tblSP->fetch_assoc();
            $cacu = $r['maCaDoi'];
            $camoi = $r['maCaThay'];
            $maphieu = $_REQUEST['mp'];
            $tblSP2 = $p->getCACU($cacu);
            $r2 = $tblSP2->fetch_assoc();
            $tblSP3 = $p->getCAMOI($camoi);
            $r3 = $tblSP3->fetch_assoc();
            $date = $r2['ngayTruc'];
            $ngaycu = (new DateTime($date))->format('d/m/Y');
            $datenew = $r3['ngayTruc'];
            $ngaymoi = (new DateTime($datenew))->format('d/m/Y');
            if (isset($_REQUEST['tuchoi'])) {
                $trangthai = 'Từ Chối';
                $lydo = $_REQUEST['lydo'];
                $p->updateTUCHOI($trangthai, $lydo, $maphieu);
                echo '<script>alert("Cập nhật yêu cầu duyệt thành công")</script>';
                echo '<script>window.location.href = "index-staff.php?page-sub=duyetyeucau&mp='.$maphieu.'"</script>';
                //chỉ cập nhật trạng thái và lý do
            }
            if (isset($_REQUEST['dongy'])) {
                //cập nhật đồng ý
                //cập nhật trạng thái và đối mã nhân viên bên ca
                $trangthai = 'Đồng ý';
                $manhanvien = $r['maNhanVien'];
                $tblSP4 = $p->layMNVN($camoi);
                $r4 = $tblSP4->fetch_assoc();
                $mnvmoi = $r4['maNhanVien'];
                $p->upTRANGTH($maphieu);
                $p->upMNVCU($manhanvien, $camoi);
                $p->upMNVMOI($mnvmoi, $cacu);
                echo '<script>alert("Cập nhật yêu cầu duyệt thành công")</script>';
                echo '<script>window.location.href = "index-staff.php?page-sub=duyetyeucau&mp='.$maphieu.'"</script>';
            }
            ?>
            <table class="table table-success table-striped table-bordered border-primary table-hover">
                <form action="" method="post">
                    <tr>
                        <th>Nhân viên</th>
                        <th>Chức vụ</th>
                        <th>Lịch cũ</th>
                        <th>Lịch thay đổi</th>
                        <th>Trạng thái</th>
                        <th>Lý do</th>
                        <th ></th>
                        <th></th>
                    </tr>
                    <?php

                    echo '<tr>
                    <td>' . $r['Hoten'] . '</td>
                    <td>' . $r['Chucvu'] . '</td>
                    <td>Ngày: ' . $ngaycu . "<br>Giờ: " . $r2['khungGio'] . '</td>
                    <td>Ngày: ' . $ngaymoi . "<br>Giờ: " . $r3['khungGio'] . '</td>
                    <td>' . $r['trangThai'] . '</td>
                    <td>' . $r['lyDo'] . '</td>
                    <td><button type="submit" class="btn btn-primary" name="dongy">Duyệt</button>
                    </td>
                    <td>
                     <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@fat">Từ chối</button>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Lí do từ chối</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="message-text" class="col-form-label">Lý do:</label>
                                <textarea class="form-control" id="message-text" name="lydo"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button type="submit" class="btn btn-primary" name="tuchoi">Gửi</button>
                        </div>
                    
                </div>
            </div>
        </div>
                    </td>
                    </tr>';
                    ?>
                </form>
            </table>
        </div>