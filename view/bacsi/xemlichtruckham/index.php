<?php 
     include_once("controller/cThongtinNV.php");
    $p = new cThongtinNV();


    $info = $p->LayThongTinNV($_SESSION['dn'],$_SESSION['iduser']);
    while ($r = $info->fetch_assoc()) {
        $manv = $r["MaNV"];
    }
    include_once("controller/cXemLich.php");
    include_once("controller/cDateWeek.php");
    $dw = new cDateWeek();
    $p = new cXemLich();
    // if(isset($_REQUEST['loailichurl'])){
    //     $loaica= $_REQUEST['loailichurl'];
    // } 
    if(isset($_REQUEST['loailich'])){
        // header("Location:index-staff.php?page-sub=xemlichtruckham");
        $loaica= $_REQUEST['loailich'];
        
    } else {
        $loaica= 'All';
    }

    if(!isset($_SESSION['Ngayxem'])) {
        $_SESSION['Ngayxem'] =  date('Y-m-d');
    }
    if(isset($_REQUEST['btnxemngay'])) {
        $_SESSION['Ngayxem'] = $_REQUEST['chonngay'];
        // header(locatio)
    } else
    
    if(isset($_REQUEST['tuan'])) {
        $_SESSION['Ngayxem'] = date('Y-m-d');
    } else
    if(isset($_REQUEST['tuantruoc'])){
        $_SESSION['Ngayxem'] = date('Y-m-d', strtotime($_SESSION['Ngayxem'] . ' -7 day'));
    } else
    if(isset($_REQUEST['tuansau'])){
        $_SESSION['Ngayxem'] = date('Y-m-d', strtotime($_SESSION['Ngayxem'] . ' +7 day'));
    } else {
        $_SESSION['Ngayxem'] = date('Y-m-d');
                        }
?>

