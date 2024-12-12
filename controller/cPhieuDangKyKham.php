<?php
include("model/mPhieuDangKyKham.php");
class cPhieuDangKyKham
{
    public function addPhieuDangKyKham($sql)
    {
        $p = new mPhieuDangKyKham();

        return $p->insPhieuDangKyKham($sql);
    }

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

    public function getByMaBN($maBenhNhan)
    {
        $p = new mPhieuDangKyKham();
        $kq = $p->selectByMaBenhNhan($maBenhNhan);
        if (mysqli_num_rows($kq) > 0) {
            return $kq;
        } else return false;
    }
}
