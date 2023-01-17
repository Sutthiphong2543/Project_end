<?php
    require_once "session.php";

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
// .......................

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/navbar.css?<?php echo time(); ?>">
    <title>Navbar</title>
</head>
<body>
    <nav class="navbar navbar-light ">
        <div class="container-fluid">
            <div class="title-nav d-flex">
                <h4 class="title"><?php echo $title ?></h4>
            </div>
            <div class="lg-bell">
                <div class="dropdown dd1" >
                    <img id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" src="../assets/bell.png" alt="" width="40">
                
                    <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenu2">
                        <div class="bell-btn d-flex mt-2">
                            <button class="btn btn-success">แจ้งชำระ</button>
                            <button class="btn btn-success">แจ้งซ่อมและร้องเรียน</button>
                        </div>
                        <li><button class="dropdown-item" type="button">บ้านเลขที่ 241/1 แจ้งชำระประจำเดือนมกราคม </button></li>
                        <li><button class="dropdown-item" type="button">บ้านเลขที่ 241/1 แจ้งชำระประจำเดือนมกราคม </button></li>
                        <li><button class="dropdown-item" type="button">บ้านเลขที่ 241/1 แจ้งชำระประจำเดือนมกราคม </button></li>
                        <li><button class="dropdown-item" type="button">บ้านเลขที่ 241/1 แจ้งชำระประจำเดือนมกราคม 5555 </button></li>
                    </ul>
                </div>
            </div>
            <div class="lg-profile dd2">
                <div class="dropdown">
                    <img id="dropdownMenu2" class="mx-3" data-bs-toggle="dropdown" aria-expanded="false" src="../assets/lg-profile.png" alt="" width="40">
                    <ul class="dropdown-menu mt-2" aria-labelledby="dropdownMenu2">
                        <div class="dr-profile mt-2">
                            <img src="../assets/lg-profile.png" alt="" width="55">
                            <i id="edit-profile" class="bi bi-pencil-square"></i>
                        </div>
                        <li><button class="dropdown-item text-center mt-2" type="button">ชื่อ : นางสาวฐา วันจัน </button></li>
                        <li><button class="dropdown-item text-center " type="button">เบอร์โทรศัพท์ : 0954690775</button></li>
                        <li><button class="dropdown-item text-center" type="button">เปลี่ยนรหัสผ่าน</button></li>
                    </ul>
                </div>
            </div>
        </div>
        
    </nav>
</body>
</html>