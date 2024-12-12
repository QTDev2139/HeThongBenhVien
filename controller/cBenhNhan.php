
<?php
include("model/mBenhNhan.php");
class cBenhNhan
{
    public function addBenhNhan($sql)
    {
        $con = (new clsConnect())->openConnect(); // Kết nối CSDL
        if ($con->query($sql) === TRUE) {
            $last_id = $con->insert_id; // Lấy mã tự tăng cuối cùng
            (new clsConnect())->closeConnect($con); // Đóng kết nối
            return $last_id; // Trả về mã vừa tạo
        } else {
            (new clsConnect())->closeConnect($con); // Đóng kết nối
            return false;
        }
    }
    // public function getBN()
    // {
    //     $p = new mBenhNhan();
    //     $benhnhan = $p->selectBN();
    //     if (mysqli_num_rows($benhnhan) > 0) {
    //         return $benhnhan;
    //     } else {
    //         return false;
    //     }
    // }
    public function getBenhNhanDetails()
    {
        $model = new mBenhNhan();
        return $model->selectBenhNhanWithDetails();
    }
    public function getBNById($maBenhNhan)
    {
        $model = new mBenhNhan();
        return $model->selectBNById($maBenhNhan);
    }

    public function updateBN($maBenhNhan, $hoTen, $soDienThoai, $email, $diaChi, $ngaySinh, $gioiTinh, $cccd, $maBHYT, $mucBHYT)
    {
        $mBenhNhan = new mBenhNhan();
        return $mBenhNhan->updateBN($maBenhNhan, $hoTen, $soDienThoai, $email, $diaChi, $ngaySinh, $gioiTinh, $cccd, $maBHYT, $mucBHYT);
    }
    public function deleteBN($maBenhNhan)
    {
        $model = new mBenhNhan();
        return $model->deleteBN($maBenhNhan);
    }
    public function searchBenhNhan()
    {
        // Lấy từ khóa tìm kiếm từ URL (GET)
        $searchKeyword = isset($_GET['searchKeyword']) ? $_GET['searchKeyword'] : '';

        // Tạo đối tượng model mBenhNhan và gọi phương thức tìm kiếm
        $mBenhNhan = new mBenhNhan();
        $benhNhanList = $mBenhNhan->searchBenhNhan($searchKeyword);

        // Trả về danh sách bệnh nhân tìm được
        return $benhNhanList;
    }
    // public function getAllSPbyMa($cty)
    // {
    //     $p = new mSanPham();

    //     $tblSP = $p->selectAllSPbyMa($cty);
    //     if (!$tblSP) {
    //         return -1;
    //     } else {
    //         if ($tblSP->num_rows > 0) {
    //             return $tblSP;
    //         } else {
    //             return 0;
    //         }
    //     }
    // }
    // public function getAllSPbyName($namesp)
    // {
    //     $p = new mSanPham();

    //     $tblSP = $p->selectAllSPbyName($namesp);
    //     if (!$tblSP) {
    //         return -1;
    //     } else {
    //         if ($tblSP->num_rows > 0) {
    //             return $tblSP;
    //         } else {
    //             return 0;
    //         }
    //     }
    // }

    public function getBN()
    {
        $p = new mBenhNhan();
        $hd = $p->selectbenhnhan();
        if (mysqli_num_rows($hd) > 0) {
            return $hd;
        } else {
            return false;
        }
    }

    //lấy thông tin từ bảng bệnh nhân 
    public function layBN()
    {
        $p = new mBenhNhan();
        $hd = $p->layBN();
        if (mysqli_num_rows($hd) > 0) {
            return $hd;
        } else {
            return false;
        }
    }
    public function layBNByMaBN($MaBN)
    {
        $p = new mBenhNhan();
        $hd = $p->layBNByMaBN($MaBN);
        if (mysqli_num_rows($hd) > 0) {
            return $hd;
        } else {
            return false;
        }
    }

    public function layHSNT($tenbn=''){
        $p = new mBenhNhan();
        return $p->selectHSDTNT($tenbn);
    }

    public function layCTHSDTNT($mahs){
        $p = new mBenhNhan();
        return $p->selectCTHSDTNT($mahs);
    }
}

?>