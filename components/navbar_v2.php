<?php 
 $title=$_GET["title"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

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
                            <li><button class="dropdown-item" type="button">Amornsap village ได้ส่งใบแจ้งชำระประจำเดือนมกราคม มาให้คุณ  </button></li>
                            <li><button class="dropdown-item" type="button">Amornsap village ได้ส่งใบเสร็จประจำเดือนเดือนกุมภาพันธ์  มาให้คุณ  </button></li>
                            <li><button class="dropdown-item" type="button">Amornsap village ได้ส่งใบแจ้งชำระ เดือนกุมภาพันธ์  มาให้คุณ  </button></li>
                            <li><button class="dropdown-item" type="button">Amornsap village ได้ส่งใบเสร็จประจำเดือนกุมภาพันธ์  มาให้คุณ </button></li>
                        </ul>
                    </div>
                </div>
                <!-- Profile nav -->
                <div class="box_lg">
                    <div class="dropdown">
                        <img id="dropdownMenu2" class="vlg_lg_profile mx-3" data-bs-toggle="dropdown" aria-expanded="false" src="../assets/lg-profile.png" alt="" width="40">
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
                <!-- End profile -->
            </div>
        </div>
        
    </nav>
    
</body>
</html>