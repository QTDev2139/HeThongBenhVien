<?php
include_once("connect.php");
class mBenhNhan
{
    public function insBenhNhan($sql)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        return $con->query($sql);
    }

    public function selectBN()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "select * from benhnhan ";
        $ketqua = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $ketqua;
    }

    public function selectBenhNhanWithDetails()
    {
        $p = new clsConnect();
        $con = $p->openConnect();

        // Truy vấn dữ liệu cần thiết
        $sql = "SELECT maBenhNhan, HoTen, NgaySinh, GioiTinh FROM benhnhan";
        $result = mysqli_query($con, $sql);

        $benhNhanList = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $benhNhanList[] = $row; // Lưu từng bản ghi vào danh sách
            }
        }

        $p->closeConnect($con);
        return $benhNhanList; // Trả về danh sách bệnh nhân
    }
    // Lấy thông tin bệnh nhân theo mã
    public function selectBNById($maBenhNhan)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "SELECT * FROM benhnhan WHERE maBenhNhan = '$maBenhNhan'";  // Truy vấn lấy bệnh nhân theo mã
        $result = mysqli_query($con, $truyvan);
        $p->closeConnect($con);

        return mysqli_fetch_assoc($result);
    }
    //Cập nhập bệnh nhân theo mã
    public function updateBN($maBenhNhan, $hoTen, $soDienThoai, $email, $diaChi, $ngaySinh, $gioiTinh, $cccd, $maBHYT, $mucBHYT)
    {
        $p = new clsConnect();
        $con = $p->openConnect();

        // Câu truy vấn cập nhật
        $truyvan = "UPDATE benhnhan 
                        SET HoTen = '$hoTen', 
                            SoDienThoai = '$soDienThoai', 
                            email = '$email', 
                            diaChi = '$diaChi', 
                            ngaySinh = '$ngaySinh', 
                            gioiTinh = '$gioiTinh', 
                            CCCD = '$cccd', 
                            maBHYT = '$maBHYT', 
                            mucBHYT = '$mucBHYT' 
                        WHERE maBenhNhan = '$maBenhNhan'";

        // Thực hiện truy vấn
        $result = mysqli_query($con, $truyvan);

        // Đóng kết nối
        $p->closeConnect($con);

        return $result;
    }
    // Xóa bệnh nhân theo mã
    public function deleteBN($maBenhNhan)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "DELETE FROM benhnhan WHERE maBenhNhan = '$maBenhNhan'";
        $result = mysqli_query($con, $truyvan);
        $p->closeConnect($con);

        return $result;
    }
    public function searchBenhNhan($searchKeyword)
    {
        // Kết nối đến cơ sở dữ liệu
        $p = new clsConnect();
        $con = $p->openConnect();

        // Truy vấn tìm kiếm bệnh nhân theo maBenhNhan, SoDienThoai, và CCCD
        $truyvan = "SELECT * FROM benhnhan WHERE maBenhNhan LIKE '%$searchKeyword%' 
                        OR SoDienThoai LIKE '%$searchKeyword%' OR CCCD LIKE '%$searchKeyword%'";

        $result = mysqli_query($con, $truyvan);

        $benhNhanList = [];
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $benhNhanList[] = $row;
            }
        }

        // Đóng kết nối
        $p->closeConnect($con);

        // Trả về danh sách bệnh nhân tìm được
        return $benhNhanList;
    }

    public function selectAllSPbyMa($cty)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "select * from benhnhan where maBenhNhan = '$cty'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }
    public function selectAllSPbyName($namesp)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if ($con) {
            $str = "select * from benhnhan where HoTen Like N'%$namesp%'";
            $tblSP = $con->query($str);
            $p->closeConnect($con);
            return $tblSP;
        } else {
            return false;
        }
    }

    public function selectbenhnhan()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "select * from phieudangkykham ";
        $ketqua = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $ketqua;
    }
    //lấy thông tin tất cả bệnh nhân trong bảng benhnhan

    public function layBN()
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "select * from benhnhan limit 5 ";
        $ketqua = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $ketqua;
    }
    //lấy thông tin bệnh nhân by mã bênh nhân 
    public function layBNByMaBN($MaBN)
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan = "select * from benhnhan where maBenhNhan like '$MaBN' ";
        $ketqua = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $ketqua;
    }


    public function selectHSDTNT($tenbn = '')
    {
        $p = new clsConnect();
        $con = $p->openConnect();
        if (isset($tenbn)) {
            $sql = "SELECT * FROM benhnhan bn JOIN hosobenhannoitru hs ON
            bn.maBenhNhan = hs.maBenhNhan JOIN giuongbenh gb ON gb.maGiuong = hs.maGiuong
            JOIN phong p ON p.maPhong =  gb.maPhong WHERE bn.HoTen LIKE '%$tenbn%'";
        } else {
            $sql = "SELECT * FROM benhnhan bn JOIN hosobenhannoitru hs ON
            bn.maBenhNhan = hs.maBenhNhan JOIN giuongbenh gb ON gb.maGiuong = hs.maGiuong
            JOIN phong p ON p.maPhong =  gb.maPhong";
        }

        $ketqua = mysqli_query($con, $sql);
        $p->closeConnect($con);
        return $ketqua;
    }

    public function selectCTHSDTNT($mahs)
    {
        $p = new clsConnect();
        $con = $p->openConnect();

        $sql = "SELECT * FROM benhnhan bn JOIN hosobenhannoitru hs ON
            bn.maBenhNhan = hs.maBenhNhan JOIN giuongbenh gb ON gb.maGiuong = hs.maGiuong
            JOIN phong p ON p.maPhong =  gb.maPhong JOIN phacdodieutri pd ON pd.maPhacDoDieuTri = 
            hs.maPhacDoDieuTri JOIN toathuoc tt ON pd.maToaThuoc = tt.maToaThuoc WHERE maHSBANT = $mahs";
        $ketqua = mysqli_query($con, $sql);
        $p->closeConnect($con);
        return $ketqua;
    }
}
