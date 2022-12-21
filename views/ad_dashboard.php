<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://www.chartjs.org/samples/2.9.4/utils.js">

    <link rel="stylesheet" href="../css/dashboard.css ?<?php echo time(); ?>" >
    <title>Document</title>
</head>
<body>
    <div class="main-container ">
        <div class="content1">
                <div class="container ">
                    <div class="income text-center shadow-sm p-3 mb-5 bg-body rounded">
                        <h4>รายรับ</h4>
                        <h5>25,000 บาท</h5>
                    </div>
                    <div class="expenses text-center shadow-sm p-3 mb-5 bg-body rounded">
                        <h4>รายจ่าย</h4>
                        <h5>20,000 บาท</h5>
                    </div>
                    <div class="remaining text-center shadow-sm p-3 mb-5 bg-body rounded">
                        <h4>คงเหลือ</h4>
                        <h5>5,000 บาท</h5>
                    </div>
                </div>
        </div>
        <div class="content2 text-center">
            <div class="head-ct2 ml-3 d-flex ">
                    <button class="btn"> ไตรมาส 1</button>
                    <button class="btn"> ไตรมาส 2</button>
                    <button class="btn"> ไตรมาส 3</button>
                    <button class="btn"> ไตรมาส 4</button>
                    <div class="dropdown">
                        <button class="btn" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" ><i class="bi bi-sliders" ></i> ตัวกรอง</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><button class="dropdown-item" type="button">Action</button></li>
                            <li><button class="dropdown-item" type="button">Another action</button></li>
                            <li><button class="dropdown-item" type="button">Something else here</button></li>
                        </ul>
                    </div>
            </div>
            <div class="chart-container mt-3">
                <canvas id="myChart"></canvas>
            </div>
        </div>
        <div class="content3 text-center ">
            <div class="chart-footer d-flex">
                <div class="chart-container" style="position: relative; height:13vh; width:33vw">
                    <canvas id="ch-success" ></canvas>
                </div>
                <div class="chart-container" style="position: relative; height:13vh; width:33vw">
                    <canvas id="ch_waiting" ></canvas>
                </div>
                <div class="chart-container" style="position: relative; height:13vh; width:33vw">
                    <canvas id="ch_danger" ></canvas>
                </div>
            </div>
            <div class="title-footer d-flex m-2">
                <h3 class="title">ชำระแล้ว</h3>
                <h3 class="title">รอดำเนินการ</h3>
                <h3 class="title">ค้างชำระ</h3>
            </div>
            
        </div>
        <div class="content4 ">
            <div class="ct4-header ">
                <button class="btn btnH">ลูกบ้านค้างชำระ</button>
                <button class="btn btnH">ลูกบ้านชำระล่วงหน้า</button>
            </div>
            <div class="ct4-table">
                <table class="table table-ct4">
                    <thead>
                        <tr>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">บ้านเลขที่</th>
                        <th scope="col">รวม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>นางสาวฐา วันดี</td>
                            <td>241/1</td>
                            <td>2 เดือน</td>
                        </tr>
                        <tr>
                            <td>นางสาวฐา วันดี</td>
                            <td>241/1</td>
                            <td>2 เดือน</td>
                        </tr>
                        <tr>
                            <td>นางสาวฐา วันดี</td>
                            <td>241/1</td>
                            <td>2 เดือน</td>
                        </tr>
                        <tr>
                            <td>นางสาวฐา วันดี</td>
                            <td>241/1</td>
                            <td>2 เดือน</td>
                        </tr>
                        <tr>
                            <td>นางสาวฐา วันดี</td>
                            <td>241/1</td>
                            <td>2 เดือน</td>
                        </tr>
                        <tr>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>tets</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Main-container -->
    </div>
    
    
    <?php include '../components/sidebar.php' ?>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <script src="../javaScript/dashboard.js"></script>
    <!-- chart -->
    
</body>
</html>