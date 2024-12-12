<?php
    include_once("model/mThuoc.php");
    class cThuoc {
        public function getThuoc() {
            $p = new mThuoc();
            $tblSP = $p -> selectThuoc();
            if(!$tblSP) {
                return "error";
            } else {
                if($tblSP) {
                    return $tblSP;
                } else {
                    return 0; // Không có dòng dữ liệu
                }
            }
        }

        public function selectthuoc() {
            $p = new mThuoc();
            $dst = $p->selectthuocbh();
            if (mysqli_num_rows($dst) > 0) {
                return $dst;
            } else {
                return false;
            }
        }
        public function getThuocwithBHYT() {
            $p = new mThuoc();
            $dst=$p->getThuocBHYT();
                if(mysqli_num_rows($dst)>0){
                    return $dst;
                }else {
                    return false;
                }
            }
    }
    
?>