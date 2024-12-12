<h2 class="text-center my-5">DANH SÁCH THUỐC</h2>
<div class="d-flex justify-content-center">
    
    <div class="table-responsive w-75 text-center">
        <?php 
                include_once("controller/cThuoc.php");

                $p = new cThuoc();
                   // Hiển thị nút filter
                   echo '<form method="POST" class="mb-3">';
                   echo '<button type="submit" name="filterBHYT" value="1" class="btn btn-primary">Hiển thị thuốc có BHYT</button>';
                   echo '</form>';
                   echo '<a href="index-staff.php?page-sub=xemdsthuoc" class="btn btn-secondary mb-3 ">Quay lại</a>';  // nut quay lại

                // Kiểm tra nút filter
                $filterBHYT = isset($_POST['filterBHYT']) && $_POST['filterBHYT'] == '1';
            
                if($filterBHYT){
                    $data = $p->selectthuoc();
                }else{
                    $data = $p-> getThuocwithBHYT(); 
                }

             
                // Hiển thị bảng dữ liệu
                if ($data) {
                    echo ' <div class="table-responsive">';
                    echo '<table class="table table-striped table-hover text-center">';
                    echo '<thead class="table-dark">';
                    echo '<tr>
                            <th>Mã Thuốc</th>
                            <th>Tên Thuốc</th>';
                    // Chỉ hiển thị cột "Phần Trăm BHYT" khi nhấn nút filter BHYT
                    if ($filterBHYT == 1) {
                        echo '<th>Loại Thuốc</th>';
                        echo '<th>Phần Trăm BHYT</th>';

                    } else {
                        echo '<th>Loại Thuốc</th>';
                       
                    }
                    echo '</tr>';
                    echo '</thead>';

                    // Hiển thị dữ liệu thuốc
                    while ($row = mysqli_fetch_assoc($data)) {
                        echo '<tr>';
                        echo '<td>' .$row['MaThuoc']. '</td>';
                        echo '<td>' .$row['TenThuoc']. '</td>';
                        if ($filterBHYT) {
                            echo '<td>' .$row['LoaiThuoc']. '</td>';
                            echo '<td>' .$row['PhanTramBHYT'].'%</td>';
                        } else {
                            echo '<td>' .$row['LoaiThuoc']. '</td>';
                            
                        }
                        echo '</tr>';
                    }
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo '<p>Không có dữ liệu thuốc.</p>';
                }
        ?>
    </div>
</div>