<?php
error_reporting(0);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lên lịch cho điều dưỡng</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"></link>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-100 p-4">
<?php
                 include_once("controller/csanpham.php");
                 $p=new csanpham();
                 $tblSP1 = $p -> getAllPHONG();
                 $tblSP2 = $p -> getAllDD();
                 $tblSP3 = $p -> getAllCK();
                 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Lấy dữ liệu từ form
                    $date = $_POST['date'];
                    $room = $_POST['tenPhong']; // Mã phòng
                    $time = $_POST['time']; // Mã ca
                    $employee = $_POST['employee']; // Mã nhân viên
                    $ck = $_POST['ck']; // Mã chuyên khoa
                    $timeName = ''; // Đặt giá trị mặc định cho tên ca
                    $catruc =$_POST['cv'];
$catruc1='';
$buoi ='';// giá trị buổi
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
                            $buoi ='Sáng';
                            break;
                        case 'ca2':
                            $timeName = '11:00 - 19:00';
                            $buoi ='Chiều';
                            break;
                        case 'ca3':
                            $timeName = '19:00 - 4:00';
                            $buoi ='Tối';
                            break;
                        default:
                            $timeName = 'Không xác định';
                    }
                    function formatDateToYearMonthDay($date) {
                        // Kiểm tra ngày có đúng định dạng ngày/tháng/năm hay không
                        $dateObj = DateTime::createFromFormat('d/m/Y', $date);
                        if ($dateObj && $dateObj->format('d/m/Y') === $date) {
                            // Chuyển đổi sang định dạng năm/tháng/ngày
                            return $dateObj->format('Y/m/d');
                        } else {
                            return "Định dạng ngày không hợp lệ.";
                        }
                    }
                    // Ví dụ sử dụng
                    $dateInput = $date;
                    $formattedDate = formatDateToYearMonthDay($dateInput);
                    $tblSP4 = $p->getAllSOCA($employee);
                    $dem = 0; // khởi tạo số lượng ca làm việc
                    
    while ($r4 = $tblSP4->fetch_assoc()) {
        $count=$r4['total'];
    }
    if ($count >= 5) {
        // Nếu số lượng ca làm việc >= 5, hiển thị thông báo
        echo '<script>alert("Số ca làm việc của nhân viên trong tuần đã quá 5 ca. Vui lòng chọn bệnh nhân khác!");</script>';
    } else {
        // Nếu số lượng ca làm việc < 5, thêm lịch trực
        $p->addLICHTRUC($timeName, $employee, $buoi, $catruc1, $room, $ck, $formattedDate);
        echo '<script>alert("Đã thêm lịch thành công");</script>';
 }

                }
                ?>
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <button id="prevWeek" class="bg-blue-500 text-white px-4 py-2 rounded">Tuần trước</button>
            <h1 class="text-2xl font-bold">LỊCH DÀNH CHO ĐIỀU DƯỠNG</h1>
            <button id="nextWeek" class="bg-blue-500 text-white px-4 py-2 rounded">Tuần sau</button>
        </div>
        <div class="grid grid-cols-7 gap-4 text-center">
            <div>
                <div class="font-bold">Thứ Hai</div>
                <div id="date1" class="text-sm text-gray-500">01/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="bg-green-500 text-white px-2 py-1 rounded add-schedule" data-date="01/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div>
                <div class="font-bold">Thứ Ba</div>
                <div id="date2" class="text-sm text-gray-500">02/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="bg-green-500 text-white px-2 py-1 rounded add-schedule" data-date="02/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div>
                <div class="font-bold">Thứ Tư</div>
                <div id="date3" class="text-sm text-gray-500">03/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="bg-green-500 text-white px-2 py-1 rounded add-schedule" data-date="03/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div>
                <div class="font-bold">Thứ Năm</div>
                <div id="date4" class="text-sm text-gray-500">04/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="bg-green-500 text-white px-2 py-1 rounded add-schedule" data-date="04/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div>
                <div class="font-bold">Thứ Sáu</div>
                <div id="date5" class="text-sm text-gray-500">05/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="bg-green-500 text-white px-2 py-1 rounded add-schedule" data-date="05/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div>
                <div class="font-bold">Thứ Bảy</div>
                <div id="date6" class="text-sm text-gray-500">06/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="bg-green-500 text-white px-2 py-1 rounded add-schedule" data-date="06/01/2024">Thêm lịch</button>
                </div>
            </div>
            <div>
                <div class="font-bold">Chủ Nhật</div>
                <div id="date7" class="text-sm text-gray-500">07/01/2024</div>
                <div class="bg-white p-2 rounded shadow mt-2">
                    <button class="bg-green-500 text-white px-2 py-1 rounded add-schedule" data-date="07/01/2024">Thêm lịch</button>
                </div>
            </div>
        </div>
        <div id="scheduleForm" class="hidden mt-4 bg-white p-4 rounded shadow">
            <h2 class="text-xl font-bold mb-6">Thêm Lịch</h2>
            <form id="form" action="" method="post" enctype="multipart/form-data">
                <div class="mb-6">
                    <label for="date" class="block text-sm font-medium text-gray-700">Ngày</label>
                    <input type="text" id="date" name="date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" readonly>
                </div>
                <div class="mb-6">
                    <label for="room" class="block text-sm font-medium text-gray-700">Phòng</label>
                    <?php 
                        echo "<select id='room' name='tenPhong' class='mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm'>";
                        while($r1 = $tblSP1->fetch_assoc()){
                            echo '<option value="'.$r1['maPhong'].'">'.$r1['tenPhong'].' </option>'; 
                        }
                        echo "</select>";?>    
                </div>
                <div class="mb-6">
                    <label for="time" class="block text-sm font-medium text-gray-700">Thời gian</label>
                    <select id="time" name="time" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <option value="ca1">Ca 1 (4h - 11h)</option>
                        <option value="ca2">Ca 2 (11h - 19h)</option>
                        <option value="ca3">Ca 3 (19h - 4h)</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="cv" class="block text-sm font-medium text-gray-700">Loại công việc</label>
                    <select id="cv" name="cv" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="cv1">Ca Trực</option>
                        <option value="cv2">Ca Khám</option>
                    </select>
                </div>
                <div class="mb-6">
                    <label for="employee" class="block text-sm font-medium text-gray-700">Điều dưỡng</label>
                    <select id="employee" name="employee" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <?php  
                        while($r2 = $tblSP2->fetch_assoc()){
                        echo '<option value="'.$r2['MaNV'].'">'.$r2['Hoten'].' </option>'; 
                        }
                        ?> 
                    </select>
                </div>
                <div class="mb-6">
                    <label for="ck" class="block text-sm font-medium text-gray-700">Chuyên Khoa</label>
                    <select id="ck" name="ck" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    <?php 
                        while($r3 = $tblSP3->fetch_assoc()){
                            echo '<option value="'.$r3['maChuyenKhoa'].'">'.$r3['tenChuyenKhoa'].' </option>'; 
                        }
                        ;?>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button name="luu" type="button" id="saveSchedule" class="bg-blue-500 text-white px-4 py-2 rounded">Xem</button>
                    <button name="qw" type="submit" id="saveSchedule" class="bg-blue-500 text-white px-4 py-2 rounded">Lưu</button>
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
    // Lấy thông tin từ dropdown Chuyên Khoa
    const ckElement = form.ck;
    const ckValue = ckElement.value; // Mã chuyên khoa
    const ckText = ckElement.options[ckElement.selectedIndex].text; // Tên chuyên khoa

    // Lấy thông tin từ dropdown Phòng
    const roomElement = form.room;
    const roomValue = roomElement.value; // Mã phòng
    const roomText = roomElement.options[roomElement.selectedIndex].text; // Tên phòng
// Lấy thông tin từ dropdown Phòng
const cvElement = form.cv;
    const cvValue = cvElement.value; // Mã phòng
    const cvText = cvElement.options[cvElement.selectedIndex].text; // Tên phòng
    // Lấy thông tin từ dropdown Ca
    const timeElement = form.time;
    const timeValue = timeElement.value; // Mã ca
    const timeText = timeElement.options[timeElement.selectedIndex].text; // Thông tin ca

    // Lấy thông tin từ dropdown Nhân Viên
    const employeeElement = form.employee;
    const employeeValue = employeeElement.value; // Mã nhân viên
    const employeeText = employeeElement.options[employeeElement.selectedIndex].text; // Tên nhân viên
            
    // Tìm nút dựa trên ngày đã chọn
    const button = document.querySelector(`.add-schedule[data-date="${selectedDate}"]`);
    
    if (button) {
        // Cập nhật nội dung của nút
        button.innerHTML = `${employeeText}<br>Chuyên Khoa: ${ckText}<br>${timeText}<br>${roomText}<br>${cvText}`;
        button.classList.remove('bg-green-500');
        button.classList.add('bg-yellow-500');
    }
    // Ẩn form và hiển thị thông báo thành công
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
                if (buttonDate >= new Date()-1) {
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