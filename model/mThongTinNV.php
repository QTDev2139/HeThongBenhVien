<?php 
    include_once("connect.php");

    class mThongtinNV {
        public function getThongTinNV($sql){
            $p = new clsConnect();
            $con = $p -> openConnect();
            if($con){
                $result = $con->query($sql);
                $p -> closeConnect($con);
                return $result;
            } else {
                return false;
            }   
            
        }
    }

?>