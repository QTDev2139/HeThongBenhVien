<?php
    include_once("connect.php");
    class mBacSi {
        public function selectBacSi() {
            $p = new clsConnect();
            $con = $p -> openConnect();
            if($con) {
                $str = "select * from bacsi ";
                $tblSP = $con -> query($str);
                $p -> closeConnect($con);
                return $tblSP;
            } else {
                return false;
            }

        }
        
    }
?>