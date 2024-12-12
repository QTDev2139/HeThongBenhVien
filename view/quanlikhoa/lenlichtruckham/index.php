<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lên lịch trực cho bác sĩ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
            font-family: 'Roboto', sans-serif;
        }
        .schedule-button {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
        }
        .schedule-button:hover {
            background-color: #218838;
        }
        .schedule-button-yellow {
            background-color: #ffc107;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
        }
        .schedule-button-yellow:hover {
            background-color: #e0a800;
        }
        .hidden {
            display: none;
        }
    </style>
</head>
<body>
<?php
    include_once("controller/cquanli.php");
    $p = new csanpham();
    $tblSP1 = $p->getAllPHONG();
    $tblSP2 = $p->getAllBACS();
    $tblSP3 = $p->getAllCK();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $date = $_POST['date'];
        $room = $_POST['tenPhong'];
        $time = $_POST['time'];
        $employee = $_POST['employee'];
        $ck = $_POST['ck'];
        $timeName = '';
        $catruc = $_POST['cv'];
        $catruc1 = '';
        $buoi = '';
        switch ($catruc) {
            case 'cv1':
                $catruc1 = 'Ca Trực';
                break;
            case 'cv2':
                $catruc1 = 'Ca Khám';
                break;
            default:
                $catruc1 = 'Không xác định';
        }
        switch ($time) {
            case 'ca1':
                $timeName = '4:00 - 11:00';
                $buoi = 'Sáng';
                break;
            case 'ca2':
                $timeName = '11:00 - 19:00';
                $buoi = 'Chiều';
                break;
            case 'ca3':
                $timeName = '19:00 - 4:00';
                $buoi = 'Tối';
                break;
            default:
                $timeName = 'Không xác định';
        }
        function formatDateToYearMonthDay($date) {
            $dateObj = DateTime::createFromFormat('d/m/Y', $date);
            if ($dateObj && $dateObj->format('d/m/Y') === $date) {
                return $dateObj->format('Y/m/d');
            } else {
                return "Định dạng ngày không hợp lệ.";
            }
        }
        $dateInput = $date;
        $formattedDate = formatDateToYearMonthDay($dateInput);
        $tblSP4 = $p->getAllSOCA($employee);
        $dem = 0;
        while ($r4 = $tblSP4->fetch_assoc()) {
            $count = $r4['total'];
        }
        if ($count >= 5) {
            echo '<script>alert("Số ca làm việc của nhân viên trong tuần đã quá 5 ca. Vui lòng chọn bệnh nhân khác!");</script>';
        } else {
            $p->addLICHTRUC($timeName, $employee, $buoi, $catruc1, $room, $ck, $formattedDate);
            echo '<script>alert("Đã thêm lịch thành công");</script>';
        }
    }
