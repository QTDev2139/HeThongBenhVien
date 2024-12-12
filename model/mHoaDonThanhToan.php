<?php
    include_once("connect.php");
    class mHoaDonThanhToan {
        
        public function selectDonThuocByIDBenhNhan($id) { 
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "select * from toathuoc h join bacsi bs ON h.maBacSi = bs.MaBacSi join chuyenkhoa ck ON bs.MaChuyenKhoa = ck.maChuyenKhoa join nhanvien nv ON bs.MaBacSi = nv.MaNV where maBenhNhan=$id";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }
        } 
        
        public function selectBenhNhanByIDToaThuoc($id) { 
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "SELECT tt.maBenhNhan, HoTen, diaChi, maBHYT FROM `toathuoc` tt JOIN benhnhan bn on bn.maBenhNhan=tt.maBenhNhan WHERE maToaThuoc=$id";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }
        } 
        public function selectToaThuocByIDToaThuoc($id) { 
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "SELECT *FROM `toathuoc` WHERE maToaThuoc=$id";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }
        } 

        public function selectThuocDieuTriByIDToaThuoc($id) { 
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "SELECT ct.maThuoc, tenThuoc, soLuongCapPhat, Gia, mucBHYT FROM `chitiettoathuoc` ct join thuoc t on ct.maThuoc = t.maThuoc join toathuoc tt on ct.maToaThuoc = tt.maToaThuoc JOIN benhnhan bn on bn.maBenhNhan = tt.maBenhNhan WHERE ct.maToaThuoc = $id";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }
        } 
        public function updateToaThuocByMaToa($id) { 
            $p = new clsConnect();
            $conn = $p -> openConnect();
            if($conn) {
                $str = "update toathuoc set trangthai = 'Đã thanh toán' where maToaThuoc = $id";
                $tblSP = $conn -> query($str);
                $p -> closeConnect($conn);
                return $tblSP;
            } else {
                return false; // Không thể connect đến CSDL
            }
        } 

    }
?>
