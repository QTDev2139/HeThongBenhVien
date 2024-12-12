<?php
    class clsConnect
    {
        public function openConnect() {
            return mysqli_connect('localhost', 'root', '', 'quanlybenhvien');
        }
        public function closeConnect($con) {
            $con -> close();
        }
    }
?>
