<?php 
    include_once("connect.php");

    class mXemLich {
        public function getXemLich($sql){
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