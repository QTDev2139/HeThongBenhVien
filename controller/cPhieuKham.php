<?php
include("model/mPhieuKham.php");
class cPhieKham
{
    public function getAllSP($sql)
    { // Nhận $sql làm tham số
        $p = new mPhieuKham();
        $tblSP = $p->selectPK($sql);
        if (!$tblSP) {
            return -1;
        } else {
            if ($tblSP->num_rows > 0) {
                return $tblSP;
            } else {
                return 0; // Không có dòng dữ liệu
            }
        }
    }

    public function addPK($maPhieuDangKyKham, $MaBenhNhan, $MaBacSi, $MaToaThuoc, $maCa, $MaChuyenKhoa, $TrieuChung, $ChuanDoan, $GhiChu, $NgayTaiKham)
    {
        $p = new mPhieuKham();
        $kq = $p->addPK($maPhieuDangKyKham, $MaBenhNhan, $MaBacSi, $MaToaThuoc, $maCa, $MaChuyenKhoa, $TrieuChung, $ChuanDoan, $GhiChu, $NgayTaiKham);
        if ($kq) {
            return true;
        } else {
            return false;
        }
    }

    //lấy thông tin ca
    public function getCa()
    {
        $p = new mPhieuKham();
        $kq = $p->selectCa();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else {
            return false;
        }
    }


    //lấy ds phiếu khám sau khi lập
    public function layPK()
    {
        $p = new mPhieuKham();
        $kq = $p->layPK();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else return false;
    }
    public function getDD()
    {
        $p = new mPhieuKham();
        $pk = $p->selectDD();
        if (mysqli_num_rows($pk) > 0) {
            return $pk;
        } else return false;
    }

    // thêm dữ liệu vào hồ sơ nội trú

    public function themHS($maBenhNhan, $maBacSi, $maChuyenKhoa, $maDieuDuong, $NgayNhapVien, $TrieuChung, $ChuanDoan)
    {
        $p = new mPhieuKham();
        $kq = $p->addHS($maBenhNhan, $maBacSi, $maChuyenKhoa, $maDieuDuong, $NgayNhapVien, $TrieuChung, $ChuanDoan);
        if ($kq) {
            return true;
        } else {
            return false;
        }
    }

    //lấy ds hồ sơ bệnh án nội trú 
    public function layHS()
    {
        $p = new mPhieuKham();
        $kq = $p->layHS();
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else return false;
    }
}
