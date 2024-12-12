<?php 

$host = 'localhost';
$username = 'root';
$pass = '';
$db = 'quanlybenhvien';

$db = new mysqli($host,$username,$pass,$db);

if ($db->connect_error) {
	 die("Connection Failed". $db->connect_error);
}



if (isset($_POST['chuyenkhoa_id'])) {
	$query = "SELECT *
		FROM nhanvien nv
		JOIN bacsi bs ON nv.MaNV = bs.MaBacSi
		WHERE bs.MaChuyenKhoa=".$_POST['chuyenkhoa_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select Bacsi</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['MaNV'].'>'.$row['Hoten'].'</option>';
		 }
	}else{
		echo '<option>Không Tìm Thấy Bác Sĩ!</option>';
	}

}elseif (isset($_POST['bacsi_id'])) {
	 

	$query = "SELECT * FROM catruckham where maNhanVien=".$_POST['bacsi_id'];
	$result = $db->query($query);
	if ($result->num_rows > 0 ) {
			echo '<option value="">Select ngaykham</option>';
		 while ($row = $result->fetch_assoc()) {
		 	echo '<option value='.$row['maCa'].' name='.$row['maCa'].'>'.$row['khungGio'].'  |  '.$row['ngayTruc'].'</option>';
		 }
	}else{

		echo '<option>Bác Sĩ Này Hiện Không Có Lịch Khám!</option>';
	}

}


?>
<!-- Lê Thành Đạt -->
