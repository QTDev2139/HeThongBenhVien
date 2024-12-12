<?php
include("model/mHoaDon.php");
class cHoaDon
{
    public function getAllHD($sql)
    { // Nhận $sql làm tham số
        $p = new mHoaDon();
        $tblSP = $p->selectHD($sql);
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
    public function addHD($sql)
    {
        $p = new mHoaDon();

        return $p->insHD($sql);
    }
    public function addHDTT($sql)
    {
        $con = (new clsConnect())->openConnect(); // Kết nối CSDL
        if ($con->query($sql) === TRUE) {
            $last_idhd = $con->insert_id; // Lấy mã tự tăng cuối cùng
            (new clsConnect())->closeConnect($con); // Đóng kết nối
            return $last_idhd; // Trả về mã vừa tạo
        } else {
            (new clsConnect())->closeConnect($con); // Đóng kết nối
            return false;
        }
    }


    public function getHD()
    {
        $p = new mHoaDon();
        $hd = $p->selecthoadon();
        if (mysqli_num_rows($hd) > 0) {
            return $hd;
        } else {
            return false;
        }
    }
    public function getHDByMaHD($maHD)
    {
        $p = new mHoaDon();
        $hd = $p->selectHDByMaHD($maHD);
        if (mysqli_num_rows($hd) > 0) {
            return $hd;
        } else {
            return false;
        }
    }
    public function getHDByMaBN($maBN)
    {
        $p = new mHoaDon();
        $hd = $p->getHDByMaBN($maBN);
        if (mysqli_num_rows($hd) > 0) {
            return $hd;
        } else {
            return false;
        }
    }
    public function getOneHD($maHD)
    {
        $p = new mHoaDon();
        $hd = $p->selectOneHD($maHD);
        if (mysqli_num_rows($hd) > 0) {
            return $hd;
        } else {
            return false;
        }
    }
    public function updateThanhToan($maHD, $maBN, $trangthai, $ngaytt)
    {
        $p = new mHoaDon();

        // Cập nhật trạng thái hóa đơn
        $hd = $p->updateTrangthai($maHD, $maBN, $trangthai, $ngaytt);

        if ($hd) {
            // Cập nhật trạng thái phiếu đăng ký khám
            $resultSTT = $p->updateSTT($maHD);

            if ($resultSTT) {
                return true; // Cả hai cập nhật đều thành công
            } else {
                return false; // Hóa đơn đã cập nhật, nhưng phiếu đăng ký khám cập nhật thất bại
            }
        } else {
            return false; // Cập nhật hóa đơn thất bại
        }
    }

    //update trạng thái và stt trong phieudangkykham
    public function updateSTT($maHD)
    {
        $p = new mHoaDon();
        $stt = $p->updateSTT($maHD);
        if ($stt) {
            return true;
        } else {
            return false;
        }
    }
}
