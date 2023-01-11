<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/vlg_sidebar.css?<?php echo time(); ?>">
    <title>Sidebar</title>
</head>
<body>
    <div class="vlg_sidebar">
        <div class="vlg_container d-flex">
            <div class="main-header">
                <img id="vlg-lg_home" src="../assets/LogoHome.png" alt="">
            </div>
            <h3 class="my-1">mornsap village</h3>
        </div>
        <!-- List -->
        <div class="vlg_list-group">
            <div class="item-group">
                <img src="../assets/vlg_dashboard.svg" width="30">
                <a href="../views/v_dashboard.php?title=<?php echo "Dashboard" ?>">Dashboard</a>
            </div>
            <div class="item-group">
                <img src="../assets/vlg_pay.svg" width="30">
                <a href="../views/v_payment.php?title=<?php echo "แจ้งชำระ" ?>">แจ้งชำระ</a>
            </div>
            <div class="item-group">
                <img src="../assets/vlg_noti.svg" width="30">
                <a href="../views/v_repair.php?title=<?php echo "แจ้งซ่อมและร้องเรียน" ?>">แจ้งซ่อมและร้องเรียน</a>
            </div>
            <div class="item-group">
                <img src="../assets/vlg_logout.svg" width="30">
                <a href="">ออกจากระบบ</a>
            </div>
        </div>
        
    </div>
</body>
</html>