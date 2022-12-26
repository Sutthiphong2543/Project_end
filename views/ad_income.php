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

    <link rel="stylesheet" href="../css/income.css ?<?php echo time(); ?>">
    <title>income</title>
</head>
<body>
    <div class="main-container ">
        <div class="main-income">
            <div class="head-income d-flex">
                <button class="btn">รายรับ</button>
                <button class="btn">รานจ่าย</button>
                <button class="btn">สรุป</button>
                <div class="filter">
                    <button class="btn btn-filer"><i class="bi bi-sliders mx-2" ></i>2022</button>
                </div>
                <div class="printer">
                    <button class="btn btn-printer"><i class="bi bi-printer mx-2" ></i>พิมพ์</button>
                </div>

            </div>
            <div class="table-income">
            <table class="table">
                <thead>
                    <tr class="text-center">
                    <th scope="col" >บ้านเลขที่</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">Jan.</th>
                    <th scope="col">Feb.</th>
                    <th scope="col">Mar.</th>
                    <th scope="col">Apr.</th>
                    <th scope="col">May.</th>
                    <th scope="col">Jun.</th>
                    <th scope="col">Jul.</th>
                    <th scope="col">Aug.</th>
                    <th scope="col">Sep.</th>
                    <th scope="col">Oct.</th>
                    <th scope="col">Nov.</th>
                    <th scope="col">Dec.</th>
                    <th scope="col">รวม</th>
                    
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr >
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td>600</td>
                    </tr>
                    <tr>
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td>600</td>
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