<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/sidebar.css?<?php echo time(); ?>">
    <title>Document</title>
</head>
<body>
   
    


    <!-- Sidebar -->
    <div class="sidebar">
        <div class="header">
            <img id="lg-home" src="../assets/LogoHome.png" alt="Logo sidebar" width="53" height="50">
            <h2>mornsap village</h2>
        </div>
        <div class="wrapper">
            <div class="list-group mt-3">
                <div class="side-group">
                    <img src="../assets/Logo_Sidebar/lg-dasboard.png" alt="lg-dashboard" width="30">
                    <a href="../views/ad_dashboard.php">Dashboard</a>
                </div>
                <div class="side-group">
                    <img src="../assets/Logo_Sidebar/lg-pay.png" alt="lg-dashboard" width="30" >
                    <a href="../views/ad_payment.php">การแจ้งชำระ</a>
                </div>
                <div class="side-group">
                    <img src="../assets/Logo_Sidebar/lg-income.png" alt="lg-dashboard" width="30">
                    <a href="../views/ad_income.php" >รายรับ-รายจ่าย</a>
                </div>
                <div class="side-group">
                    <img src="../assets/Logo_Sidebar/lg-news.png" alt="lg-dashboard" width="30">
                    <a href="../views/ad_news.php" >ประกาศข่าวสาร</a>
                </div>
                <div class="side-group">
                    <img src="../assets/Logo_Sidebar/lg-notify.png" alt="lg-dashboard" width="30">
                    <a href="../views/ad_repair.php" >แจ้งซ่อม และร้องเรียน</a>
                </div>
                <div class="side-group">
                    <img src="../assets/Logo_Sidebar/lg-people.png" alt="lg-dashboard" width="30">
                    <a href="../views/ad_villager.php" >ข้อมูลลูกบ้าน</a>
                </div>
                <div class="side-group">
                    <img src="../assets/Logo_Sidebar/lg-logout.png" alt="lg-dashboard" width="30">
                    <a href="#" >ออกจากระบบ</a>
                </div>
               </div>
        </div>
    </div>
     <!-- Navbar -->
     <?php include "navbar.php"?>
    <!-- javaScript -->
    <script src="../javaScript/sidebar.js"></script>
</body>
</html>