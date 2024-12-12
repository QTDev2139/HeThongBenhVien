<?php
    include_once("connect.php");
    class mPhieuKham {
        public function selectPK($sql) {
            $p = new clsConnect();
            $con = $p->openConnect();
            $result = $con->query($sql);
            $p->closeConnect($con); // Đóng kết nối sau khi truy vấn
            return $result;
        }

        //phần An làm
        //lập phiếu khám từ phiêu đăng kí khám
        public function addPK($maPhieuDangKyKham,$MaBenhNhan,$MaBacSi,$MaToaThuoc,$maCa,$MaChuyenKhoa,$TrieuChung,$ChuanDoan,$GhiChu,$NgayTaiKham){
            $p= new clsConnect();
            $con= $p->openConnect();
            $truyvan="insert into phieukham(maPhieuDangKyKham,MaBenhNhan,MaBacSi,MaToaThuoc,MaCa,MaChuyenKhoa,TrieuChung,ChuanDoan,GhiChu,NgayTaiKham ) values ($maPhieuDangKyKham,$MaBenhNhan,$MaBacSi,$MaToaThuoc,$maCa,$MaChuyenKhoa,N'$TrieuChung',N'$ChuanDoan',N'$GhiChu',$NgayTaiKham)";
            $ketqua=mysqli_query($con,$truyvan);
            $p->closeConnect($con);
            return $ketqua;
        }

        //lấy tt ca 
        public function selectCa(){
            $p= new clsConnect();
            $con= $p->openConnect();
            $sql="select * from catruckham";
            $kq=mysqli_query($con,$sql);
            $p->closeConnect($con);
            return $kq;
        }
        //lấy ds phiếu khám đã lập 
        public function layPK(){
            $p = new clsConnect();
            $con = $p->openConnect();
            $sql= "select * from phieukham ";
            $kq=mysqli_query($con,$sql);
            $p->closeConnect($con);
            return $kq;

        }
        //lấy thông tin điều dưỡng
        public function selectDD(){
            $p= new clsConnect();
            $con = $p->openConnect();
            $sql="select maDieuDuong,HoTen from dieuduong d join nhanvien v on d.maDieuDuong=v.MaNV ";
            $kq= mysqli_query($con,$sql);
            $p->closeConnect($con);
            return $kq;
        }
        //lập hồ sơ bệnh án nội trú 
        public function addHS($maBenhNhan,$maBacSi,$maChuyenKhoa,$maDieuDuong,$NgayNhapVien,$TrieuChung,$ChuanDoan){
            $p= new clsConnect();
            $con = $p->openConnect();
            $sql="insert into hosobenhannoitru (maBenhNhan,maBacSi,maChuyenKhoa,maDieuDuong,NgayNhapVien,TrieuChung,ChuanDoan) 
            values ($maBenhNhan,$maBacSi,$maChuyenKhoa,$maDieuDuong,$NgayNhapVien,N'$TrieuChung',N'$ChuanDoan') ";
            $kq=mysqli_query($con,$sql);
            $p->closeConnect($con);
            return $kq;
        }

        //xem hồ sơ bệnh án nội trú
        public function layHS(){
            $p = new clsConnect();
            $con = $p->openConnect();
            $sql= "SELECT 
                hs.*, 
                b.HoTen AS TenBN, 
                bs.HoTen AS TenBS, 
                c.tenChuyenKhoa, 
                dd.HoTen AS TenDD
            FROM 
                hosobenhannoitru hs JOIN 
                benhnhan b ON hs.maBenhNhan = b.maBenhNhan
            JOIN 
                chuyenkhoa c ON hs.maChuyenKhoa = c.maChuyenKhoa
            JOIN 
                dieuduong d ON hs.maDieuDuong = d.maDieuDuong
            JOIN 
                nhanvien bs ON hs.maBacSi = bs.MaNV
            JOIN 
                nhanvien dd ON hs.maDieuDuong = dd.MaNV;
            ";
            $kq=mysqli_query($con,$sql);
            $p->closeConnect($con);
            return $kq;

        }
    }
    
?>