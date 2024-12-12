<?php 
include_once("model/mNguoiDung.php");
class cNguoiDung{
    public function getND($nameuser, $password){
        $password= md5($password) ;
        $p= new mNguoiDung();
        $ketqua = $p->selectND($nameuser,$password);
        if(mysqli_num_rows($ketqua)>0){
            while($r= mysqli_fetch_assoc($ketqua)){
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                
                $_SESSION["dn"]=$r["idrole"];
                $_SESSION["nameuser"]=$r["nameuser"];
                $_SESSION["iduser"] = $r["iduser"];
            }
            if($_SESSION["dn"]==1){
                echo "<script>alert('Đăng nhập thành công. Chào mừng Admin');</script>";
                header("refresh:0.5; url='index-staff.php'");
            } else if($_SESSION["dn"]==2){
                echo "<script>alert('Đăng nhập thành công. Chào mừng Bác sĩ');</script>";
                header("refresh:0.5; url='index-staff.php'");
                // header("refresh:0.5; url='View/bacsi.php'");
            }else if($_SESSION["dn"]==3){
                // $username = urlencode($_SESSION["nameuser"]); // Mã hóa chuỗi để đảm bảo URL hợp lệ
                echo "<script>alert('Đăng nhập thành công. Chào mừng Điều dưỡng');</script>";
                // header("refresh:0.5; url='index.php?nameuser=$username'");
                header("refresh:0.5; url='index-staff.php'");
            }else if($_SESSION["dn"]==4){
                echo "<script>alert('Đăng nhập thành công. Chào mừng Thu ngân');</script>";
                header("refresh:0.5; url='index-staff.php'");

            }else if($_SESSION["dn"]==5){
                echo "<script>alert('Đăng nhập thành công. Chào mừng Dược sĩ');</script>";
                header("refresh:0.5; url='index-staff.php'");

            }else if($_SESSION["dn"]==6){
                echo "<script>alert('Đăng nhập thành công. Chào mừng Tiếp Tân');</script>";
                header("refresh:0.5; url='index-staff.php'");
            }else if($_SESSION["dn"]==7){
                    echo "<script>alert('Đăng nhập thành công. Chào mừng Quản lý khoa');</script>";
                    header("refresh:0.5; url='index-staff.php'");

            }else if($_SESSION["dn"]==10){
                echo "<script>alert('Đăng nhập thành công. Chào mừng Bạn');</script>";
                header("refresh:0.5; url='index.php'");

            }
        }else  {
            echo "<script>alert('Đăng nhập thất bại');</script>";
            header("refresh:0.5; url='index.php?login.php'");
            exit();
        }

    }public function getPatientDetails($phone) {
        $p = new mNguoiDung();
        return $p->selectPatientDetails($phone);
    }
}
?>