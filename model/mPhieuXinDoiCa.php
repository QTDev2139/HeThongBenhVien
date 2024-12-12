<?php 
    include_once("connect.php");

    class mPhieuXinDoiCa{
        public function insPhieuXinDoiCa($sql) {
            $p = new clsConnect();
            $con = $p -> openConnect();
            return $con->query($sql);
            $p->closeConnect($con);

        }
    }

?>