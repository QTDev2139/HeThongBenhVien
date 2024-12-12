
<div class="container my-5">
    <div class="card">
        <div class="card-header text-center bg-primary text-white">
            <h1 class="my-3">Đăng ký khám bệnh</h1>
        </div>
        <div class="card-body">
            <form id="registration-form" onsubmit="submitForm(event)" method="POST" action="">
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="sdt" name="SDT" placeholder="Nhập số điện thoại" onchange="validateSDT()">
                    <div class="text-danger" id="error-sdt" style="display:none;">SDT phải theo dạng 07 hoặc 03 xxxxxxxx.</div>
                </div>
                <div class="mb-3">
                    <label for="ten" class="form-label">Tên</label>
                    <input type="text" class="form-control" id="ten" name="tenbenhnhan" disabled onblur="validateName()">
                    <div class="text-danger" id="error-ten" style="display:none;">Tên phải là dạng chữ.</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" disabled onblur="validateEmail()">
                    <div class="text-danger" id="error-email" style="display:none;">Email phải có dạng @gmail.com.</div>
                </div>
                <div class="mb-3">
                    <label for="ngaysinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" id="ngaysinh" name="ngaysinh" disabled onblur="validateBirthday()">
                    <div class="text-danger" id="error-ngaysinh" style="display:none;">Vui lòng nhập ngày sinh.</div>
                </div>
                <div class="mb-3">
                    <label for="gioitinh" class="form-label">Giới tính</label>
                    <select class="form-select" id="gioitinh" name="gioitinh" disabled onchange="validateGender()">
                        <option value="">Chọn giới tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                    <div class="text-danger" id="error-gioitinh" style="display:none;">Vui lòng chọn giới tính.</div>
                </div>
                <div class="mb-3">
                    <label for="cccd" class="form-label">CCCD</label>
                    <input type="text" class="form-control" id="cccd" name="cccd" disabled onblur="validateCCCD()">
                    <div class="text-danger" id="error-cccd" style="display:none;">CCCD phải là số.</div>
                </div>
                <div class="mb-3">
                    <label for="bhyt" class="form-label">BHYT</label>
                    <input type="text" class="form-control" id="bhyt" name="bhyt" value="0" disabled onblur="validateBHYT()">
                    <div class="text-danger" id="error-bhyt" style="display:none;">BHYT phải là số. Nếu Không có vui lòng nhập là 0</div>
                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa Chỉ</label>
                    <input type="text" class="form-control" id="diachi" name="diachi"  disabled onblur="validateDC()">
                    <div class="text-danger" id="error-diachi" style="display:none;">Nhập Tỉnh</div>
                </div>
                <div class="mb-3">
                    <label for="chuyenkhoa" class="form-label">Chuyên khoa</label>
                    <select class="form-select" id="chuyenkhoa" name="chuyenkhoa" disabled onchange="validateSpecialty();FetchState(this.value)">
                        <option value="">Chọn chuyên khoa</option>
                        <?php
                            include("controller/cChuyenKhoa.php");
                            $p = new cChuyenKhoa();
                            $tblSP = $p->getChuyenKhoa();
                            if ($tblSP !== -1 && $tblSP !== 0) {
                                while ($row = $tblSP->fetch_assoc()) {
                                    echo '<option value="' . $row["maChuyenKhoa"] . '">' . $row["tenChuyenKhoa"] . '</option>';
                                    echo '<p>$row["maChuyenKhoa"]</p>';
                                }
                            }
                        ?>
                    </select>
                    <div class="text-danger" id="error-chuyenkhoa" style="display:none;">Vui lòng chọn chuyên khoa.</div>
                </div>
                <div class="mb-3">
                    <label for="bacsi" class="form-label">Bác sĩ</label>
                    <select class="form-select" id="bacsi" name="bacsi" disabled onchange="validateDoctor();FetchCity(this.value)">
                        <option value="">Chọn bác sĩ</option>
                    </select>
                    <div class="text-danger" id="error-bacsi" style="display:none;">Vui lòng chọn bác sĩ.</div>
                </div>
                <div class="mb-3">
                    <label for="ngaykham" class="form-label">Ngày khám</label>
                    <select class="form-select" id="ngaykham" name="ngaykham" disabled onchange="validateAppointmentDate()">
                        <option value="">Chọn ngày khám</option>
                    </select>
                    <div class="text-danger" id="error-ngaykham" style="display:none;">Vui lòng chọn ngày khám.</div>
                </div>
                <div class="text-center my-5">
                    <button type="submit" class="btn btn-primary" id="btndangKy" name="btndangKy">Đăng ký</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->

