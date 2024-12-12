<?php
    include_once("connect.php");
    class mUser {
        public function insUser($sql) {
            $p = new clsConnect();
            $con = $p -> openConnect();
            return $con->query($sql);

        }
        public function selUser($sql) {
            $p = new clsConnect();
            $con = $p -> openConnect();
            return $con->query($sql);

        }
        
    }
?>