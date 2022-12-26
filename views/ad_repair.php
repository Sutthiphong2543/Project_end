<?php 
    require_once"../components/session.php";
    require_once"../components/check_admin.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/repair.css ?<?php echo time(); ?>">
    <title>Repair</title>
</head>
<body>
    <div class="main-container ">
        <div class="main-repair">
            <div class="header-repair d-flex mt-2">
                        <button class="btn">แจ้งซ่อม</button>
                        <button class="btn">ร้องเรียน</button>
                    </div>
                    <div class="table-repair">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">ชื่อ</th>
                            <th scope="col" class="text-center">บริเวณ</th>
                            <th scope="col" class="text-center">เรื่อง</th>
                            <th scope="col" class="text-center">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th class="text-nowrap">นางสาวฐา วันดี</th>
                            <td class="text-center">241/1</td>
                            <td class="text-center">ไฟหน้าบ้านเสีย</td>
                            <td class="text-center">รอดำเนินการ</td>
                            </tr>
                            <tr>
                            <th class="text-nowrap">นางสาวฐา วันดี</th>
                            <td class="text-center">241/1</td>
                            <td class="text-center">ไฟหน้าบ้านเสีย</td>
                            <td class="text-center">รอดำเนินการ</td>
                            </tr>
                            <tr>
                            <th class="text-nowrap">นางสาวฐา วันดี</th>
                            <td class="text-center">241/1</td>
                            <td class="text-center">ไฟหน้าบ้านเสีย</td>
                            <td class="text-center">รอดำเนินการ</td>
                            </tr>
                           
                            
                        </tbody>
                        </table>
                    </div>
            </div>
    
        
    </div>

    <!-- include template -->
    <?php include_once '../components/sidebar.php' ?>
</body>
</html>