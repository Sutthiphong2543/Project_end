<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <link rel="stylesheet" href="../css/ad_template.css?<?php echo time(); ?>">
    <title>Sidebar</title>
</head>
<body>
    <div class="temp_sidebar">
        <div class="temp-box-area">
            <div class="temp-header-logo">
                <div class="temp-group-header">
                    <img id="vlg-lg_home" src="../assets/LogoHome.png" >
                    <h3 class="temp-head-title">mornsap village</h3>
                </div>

            </div>
            <div class="temp-list">
                <div class="temp-list-group mt-3">
                    <div class="temp-side-group">
                        <img src="../assets/Logo_Sidebar/lg-dasboard2.svg" alt="lg-dashboard" width="30">
                        <a class="temp-text-a " href="../views/ad_dashboard.php?title=dashboard" >Dashboard</a>
                    </div>
                    <div class="temp-side-group">
                        <img src="../assets/Logo_Sidebar/lg-pay2.svg" alt="lg-dashboard" width="30" >
                        <a class="temp-text-a"  href="../views/ad_payment.php?title=payment" >การแจ้งชำระ</a>
                    </div>
                    <div class="temp-side-group">
                        <img src="../assets/Logo_Sidebar/lg-income2.svg" alt="lg-dashboard" width="30">
                        <a class="temp-text-a"  href="../views/ad_income.php?title=IOcome" >รายรับ-รายจ่าย</a>
                    </div>
                    <div class="temp-side-group">
                        <img src="../assets/Logo_Sidebar/lg-news2.svg" alt="lg-dashboard" width="30">
                        <a class="temp-text-a"  href="../views/ad_news.php?title=news" >ประกาศข่าวสาร</a>
                    </div>
                    <div class="temp-side-group">
                        <img src="../assets/Logo_Sidebar/lg-notify2.svg" alt="lg-dashboard" width="30">
                        <a class="temp-text-a"  href="../views/ad_repair.php?title=notify" >แจ้งซ่อมและร้องเรียน</a>
                    </div>
                    <div class="temp-side-group">
                        <img src="../assets/Logo_Sidebar/lg-people2.svg" alt="lg-dashboard" width="30">
                        <a class="temp-text-a"  href="../views/ad_villager.php?title=villagers" >ข้อมูลลูกบ้าน</a>
                    </div>
                    <div class="temp-side-group">
                        <img src="../assets/Logo_Sidebar/lg-logout2.svg" alt="lg-dashboard" width="30">
                        <a class="temp-text-a"  href="../components/logout.php" >ออกจากระบบ</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
<script>
    
</script>
</body>
</html>