?>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <button id="prevWeek" class="btn btn-primary">Tuần trước</button>
            <a href="index-staff.php?page-sub=lenlichtruckham" style="text-decoration: none;">BÁC SĨ</a>
            <h1 class="h3">LỊCH DÀNH CHO BÁC SĨ</h1>
            <a href="index-staff.php?page-sub=lenlichtruckhamdieuduong" style="text-decoration: none;">ĐIỀU DƯỠNG</a>
            <button id="nextWeek" class="btn btn-primary">Tuần sau</button>
        </div>
        <div class="row text-center">
            <div class="col">
                <div class="fw-bold">Thứ Hai</div>
                <div id="date1" class="text-muted">01/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="schedule-button add-schedule" data-date="01/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div class="col">
                <div class="fw-bold">Thứ Ba</div>
                <div id="date2" class="text-muted">02/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="schedule-button add-schedule" data-date="02/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div class="col">
                <div class="fw-bold">Thứ Tư</div>
                <div id="date3" class="text-muted">03/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="schedule-button add-schedule" data-date="03/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div class="col">
                <div class="fw-bold">Thứ Năm</div>
                <div id="date4" class="text-muted">04/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="schedule-button add-schedule" data-date="04/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div class="col">
                <div class="fw-bold">Thứ Sáu</div>
                <div id="date5" class="text-muted">05/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="schedule-button add-schedule" data-date="05/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div class="col">
                <div class="fw-bold">Thứ Bảy</div>
                <div id="date6" class="text-muted">06/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="schedule-button add-schedule" data-date="06/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div class="col">
                <div class="fw-bold">Chủ Nhật</div>
                <div id="date7" class="text-muted">07/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="schedule-button add-schedule" data-date="07/01/2024">Thêm lịch</button>
                </div>
            </div>
        </div>
        <div id="scheduleForm" class="hidden mt-4 bg-white p-4 rounded shadow">
            <h2 class="h4 mb-4">Thêm Lịch</h2>
            <form id="form" action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="date" class="form-label">Ngày</label>
                    <input type="text" id="date" name="date" class="form-control" readonly>
                </div>
                <div class="mb-3">
                    <label for="room" class="form-label">Phòng</label>
                    <?php 
                        echo "<select id='room' name='tenPhong' class='form-select'>";
                        while($r1 = $tblSP1->fetch_assoc()){
                            echo '<option value="'.$r1['maPhong'].'">'.$r1['tenPhong'].' </option>'; 
                        }
                        echo "</select>";
                    ?>    
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Thời gian</label>
                    <select id="time" name="time" class="form-select">
                        <option value="ca1">Ca 1 (4h - 11h)</option>
                        <option value="ca2">Ca 2 (11h - 19h)</option>
                        <option value="ca3">Ca 3 (19h - 4h)</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cv" class="form-label">Loại công việc</label>
                    <select id="cv" name="cv" class="form-select">
                        <option value="cv1">Ca Trực</option>
                        <option value="cv2">Ca Khám</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="employee" class="form-label">Bác sĩ</label>
                    <select id="employee" name="employee" class="form-select">
                        <?php  
                        while($r2 = $tblSP2->fetch_assoc()){
                        echo '<option value="'.$r2['MaNV'].'">'.$r2['Hoten'].' </option>'; 
                        }
                        ?> 
                    </select>
                </div>
                <div class="mb-3">
                    <label for="ck" class="form-label">Chuyên Khoa</label>
                    <select id="ck" name="ck" class="form-select">
                    <?php 
                        while($r3 = $tblSP3->fetch_assoc()){
                            echo '<option value="'.$r3['maChuyenKhoa'].'">'.$r3['tenChuyenKhoa'].' </option>'; 
                        }
                    ?>
                    </select>
                </div>
                <div class="d-flex justify-content-end">
                    <button name="luu" type="button" id="saveSchedule" class="btn btn-primary me-2">Xem</button>
                    <button name="qw" type="submit" id="saveSchedule" class="btn btn-primary">Lưu</button>
                </div>
            </form> 
        </div>
    </div>

    <script>
        const today = new Date();
        const startOfWeek = new Date(today.setDate(today.getDate() - today.getDay() + 1));
        const dates = document.querySelectorAll('[id^="date"]');
        const addScheduleButtons = document.querySelectorAll('.add-schedule');
        const scheduleForm = document.getElementById('scheduleForm');
        const form = document.getElementById('form');
        const dateInput = document.getElementById('date');
        const saveScheduleButton = document.getElementById('saveSchedule');
        const successMessage = document.getElementById('successMessage');
        let selectedDate = '';

        function updateDates() {
            dates.forEach((dateElement, index) => {
                const date = new Date(startOfWeek);
                date.setDate(startOfWeek.getDate() + index);
                dateElement.textContent = date.toLocaleDateString('vi-VN');
                dateElement.nextElementSibling.querySelector('.add-schedule').dataset.date = date.toLocaleDateString('vi-VN');
            });
        }

        function showForm(date) {
            selectedDate = date;
            dateInput.value = date;
            scheduleForm.classList.remove('hidden');
        }

        function saveSchedule() {
            const ckElement = form.ck;
            const ckValue = ckElement.value;
            const ckText = ckElement.options[ckElement.selectedIndex].text;

            const roomElement = form.room;
            const roomValue = roomElement.value;
            const roomText = roomElement.options[roomElement.selectedIndex].text;

            const cvElement = form.cv;
            const cvValue = cvElement.value;
            const cvText = cvElement.options[cvElement.selectedIndex].text;

            const timeElement = form.time;
            const timeValue = timeElement.value;
            const timeText = timeElement.options[timeElement.selectedIndex].text;

            const employeeElement = form.employee;
            const employeeValue = employeeElement.value;
            const employeeText = employeeElement.options[employeeElement.selectedIndex].text;

            const button = document.querySelector(`.add-schedule[data-date="${selectedDate}"]`);
            
            if (button) {
                button.innerHTML = `${employeeText}<br>Chuyên Khoa: ${ckText}<br>${timeText}<br>${roomText}<br>${cvText}`;
                button.classList.remove('schedule-button');
                button.classList.add('schedule-button-yellow');
            }

            scheduleForm.classList.add('hidden');
            successMessage.classList.remove('hidden');
            setTimeout(() => {
                successMessage.classList.add('hidden');
            }, 3000);
        }

        addScheduleButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                const date = e.target.dataset.date;
                const buttonDate = new Date(date.split('/').reverse().join('-'));
                if (buttonDate >= new Date() - 1) {
                    showForm(date);
                } else {
                    alert('Không thể thêm lịch vào ngày hôm nay trở về trước');
                }
            });
        });

        saveScheduleButton.addEventListener('click', saveSchedule);

        document.getElementById('prevWeek').addEventListener('click', () => {
            startOfWeek.setDate(startOfWeek.getDate() - 7);
            updateDates();
        });

        document.getElementById('nextWeek').addEventListener('click', () => {
            startOfWeek.setDate(startOfWeek.getDate() + 7);
            updateDates();
        });
        updateDates();
    </script>
</body>
</html>