<div class="container">
    <div class="row px-1">
        <div class="title col-12 col-md-12 text-center">
            <div class="h2 my-4">Lịch trực khám trong tuần</div>
        </div>
        <div class="sub-nav text-center">
            <form  class="row" action="" method="post">
                <div class="calendar-type col-12 col-md-4 align-self-center my-1">
                    <div class="form-check-inline">
                        <button class="btn btn-outline-primary" name="loailich" value="All">Tất cả</button>
                    </div>
                    <div class="form-check-inline">
                        <button class="btn btn-outline-primary" name="loailich" value="Ca trực">Lịch trực</but>
                    </div>
                    <div class="form-check-inline">
                        <button class="btn btn-outline-primary" name="loailich" value="Ca khám">Lịch khám</button>
                    </div>
                    
                </div>
                <div class="select-date col-12 col-md-4 my-1  row" >
                    <div class="col-8">
                        <input  class="form-control" name="chonngay" type="date" value="<?php echo date("Y-m-d",strtotime($_SESSION['Ngayxem'])) ?>">
                    </div>
                    <div class="col-4">
                    <input class="btn btn-info" type="submit"  name="btnxemngay" id="" value="Tìm ngày">
                    </div>
                    
                </div>
                <div class="select-week col-12 col-md-4 my-1">
                    <input class="btn btn-primary" name="tuan" type="submit" value="Hiện tại">
                    <input class="btn btn-primary" name="tuantruoc" type="submit" value="< Tuần trước">
                    <input class="btn btn-primary" name="tuansau" type="submit" value="Tuần sau >">
                </div>
            </form>
            
        </div>
        <div class="main-schudele row my-4 table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <?php 
                        

                        $day =  $dw->Tuan($_SESSION['Ngayxem']);
                        $monday = $day['Monday'];
                        $sunday = $day['Sunday'];
                        $lich = $p ->LayThongTinLich($manv,$day['Monday'], $day['Sunday'], $loaica);
                        echo '<tr><th class="align-middle">Ca</th>';
                        for($i=1;$i<=6;$i++){
                            echo '<th>Thứ '.($i+1).'<br>'.date("d/m/Y",strtotime($monday)).'</th>';
                            $monday = date('Y-m-d', strtotime($monday . ' +1 day'));
                        }
                        echo '<th>Chủ Nhật<br>'.date("d/m/Y",strtotime($day['Sunday'])).'</th>';
                        echo '</tr>';
                    ?>
                    
                </thead>
                <tbody>
                    
                    <?php 
                        $ca=1;
                        $monday = $day['Monday'];
                        $sunday = $day['Sunday'];
                        echo '<tr><th class="align-middle">Sáng</th>';
                        $rows = [];  
                        while ($r = $lich->fetch_assoc()) {
                            $rows[] = $r;  
                        }
                        
                            
                        for($j=0;$j<=6;$j++){
                            $dk=0;
                            echo '<td>';
                            
                            for ($i=0;$i < count($rows);$i++) {
                                $r = $rows[$i];
                                if($r['ngayTruc'] == $monday) {
                                    if($r['ghiChu'] == "Sáng"){
                                        echo '<div class="card mx-auto" style="width: 12rem; background-color: greenyellow;">
                                                    <div class="card-body">
                                                        <h5 class="card-title"> Ca '.($ca++).'</h5>
                                                        <ul class="text-start" style="list-style: none; padding: 0;">
                                                            <li><b>Mã ca:</b> '.$r['maCa'].'</li>
                                                            <li><b>Loại ca:</b> '.$r['loaiCV'].'</li>
                                                            <li><b>Phòng:</b> '.$r['tenPhong'].'</li>
                                                            <li><b>Trạng thái:</b> '.$r['trangThai'].'</li>
                                                            <li><b>Giờ làm:</b> '.$r['khungGio'].'</li>
                                                        </ul>
                                                        <a href="index-staff.php?page-sub=doica&idca='.$r['maCa'].'" class="btn btn-success">Đổi ca</a>
                                                    </div>
                                                </div>';
                                        $dk=1;
                                    } else {
                                        echo '</td>';
                                    }
                                } 
                                    if($dk==1){
                                        echo '</td>';
                                    }
                                    
                                } 
                                $monday = date('Y-m-d', strtotime($monday . ' +1 day')); 
                        }
                        echo '</tr>';

                        $monday = $day['Monday'];
                        echo '<tr><th class="align-middle">Chiều</th>';
                        for($j=0;$j<=6;$j++){
                            $dk=0;
                            echo '<td>';
                            for ($i=0;$i < count($rows);$i++) {
                                $r = $rows[$i];
                                if($r['ngayTruc'] == $monday) {
                                    if($r['ghiChu'] == "Chiều"){
                                        echo '<div class="card mx-auto" style="width: 12rem; background-color: greenyellow;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Ca '.($ca++).'</h5>
                                                        <ul class="text-start" style="list-style: none; padding: 0;">
                                                            <li><b>Mã ca:</b> '.$r['maCa'].'</li>
                                                            <li><b>Loại ca:</b> '.$r['loaiCV'].'</li>
                                                            <li><b>Phòng:</b> '.$r['tenPhong'].'</li>
                                                            <li><b>Trạng thái:</b> '.$r['trangThai'].'</li>
                                                            <li><b>Giờ làm:</b> '.$r['khungGio'].'</li>
                                                        </ul>
                                                        <a href="index-staff.php?page-sub=doica&idca='.$r['maCa'].'" class="btn btn-success">Đổi ca</a>
                                                    </div>
                                                </div>';
                                        $dk=1;
                                    } else {
                                        echo '</td>';
                                    }
                                } 
                                if($dk==1){
                                    echo '</td>';
                                }
                                    
                            } 
                                $monday = date('Y-m-d', strtotime($monday . ' +1 day')); 
                        }
                        echo '</tr>';


                        $monday = $day['Monday'];
                        echo '<tr><th class="align-middle">Tối</th>';
                        for($j=0;$j<=6;$j++){
                            $dk=0;
                            echo '<td>';
                            for ($i=0;$i < count($rows);$i++) {
                                $r = $rows[$i];
                                if($r['ngayTruc'] == $monday) {
                                    if($r['ghiChu'] == "Tối"){
                                        echo '<div class="card mx-auto" style="width: 12rem; background-color: greenyellow;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Ca '.($ca++).'</h5>
                                                        <ul class="text-start" style="list-style: none; padding: 0;">
                                                            <li><b>Mã ca:</b> '.$r['maCa'].'</li>
                                                            <li><b>Loại ca:</b> '.$r['loaiCV'].'</li>
                                                            <li><b>Phòng:</b> '.$r['tenPhong'].'</li>
                                                            <li><b>Trạng thái:</b> '.$r['trangThai'].'</li>
                                                            <li><b>Giờ làm:</b> '.$r['khungGio'].'</li>
                                                        </ul>
                                                        <a href="index-staff.php?page-sub=doica&idca='.$r['maCa'].'" class="btn btn-success">Đổi ca</a>
                                                    </div>
                                                </div>';
                                        $dk=1;
                                    } else {
                                        echo '</td>';
                                    }
                                } 
                                if($dk==1){
                                    echo '</td>';
                                }
                                    
                            } 
                                $monday = date('Y-m-d', strtotime($monday . ' +1 day')); 
                        }
                        echo '</tr>';
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

