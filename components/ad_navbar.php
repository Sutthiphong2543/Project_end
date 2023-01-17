<?php 
require_once"../components/session.php";
require_once"../config/connect.php";
require_once"../components/check_admin.php";

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
}

// .....................

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/ad_template.css?<?php echo time(); ?>">

    <title>Ad Navbar</title>
</head>
<body>
    <nav class="navbar tem-navbar navbar-light ">
        <div class="temp-box-nav">
            <div class="container-fluid">
                <h4 class="temp-title-nav"><?php echo $title ?></h4>
                
            </div>
            <div class="temp-right-nav">
                <div class="temp-content-right">
                    <div class="temp-bell">
                        <div class="dropdown" >
                            <img id="temp-drop-bell" data-bs-toggle="dropdown" aria-expanded="false" src="../assets/bell.png" >
                            <ul class="dropdown-menu temp-dd1 mt-2" aria-labelledby="dropdownMenu2">
                                <div class="temp-bell-btn mt-2 ">
                                    <button class="btn btn-success">แจ้งชำระ</button>
                                    <button class="btn btn-success">แจ้งซ่อมและร้องเรียน</button>
                                </div>
                                <li><button class="dropdown-item" type="button">บ้านเลขที่ 241/1 แจ้งชำระประจำเดือนมกราคม </button></li>
                                <li><button class="dropdown-item" type="button">บ้านเลขที่ 241/1 แจ้งชำระประจำเดือนมกราคม </button></li>
                                <li><button class="dropdown-item" type="button">บ้านเลขที่ 241/1 แจ้งชำระประจำเดือนมกราคม </button></li>
                                <li><button class="dropdown-item" type="button">บ้านเลขที่ 241/1 แจ้งชำระประจำเดือนมกราคม 5 </button></li>
                            </ul>
                        </div>
                    </div>
                    <div class="temp-profile">
                        <div class="dropdown">
                            <img id="dropdownMenu2" class="mx-3" data-bs-toggle="dropdown" aria-expanded="false" src="../assets/lg-profile.png" alt="" width="40">
                            <ul class="dropdown-menu temp-dd2 mt-2" aria-labelledby="dropdownMenu2">
                                <div class="dr-profile text-center mt-2">
                                    <img src="../assets/lg-profile.png" alt="" width="55">
                                    <i id="edit-profile" class="bi bi-pencil-square"></i>
                                </div>
                                <li><button class="dropdown-item text-center mt-2" type="button">ชื่อ : <?php echo $legal['legal_entity_fname'].' '.$legal['legal_entity_lname']; ?> </button></li>
                                <li><button class="dropdown-item text-center " type="button">เบอร์โทรศัพท์ : 0954690775</button></li>
                                <li><button class="dropdown-item text-center" type="button">เปลี่ยนรหัสผ่าน</button></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    
</body>
</html>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar tem-navbar navbar-light ">
        <div class="temp-box-nav">
            <div class="container-fluid">
                <h4 class="temp-title-nav">Dashboard</h4>
                <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown link
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </div>
            </div>
            <div class="temp-right-nav">
                <div class="temp-content-right">
                    <div class="temp-bell">
                    
                    </div>
                    <div class="temp-profile">
                        bbb

                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>
</html> -->