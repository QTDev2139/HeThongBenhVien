<?php
include_once("connect.php");
class mSanpham
{
    public function SelectALLND()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "select * from nhanvien";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function SelectALLPHONG()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "select * from phong";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function SelectALLBACS()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT nv.Hoten,nv.MaNV
                FROM nhanvien nv
                JOIN bacsi bs ON nv.MaNV = bs.MaBacSi;";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function SelectALLDD()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT nv.Hoten,nv.MaNV
                FROM nhanvien nv
                JOIN dieuduong dd ON nv.MaNV = dd.maDieuDuong;";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function SelectSOCA($id)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = " SELECT COUNT(*) AS total FROM catruckham WHERE maNhanVien = '$id'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function SelectALLCK()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "select * from chuyenkhoa";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function SelectALLROLE()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "select * from role";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function getMNVM($maca)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT maNhanVien 
                FROM catruckham 
                WHERE maCa = '$maca'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function SelectALLNVYCDL()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT 
    pyc.trangThai,
    pyc.lyDo,
    pyc.maCaDoi,
    pyc.maCaThay,
    pyc.maNhanVien,
    pyc.maPhieuYCDL,
    nv.Hoten, 
    nv.Chucvu
FROM 
    phieuyeucaudoilich pyc
JOIN 
    nhanvien nv ON pyc.maNhanVien = nv.MaNV";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function SelectNVYCDL($id)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT 
    pyc.trangThai,
    pyc.lyDo,
    pyc.maCaDoi,
    pyc.maCaThay,
    pyc.maNhanVien,
    pyc.maPhieuYCDL,
    nv.Hoten, 
    nv.Chucvu
FROM 
    phieuyeucaudoilich pyc
JOIN 
    nhanvien nv ON pyc.maNhanVien = nv.MaNV
    where pyc.maNhanVien = '$id'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function selectCACU($maca)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT * FROM catruckham where maCa = '$maca'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function selectCAMOI($maca)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT * FROM catruckham where maCa = '$maca'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function selectNAMER($id)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT r.namerole,r.idrole FROM user u
                JOIN role r ON u.idrole = r.idrole
                WHERE u.iduser = '$id'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function selectTENROLE($id)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT namerole FROM role where idrole = '$id'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function selectUSER()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "select * from user";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function selectUSERGIONG($name)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "select iduser from user where nameuser = '$name'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function AddND($ten, $sdt, $email, $diachi, $chucvu, $iduser)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "INSERT INTO nhanvien(Hoten,SDT,Email,Diachi,Chucvu,iduser)
                VALUES('$ten', '$sdt', '$email', '$diachi','$chucvu','$iduser')";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function addROLE($user, $password, $idrole)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "INSERT INTO user(nameuser,password,idrole)
                VALUES('$user','$password','$idrole')";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function addBSTT($manv, $ckhoa)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "INSERT INTO bacsi(MaBacSi,MaChuyenKhoa)
                VALUES('$manv','$ckhoa')";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function addDDTT($manv, $ckhoa)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "INSERT INTO dieuduong(maDieuDuong,maChuyenKhoa)
                VALUES('$manv','$ckhoa')";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function themLICHTRUC($timeName, $employee, $buoi, $catruc1, $room, $ck, $date)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "INSERT INTO catruckham(khungGio,maNhanVien,ghiChu,loaiCV,maPhong,maChuyenKhoa,ngayTruc)
                VALUES('$timeName','$employee','$buoi','$catruc1','$room','$ck','$date')";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function DeleteND($id)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "DELETE FROM nhanvien WHERE MaNV=$id";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function UpdateND($ten, $sdt, $email, $diachi, $manv)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "UPDATE nhanvien SET Hoten ='$ten',SDT ='$sdt',Email ='$email',Diachi ='$diachi' WHERE MaNV=$manv";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function capnhatTUCHOI($trangthai, $lydo, $maphieu)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "UPDATE phieuyeucaudoilich SET trangThai ='$trangthai',lyDo ='$lydo' WHERE maPhieuYCDL=$maphieu";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function UpdateROLEUSER($idrole, $userid)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "UPDATE user SET idrole ='$idrole' WHERE iduser=$userid";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function UpdateROLEND($iduser, $chucvu)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "UPDATE nhanvien SET Chucvu ='$chucvu' WHERE iduser=$iduser";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function UpdateQUYENUSER($id, $iduser)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "UPDATE user
SET idrole = '$id'
WHERE iduser = '$iduser'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function capnhatTT($maphieu)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "UPDATE phieuyeucaudoilich
SET trangThai = 'Đồng ý'
WHERE maPhieuYCDL = '$maphieu'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function capnhatMNVCU($manhanvien, $camoi)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "UPDATE catruckham
                SET maNhanVien = '$manhanvien'
                WHERE maCa = '$camoi'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function capnhatMNVMOI($manhanvien, $camoi)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "UPDATE catruckham
                SET maNhanVien = '$manhanvien'
                WHERE maCa = '$camoi'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function selectIDNV($iduser)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT * FROM nhanvien WHERE iduser ='$iduser'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function selectND($mand)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "SELECT * FROM nhanvien WHERE MaNV=$mand";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
}

?>