<?php
include_once("connect.php");

if (isset($_POST['sdt'])) {
    $sdt = $_POST['sdt'];

    $connect = new clsConnect();
    $con = $connect->openConnect();

    $sql = "SELECT * FROM benhnhan WHERE SoDienThoai = '$sdt'";
    $result = $con->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row); // Trả về dữ liệu dạng JSON
    } else {
        echo json_encode(["error" => "Không tìm thấy bệnh nhân"]);
    }

    $connect->closeConnect($con);
}
?>
