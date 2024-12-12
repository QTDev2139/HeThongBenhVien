<?php 
include_once("connect.php");


class mNguoiDung{
    public function selectND($nameuser,$password) {
        $p = new clsConnect();
        $con = $p->openConnect();
        $truyvan= "select * from user where nameuser= '$nameuser' and password ='$password' ";
        $ketqua = mysqli_query($con, $truyvan);
        $p->closeConnect($con);
        return $ketqua;
    }

    public function selectPatientDetails($phone) {
        $p = new clsConnect();
        $con = $p->openConnect();
        $query = "SELECT maBenhNhan, HoTen, SoDienThoai, email, diaChi, ngaySinh, gioiTinh, CCCD, maBHYT, mucBHYT 
                  FROM benhnhan WHERE SoDienThoai = '$phone' ORDER BY SoDienThoai DESC LIMIT 1";
        $result = mysqli_query($con, $query);
        $p->closeConnect($con);
        if ($result && mysqli_num_rows($result) > 0) {
            return mysqli_fetch_assoc($result);
        } else {
            return null;
        }
    }
}
