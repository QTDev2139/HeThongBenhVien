<?php
    include_once("connect.php");
    class mChuyenKhoa {
        public function selectChuyenKhoa() {
            $p = new clsConnect();
            $con = $p -> openConnect();
            if($con) {
                $str = "select * from chuyenkhoa";
                $tblSP = $con -> query($str);
                $p -> closeConnect($con);
                return $tblSP;
            } else {
                return false;
            }

        }
        
    }
?>