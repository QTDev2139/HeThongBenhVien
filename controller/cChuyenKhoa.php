<?php
    include("model/mChuyenKhoa.php");
    class cChuyenKhoa{
        public function getChuyenKhoa() {
            $p = new mChuyenKhoa();
            $tblSP = $p -> selectChuyenKhoa();
            if(!$tblSP) {
                return -1;
            } else {
                if($tblSP -> num_rows > 0) {
                    return $tblSP;
                } else {
                    return 0; // Không có dòng dữ liệu
                }
            }
        }
        
    }
    
?>