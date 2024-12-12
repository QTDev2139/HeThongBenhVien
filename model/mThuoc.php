<?php
    include_once("connect.php");
    class mThuoc {
        public function selectThuoc() {
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "select * from thuoc";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }

        } 

        public function selectThuocByName($name) { 
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "select * from thuoc where tenThuoc like N'$name%'";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }

        } 
        public function selectThuocByID($id) { 
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "select * from thuoc where maThuoc=$id";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }

        } 
        public function insertThuoc($tenThuoc, $loaiThuoc, $hang, $thanhPhan, $gia, $soLuongTonKho) {
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "insert into thuoc(tenThuoc, LoaiThuoc, Hang, ThanhPhan, Gia, SoLuongTonKho) values('$tenThuoc', '$loaiThuoc', '$hang', '$thanhPhan', $gia, $soLuongTonKho)";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }

        } 
        public function updateThuoc($maThuoc, $tenThuoc, $loaiThuoc, $hang, $thanhPhan, $gia, $soLuongTonKho) {
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "update thuoc set tenThuoc='$tenThuoc', LoaiThuoc='$loaiThuoc', Hang='$hang', ThanhPhan='$thanhPhan', Gia=$gia, SoLuongTonKho=$soLuongTonKho where maThuoc = $maThuoc";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }

        } 
        public function deleteThuoc($masp) {
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "delete from thuoc where maThuoc = '$masp'";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }

        } 

        function selectThuocPagination($offset, $limit) {
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if (!$conn) {
                return "error";
            }
            $sql = "SELECT * FROM thuoc LIMIT $offset, $limit";
            $result = $conn->query($sql);
            $conn->close();
            return $result;
        }

        function selectThuocPaginationByName($name, $offset, $limit) {
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if (!$conn) {
                return "error";
            }
            $sql = "SELECT * FROM thuoc WHERE tenThuoc LIKE '$name%' LIMIT $offset, $limit";
            $result = $conn->query($sql);
            $conn->close();
            return $result;
        }
        
        public function countThuoc() {
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if (!$conn) {
                return "error";
            }
            $sql = "SELECT COUNT(*) as total FROM thuoc";
            $result = $conn->query($sql);
            $conn->close();
            return $result->fetch_assoc()['total'];
        }

        public function selectthuocbh(){
            $p= new clsConnect();
            $con = $p->openConnect();
            $query = "SELECT MaThuoc, TenThuoc,LoaiThuoc, PhanTramBHYT FROM thuoc";
            $ketqua = mysqli_query($con,$query);
            $p->closeConnect($con);
            return $ketqua;
        }
        // Lấy thuốc có BHYT (Phần Trăm BHYT > 0.00)
        public function getThuocBHYT() {
            $p = new clsConnect();
            $con = $p -> openConnect();
            $query = "SELECT MaThuoc, TenThuoc,LoaiThuoc, PhanTramBHYT FROM thuoc WHERE PhanTramBHYT > 0.00";
            $ketqua = mysqli_query($con,$query);
            $p->closeConnect($con);
            return $ketqua;
        }
    }
?>
