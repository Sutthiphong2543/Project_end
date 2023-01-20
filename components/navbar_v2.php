<?php 
require_once"../components/session.php";
require_once"../components/check_villager.php";
require_once"../config/connect.php";

$vlgNotiInvoice = $controller->getInvoice($id);


$title=$_GET["title"];
if($_GET["title"]=="villagers"){
    $title = "ข้อมูลลูกบ้าน";
} else if ($_GET["title"]=="dashboard"){
    $title = "Dashboard";
} else if ($_GET["title"]=="payment"){
    $title = "การแจ้งชำระ";
} else if ($_GET["title"]=="IOcome"){
    $title = "รายรับ-รายจ่าย";
} else if ($_GET["title"]=="news"){
    $title = "ประกาศข่าวสาร";
} else if ($_GET["title"]=="notify"){
    $title = "แจ้งซ่อมและร้องเรียน";
}else if ($_GET["title"]=="editProfile"){
    $title = "ข้อมูลส่วนตัว";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/vlg_navbar.css?<?php echo time(); ?>">
    <title>Navbar</title>
</head>
<body>
    <nav class="navbar navbar-light ">
        <div class="vlg_content">
            <div class="content_left">
                <h4><?php echo $title ?></h4>
            </div>
            <div class="content_right d-flex">
                <div class="box_lg">
                    <div class="dropdown dd1" >
                        <img id="dropdownMenu2" class="vlg_lg_bell" data-bs-toggle="dropdown" aria-expanded="false" src="../assets/bell.png" alt="" >
                    
                        <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenu2">
                            <div class="bell-btn d-flex mt-2">
                                <h5 class="title-bell">การแจ้งเตือน</h5>
                            </div>
                            <?php foreach($vlgNotiInvoice as $notiInvoice){?>
                            <li><a class="text-decoration-none" href="../views/v_payment.php?title=payment"><button class="dropdown-item" type="button">Amornsap village ได้ส่งใบแจ้งชำระประจำเดือน<?php echo $controller->checkMonth($notiInvoice['month']) ?> มาให้คุณ  </button></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <!-- Profile nav -->
                <div class="box_lg">
                    <div class="dropdown">
                        <img id="dropdownMenu2" class="vlg_lg_profile " data-bs-toggle="dropdown" aria-expanded="false"  src="../upload/<?php echo $vlg['img_profile'] ?>">
                        <!-- content dropdown -->
                        <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenu2">
                            <div class="dr-profile mt-2">
                                <img class="rounded-circle" src="../upload/<?php echo $vlg['img_profile'] ?>" width="70" height="70">
                                <a href="../components/vlg_editProfile.php?title=editProfile&id=<?php echo $id ?>" class="idp text-decoration-none"><i id="edit-profile" class="bi bi-pencil-square"></i></a>
                            </div>
                            <li>
                                <a href="../components/vlg_editProfile.php?title=editProfile&id=<?php echo $id ?>" class="text-decoration-none">
                                    <button class="dropdown-item text-center mt-2" type="button">ชื่อ : <?php echo $vlg['villager_fname'].' '.$vlg['villager_lname'] ?> </button>
                                </a>
                            </li>
                            <li>
                                <a href="../components/vlg_editProfile.php?title=editProfile&id=<?php echo $id ?>" class="text-decoration-none">
                                    <button class="dropdown-item text-center " type="button">เบอร์โทรศัพท์ : <?php echo $vlg['villager_tel'] ?></button>
                                </a>
                                
                            </li>
                            <li>
                                <a href="../components/vlg_editProfile.php?title=editProfile&id=<?php echo $id ?>" class="text-decoration-none">
                                    <button class="dropdown-item text-center" type="button">แก้ไขโปรไฟล์</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- End profile -->
            </div>
        </div>
        
    </nav>
    
</body>
</html>