<?php
    ob_start(); // Bật chế độ đệm đầu ra
    session_start();

    include_once('controller/cMain-Staff.php');
    $main_staff = new CMain_Staff;
    include_once('layout/header-staff.php');
    
    $main_staff->getChucNang($_SESSION['dn']);
    include_once('layout/nav-staff.php');
    if(isset($_GET['page-sub'])){
        $page = $_GET['page-sub'];
    } else {
        $page = 'trangchu';
    }

    switch($_SESSION['dn']){
        case 1: $user = 'admin';
            break;
        case 2: $user = 'bacsi';
            break;
        case 3: $user = 'dieuduong';
            break;
        case 4: $user = 'thungan';
            break;
        case 5: $user = 'duocsi';
            break;
        case 6: $user = 'tieptan';
            break;
        case 7: $user = 'quanlikhoa';
    }
    if(file_exists('view/'.$user.'/'.$page.'/index.php')){
        include_once('view/'.$user.'/'.$page.'/index.php');
    }else {
        include_once('view/page-viewuser/404/index.php');
    }
    include_once('layout/footer-staff.php');
?>
                        
                            
                       
                        
      