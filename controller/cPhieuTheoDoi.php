<?php
    include("model/mPhieuTheoDoi.php");
    class cPhieuTheoDoi{
        public function addPhieuTheoDoi($mahs, $manv, $ha,$nt,$tdc,$ttsk,$ngn,$gc) {

            $sql = "INSERT INTO phieutheogioinoitru
                    (MaHSBANT,HuyetAp,NhipTim,ThuocDaCap, maNhanVien, TrangThaiSucKhoe, NgayGhiNhan, GhiChu) 
                    VALUES ($mahs,$ha, $nt, '$tdc',$manv,'$ttsk','$ngn','$gc');";
            $p = new mPhieuTheoDoi();
            return $p -> insPhieuTheoDoi($sql);
        }
        
    }
    
?>