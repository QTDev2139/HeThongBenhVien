<?php
    include("model/mPhieuXinDoiCa.php");
    class cPhieuXinDoiCa{
        public function addPhieuDangKyKham($manv, $maca, $macathaythe, $lydo) {

            $sql = "INSERT INTO phieuyeucaudoilich
                    (maCaDoi,maCaThay,lyDo, maNhanVien) 
                    VALUES ($maca, $macathaythe, '$lydo',$manv);";
            $p = new mPhieuXinDoiCa();
            return $p -> insPhieuXinDoiCa($sql);
        }

        public function UpdateTTCa($maca,) {
            $sql = "UPDATE  catruckham
                    SET trangThai = 'Chờ duyệt đổi ca'
                    WHERE maCA = $maca";
            $p = new mPhieuXinDoiCa();
            return $p -> insPhieuXinDoiCa($sql);
        }
        
    }
    
?>