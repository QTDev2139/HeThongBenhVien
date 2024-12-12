<?php 
    include_once("connect.php");

    class mPhieuTheoDoi{
        public function insPhieuTheoDoi($sql) {
            $p = new clsConnect();
            $con = $p -> openConnect();
            return $con->query($sql);
            $p->closeConnect($con);

        }
    }

?>