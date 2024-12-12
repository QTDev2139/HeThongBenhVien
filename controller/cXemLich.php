<?php 
    include_once('model/mXemLich.php');
    class cXemLich {
        public function LayThongTinLich($idnv, $monday, $sunday,$loaica=''){
            if(isset($loaica)){
                if($loaica=="All") {
                    $sql = "SELECT *
                    FROM catruckham c
                    JOIN nhanvien n ON c.maNhanVien = n.MaNV 
                    JOIN phong p ON c.maPhong = p.maPhong
                    WHERE c.maNhanVien = $idnv
                    AND c.ngayTruc BETWEEN '$monday' AND '$sunday'
                    ORDER BY c.ngayTruc ASC";
                } else {
                    $sql = "SELECT *
                    FROM catruckham c
                    JOIN nhanvien n ON c.maNhanVien = n.MaNV 
                    JOIN phong p ON c.maPhong = p.maPhong
                    WHERE c.maNhanVien = $idnv
                    AND c.ngayTruc BETWEEN '$monday' AND '$sunday'
                    AND loaiCV = '$loaica'
                    ORDER BY c.ngayTruc ASC";
                }
            } else {
                $sql = "SELECT *
                    FROM catruckham c
                    JOIN nhanvien n ON c.maNhanVien = n.MaNV 
                    JOIN phong p ON c.maPhong = p.maPhong
                    WHERE c.maNhanVien = $idnv
                    AND c.ngayTruc BETWEEN '$monday' AND '$sunday'
                    ORDER BY c.ngayTruc ASC";
            }
            $p = new mXemLich();
            $ketqua = $p -> getXemLich($sql);
            if(!$ketqua) {
                return false;
            } else {
                if($ketqua) {
                    return $ketqua;
                } else {
                    return 0;
                }
            }
        }

        public function LayThongTinDoiCa($idnv, $iduser){
            $sql = "SELECT *
                    FROM catruckham c
                    JOIN nhanvien n ON c.maNhanVien = n.MaNV 
                    JOIN phong p ON c.maPhong = p.maPhong 
                    JOIN user u ON u.iduser = n.iduser
                    WHERE c.maNhanVien != $idnv AND  u.iduser =$iduser
                    ORDER BY c.ngayTruc ASC";
            $p = new mXemLich();
            $ketqua = $p -> getXemLich($sql);
            if(!$ketqua) {
                return false;
            } else {
                if($ketqua) {
                    return $ketqua;
                } else {
                    return 0;
                }
            }
        }

        public function LayThongTinCa($idnv){
            $sql = "SELECT *
                    FROM catruckham c
                    JOIN nhanvien n ON c.maNhanVien = n.MaNV 
                    JOIN phong p ON c.maPhong = p.maPhong
                    WHERE c.maNhanVien = $idnv
                    ORDER BY c.ngayTruc ASC";
            $p = new mXemLich();
            $ketqua = $p -> getXemLich($sql);
            if(!$ketqua) {
                return false;
            } else {
                if($ketqua) {
                    return $ketqua;
                } else {
                    return 0;
                }
            }
        }

        public function LaySoCa($idnv, $loaica){
            $sql = "SELECT *
                    FROM catruckham c
                    JOIN nhanvien n ON c.maNhanVien = n.MaNV 
                    JOIN phong p ON c.maPhong = p.maPhong
                    WHERE c.maNhanVien = $idnv  AND loaiCV = '$loaica'
                    ORDER BY c.ngayTruc ASC";
            $p = new mXemLich();
            $ketqua = $p -> getXemLich($sql);
            if(!$ketqua) {
                return 0;
            } else {
                if($ketqua) {
                    $rows=[];
                    while ($r = $ketqua->fetch_assoc()) {
                        $rows[] = $r;  
                    }
                    return count($rows);
                } else {
                    return 0;
                }
            }
        }

    }

?>