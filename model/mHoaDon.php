<?php
include_once("connect.php");
class mHoaDon
{
    public function selectHD($sql)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $result = $con->query($sql);
        $p->closeConnect($con); // Đóng kết nối sau khi truy vấn
        return $result;
    }
    public function insHD($sql)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        return $con->query($sql);
    }
    public function selecthoadon()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "select * from hoadon ";
        $ketqua = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $ketqua;
    }
    public function selectHDByMaHD($maHD)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "Select * from hoadon where maHoaDon like N'%$maHD%' ";
        $hd = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $hd;
    }
    public function getHDByMaBN($maBN)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "Select * from hoadon where maBenhNhan like N'%$maBN%'";
        $ketqua = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $ketqua;
    }
    //lấy thông tin 1 hóa đơn theo mã hóa đơn
    public function selectOneHD($maHD)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "Select * from hoadon where maHoaDon ='$maHD'";
        $ketqua = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $ketqua;
    }
    //cập nhật trạng thái đã thanh toán
    public function updateTrangthai($maHD, $maBN, $trangthai, $ngaytt)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "Update hoadon set TrangThaiThanhToan=N'Đã thanh toán', NgayThanhToan= Now() where maHoaDon =$maHD AND maBenhNhan = $maBN ";
        $ketqua = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $ketqua;
    }

    //phieudangkikham
    //update trạng thái phiếu và stt
    public function updateSTT($maHD)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "UPDATE phieudangkykham SET TrangThai = N'Đã thanh toán' WHERE maHoaDon = $maHD";
        $ketqua = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $ketqua;
    }
}
