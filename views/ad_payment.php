<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/payment.css ?<?php echo time(); ?>">

    <title>Document</title>
</head>
<body>
    <div class="main-container ">
        <div class="main-dash">
            <div class="search d-flex">
                <input class="form-control text-center" type="text" placeholder="ชื่อ ,บ้านเลขที่">
                <button class="btn d-flex"><i class="bi bi-search"></i>ค้นหา</button>
            </div>

            <div class="header-dash d-flex mt-2">
                <button class="btn">รายการทั้งหมด</button>
                <button class="btn">รอดำเนินการ</button>
                <button class="btn">ชำระแล้ว</button>
                <button class="btn">ค้างชำระ</button>
                <button class="btn">ชำระล่วงหน้า</button>
                <div class="noti-pay">
                    <button class="btn">ใบแจ้งชำระ</button>
                </div>
            </div>
            <div class="table-dash">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">ชื่อ</th>
                    <th scope="col" class="text-center">บ้านเลขที่</th>
                    <th scope="col" class="text-center">วันที่แจ้ง</th>
                    <th scope="col" class="text-center">สถานะ</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th class="text-nowrap">นางสาวฐา วันดี</th>
                    <td class="text-center">241/1</td>
                    <td class="text-center">1 ม.ค 65</td>
                    <td class="text-center">ชำระแล้ว</td>
                    <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                    <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                    </tr>
                    <tr>
                    <th class="text-nowrap">นางสาวฐา วันดี</th>
                    <td class="text-center">241/1</td>
                    <td class="text-center">1 ม.ค 65</td>
                    <td class="text-center">ชำระแล้ว</td>
                    <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                    <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                    </tr>
                    <tr>
                    <th class="text-nowrap">นางสาวฐา วันดี</th>
                    <td class="text-center">241/1</td>
                    <td class="text-center">1 ม.ค 65</td>
                    <td class="text-center">ชำระแล้ว</td>
                    <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                    <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                    </tr>
                    <tr>
                    <th class="text-nowrap">นางสาวฐา วันดี</th>
                    <td class="text-center">241/1</td>
                    <td class="text-center">1 ม.ค 65</td>
                    <td class="text-center">ชำระแล้ว</td>
                    <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                    <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
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