<script src="your-javascript.js"></script>
<script type="text/javascript">
        
        function validateSDT() {
            const sdt = document.getElementById('sdt').value;
            const error = document.getElementById('error-sdt');
            const regex = /^(03|07|09)\d{8}$/;
            if (regex.test(sdt)) {
                error.style.display = 'none';
                document.getElementById('ten').disabled = false; // Cho phép nhập Tên
                document.getElementById('ten').focus(); // Đưa con trỏ đến Tên
            } else {
                error.style.display = 'block';
                document.getElementById('ten').disabled = true;
            }
        }

        function validateName() {
            const name = document.getElementById('ten').value;
            const error = document.getElementById('error-ten');
            const regex = /^[\p{L}\s]+$/u; // Kiểm tra tên có dấu và có dấu cách
            if (regex.test(name)) {
                error.style.display = 'none';
                document.getElementById('email').disabled = false; // Cho phép nhập Email
                document.getElementById('email').focus(); // Đưa con trỏ đến Email
            } else {
                error.style.display = 'block';
                document.getElementById('email').disabled = true;
            }
        }

        function validateEmail() {
            const email = document.getElementById('email').value;
            const error = document.getElementById('error-email');
            const regex = /^[A-Za-z0-9._%+-]+@gmail\.com$/; // Kiểm tra email @gmail.com
            if (regex.test(email)) {
                error.style.display = 'none';
                document.getElementById('ngaysinh').disabled = false; // Cho phép nhập Ngày sinh
                document.getElementById('ngaysinh').focus(); // Đưa con trỏ đến Ngày sinh
            } else {
                error.style.display = 'block';
                document.getElementById('ngaysinh').disabled = true;
            }
        }

        function validateBirthday() {
            const birthday = document.getElementById('ngaysinh').value;
            const error = document.getElementById('error-ngaysinh');
            if (birthday) {
                error.style.display = 'none';
                document.getElementById('gioitinh').disabled = false; // Cho phép chọn Giới tính
                document.getElementById('gioitinh').focus(); // Đưa con trỏ đến Giới tính
            } else {
                error.style.display = 'block';
                document.getElementById('gioitinh').disabled = true;
            }
        }

        function validateGender() {
            const gender = document.getElementById('gioitinh').value;
            const error = document.getElementById('error-gioitinh');
            if (gender) {
                error.style.display = 'none';
                document.getElementById('cccd').disabled = false; // Cho phép nhập CCCD
                document.getElementById('cccd').focus(); // Đưa con trỏ đến CCCD
            } else {
                error.style.display = 'block';
                document.getElementById('cccd').disabled = true;
            }
        }

        function validateCCCD() {
            const cccd = document.getElementById('cccd').value;
            const error = document.getElementById('error-cccd');
            const regex = /^\d+$/; // Kiểm tra CCCD là số
            if (regex.test(cccd)) {
                error.style.display = 'none';
                document.getElementById('bhyt').disabled = false; // Cho phép nhập BHYT
                document.getElementById('bhyt').focus(); // Đưa con trỏ đến BHYT
            } else {
                error.style.display = 'block';
                document.getElementById('bhyt').disabled = true;
            }
        }

        function validateBHYT() {
            const bhyt = document.getElementById('bhyt').value;
            const error = document.getElementById('error-bhyt');
            const regex = /^\d+$/; // Kiểm tra BHYT là số
            if (regex.test(bhyt)) {
                error.style.display = 'none';
                document.getElementById('diachi').disabled = false; // Cho phép chọn Chuyên khoa
                document.getElementById('diachi').focus(); // Đưa con trỏ đến Chuyên khoa
            } else {
                error.style.display = 'block';
                document.getElementById('diachi').disabled = true;
            }
        }
        function validateDC() {
            const diachi = document.getElementById('diachi').value;
            const error = document.getElementById('error-diachi');
            const regex = /^[\p{L}\s]+$/u; // Kiểm tra tên có dấu và có dấu cách
            if (regex.test(diachi)) {
                error.style.display = 'none';
                document.getElementById('chuyenkhoa').disabled = false; // Cho phép nhập Email
                document.getElementById('chuyenkhoa').focus(); // Đưa con trỏ đến Email
            } else {
                error.style.display = 'block';
                document.getElementById('chuyenkhoa').disabled = true;
            }
        }

        function validateSpecialty() {
            const specialty = document.getElementById('chuyenkhoa').value;
            const error = document.getElementById('error-chuyenkhoa');
            if (specialty) {
                error.style.display = 'none';
                document.getElementById('bacsi').disabled = false; // Cho phép chọn Bác sĩ
                document.getElementById('bacsi').focus(); // Đưa con trỏ đến Bác sĩ
            } else {
                error.style.display = 'block';
                document.getElementById('bacsi').disabled = true;
            }
        }

        function validateDoctor() {
            const doctor = document.getElementById('bacsi').value;
            const error = document.getElementById('error-bacsi');
            if (doctor) {
                error.style.display = 'none';
                document.getElementById('ngaykham').disabled = false; // Cho phép chọn Ngày khám
                document.getElementById('ngaykham').focus(); // Đưa con trỏ đến Ngày khám
            } else {
                error.style.display = 'block';
                document.getElementById('ngaykham').disabled = true;
            }
        }

        function validateAppointmentDate() {
            const appointmentDate = document.getElementById('ngaykham').value;
            const error = document.getElementById('error-ngaykham');
            if (appointmentDate) {
                error.style.display = 'none';
            } else {
                error.style.display = 'block';
            }
        }
        function FetchState(id){
            $('#bacsi').html('');
            $('#ngaykham').html('<option>Select ngaykham</option>');
            $.ajax({
            type:'post',
            url: 'view/benhnhan/ajaxdata.php',
            data : { chuyenkhoa_id : id},
            success : function(data){
                $('#bacsi').html(data);
            }
            })
        }

        function FetchCity(id){ 
            $('#ngaykham').html('');
            $.ajax({
            type:'post',
            url: 'view/benhnhan/ajaxdata.php',
            data : { bacsi_id : id},
            success : function(data){
                $('#ngaykham').html(data);
            }

            })
        }
    </script>
