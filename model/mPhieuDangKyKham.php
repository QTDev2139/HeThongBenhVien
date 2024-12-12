<?php
    include_once("connect.php");
    class mPhieuDangKyKham {
        public function insPhieuDangKyKham($sql) {
            $p = new clsConnect();
            $con = $p -> openConnect();
            return $con->query($sql);

        }
        
        //truyvan dữ liệu từ phiếu đăng kí khám
        public function selectByMaBenhNhan($maBenhNhan) {
            $p = new clsConnect();
            $con = $p->openConnect();
            
            // Truy vấn dữ liệu từ bảng phieudangkykham
            $sql = "SELECT p.maBenhNhan, HoTen, p.maPhieuDangKyKham, p.NgayDangKy, pk.MaPK, t.MaToaThuoc
            FROM phieudangkykham AS p JOIN benhnhan AS b ON p.maBenhNhan = b.maBenhNhan 
            JOIN phieukham AS pk ON p.maPhieuDangKyKham = pk.maPhieuDangKyKham 
            JOIN toathuoc AS t ON t.maToaThuoc = pk.maToaThuoc WHERE p.maBenhNhan = $maBenhNhan LIMIT 1;";
            $kq= mysqli_query($con,$sql);
            $p->closeConnect($con);
            return $kq;
        }
    }
?>