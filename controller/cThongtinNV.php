<?php 
    include_once('model/mThongTinNV.php');
    class cThongtinNV {
        public function LayThongTinNV($role, $iduser){
            if($role == 2){
                $sql = "SELECT *
                                    FROM nhanvien n
                                    JOIN user u ON n.iduser = u.iduser
                                    JOIN role r ON u.idrole = r.idrole
                                    JOIN bacsi b ON b.MaBacSi = n.MaNV
                                    JOIN chuyenkhoa c ON c.maChuyenKhoa = b.MaChuyenKhoa
                                    WHERE u.iduser = $iduser;";
            } else if($role == 3) {
                $sql = "SELECT *
                                    FROM nhanvien n
                                    JOIN user u ON n.iduser = u.iduser
                                    JOIN role r ON u.idrole = r.idrole
                                    JOIN dieuduong d ON d.maDieuDuong = n.MaNV
                                    JOIN chuyenkhoa c ON c.maChuyenKhoa = d.maChuyenKhoa
                                    WHERE u.iduser = $iduser;";
            } else {
                $sql = "SELECT *
                                    FROM nhanvien n
                                    JOIN user u ON n.iduser = u.iduser
                                    JOIN role r ON u.idrole = r.idrole
                                    WHERE u.iduser = $iduser;";
            }
            $p = new mThongtinNV();
            $tblSP = $p -> getThongTinNV($sql);
            if(!$tblSP) {
                return false;
            } else {
                if($tblSP) {
                    return $tblSP;
                } else {
                    return 0; // Không có dòng dữ liệu
                }
            }
        }
    }

?>