</body>
</html>
<?php
    include_once('controller/cBenhNhan.php');
    $obj = new cBenhNhan;
    include_once('controller/cUser.php');
    $obj1 = new cUser;
    include_once('controller/cHoaDon.php');
    $obj2 = new cHoaDon;
    include("controller/cPhieuDangKyKham.php");

    $obj3 = new cPhieuDangKyKham();
    if (isset($_POST["btndangKy"])) {
        // Kiểm tra nếu các trường quan trọng có dữ liệu
        if (!empty($_POST['SDT']) && !empty($_POST['tenbenhnhan']) && !empty($_POST['email']) && !empty($_POST['ngaysinh']) && !empty($_POST['gioitinh']) && !empty($_POST['cccd']) && $_POST['bhyt'] >= 0 && !empty($_POST['chuyenkhoa']) && !empty($_POST['bacsi']) && !empty($_POST['ngaykham'])) {
            // Thực hiện xử lý đăng ký
            $sdt = $_POST['SDT'];
            $ten = $_POST['tenbenhnhan'];
            $email = $_POST['email'];
            $ngaysinh = $_POST['ngaysinh'];
            $gioitinh = $_POST['gioitinh'];
            $cccd = $_POST['cccd'];
            $bhyt = $_POST['bhyt'];
            $maCa = $_POST['ngaykham'];
            $diachi = $_POST['diachi'];

            $mucBHYT = !empty($bhyt) && $bhyt > 0 ? 0.8 : 0.0;
    
            // Tiến hành chèn dữ liệu vào cơ sở dữ liệu
            $sql = "INSERT INTO benhnhan 
                    (HoTen, SoDienThoai, email, diachi, ngaySinh, gioiTinh, CCCD, maBHYT, mucBHYT) 
                    VALUES ('$ten', '$sdt', '$email', '$diachi', '$ngaysinh', '$gioitinh', '$cccd', '$bhyt', $mucBHYT)";
            
    
            if ($last_id = $obj->addBenhNhan($sql)) {
                // Lấy mã bệnh nhân vừa thêm
                if ($last_id) {
                    $sql1 = "INSERT INTO user (nameuser, password) VALUES ('$sdt', MD5('123456'))";
                    $obj1->addUser($sql1);

                    $sql2= "INSERT INTO HoaDon (maThuNgan, maBenhNhan, NgayLap, TongTien, TrangThaiThanhToan, NgayThanhToan, LoaiHoaDon)
                            VALUES 
                            (NULL, $last_id, CURDATE(), 500000, 'Chưa Thanh Toán', CURDATE(), 'Khám bệnh');
                            ";
                    $last_idhd= $obj2->addHDTT($sql2);
                    $sql3 = "INSERT INTO phieudangkykham (maBenhNhan, maCa, maHoaDon, maTiepTan, NgayDangKy, TrangThai) 
                        VALUES ('" . $last_id . "', '" . $maCa . "', '" . $last_idhd . "', NULL, CURDATE(), 'Chưa Thanh Toán')";
                    $obj3->addPhieuDangKyKham($sql3);
    
                    echo "<script>alert('Đã Lập Hóa Đơn.$last_idhd');</script>";
                }
            } else {
                echo '<script>alert("Đăng ký không thành công.");</script>';
            }
        } else {
            echo '<script>alert("Vui lòng điền đầy đủ thông tin.");</script>';
        }
    }
?>