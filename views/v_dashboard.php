<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/vlg_dashboard.css?<?php echo time(); ?>">
    <title>Document</title>
</head>
<body></body>
    <?php 
        require_once '../components/template_vlg.php';
    ?>
    
    <div class="main-container">
        <div class="vlg_dashboard">
            <div class="news">
                <div class="title_news text-center">
                    <h1>ข่าวสารและประกาศ</h1>
                </div>
                <div class="content_news">
                    <p>
                    กปภ.สาขาพระนครศรีอยุธยา ประกาศหยุดส่งจ่ายน้ำชั่วคราว  ในวันที่ 18 มกราคม 2565 
                    ตั้งแต่เวลา 10.00-15.00 น. เพื่อทำการตัดประสานท่อเมนจ่ายน้ำ ขนาด ขนาด 400 มม. 
                    บริเวณถนนสีขาว หมู่ที่ 13 ต.คลองหนึ่ง อ.คลองหลวง จ.ปทุมธานี จากการดำเนินการดัง
                    กล่าวส่งผลกระทบให้พื้นที่ ถนนสีขาว , ซอยแมนฮัตตัน จนถึงวัดคุณหญิงส้มจีน หมู่ที่ 14 
                    ต.คลองหนึ่งอ.คลองหลวงจ.ปทุมธานีและพื้นที่ใกล้เคียงน้ำประปาจะไหลอ่อนถึงไม่ไหลเลยจะ
                    ดำเนินการแล้วเสร็จในช่วงเวลาประมาณ 20.00 น. ของวันที่ 18/ม.ค/2565 
                    </p>
                </div>
                
            </div>
            
            <div class="box1">
            <hr>
                <div class="dash_header">
                    <div class="title_head">
                        <h4>สรุปรายรับ-รายจ่าย</h4>
                    </div>
                    <div class="btn_header">
                        <!-- <div class="dropdown">
                        <button class="btn btn-dash" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" ><i class="bi bi-sliders" ></i> เดือน</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><button class="dropdown-item" type="button">Action</button></li>
                                <li><button class="dropdown-item" type="button">Another action</button></li>
                                <li><button class="dropdown-item" type="button">Something else here</button></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                        <button class="btn btn-dash" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" ><i class="bi bi-sliders" ></i> ไตรมาส</button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                <li><button class="dropdown-item" type="button">Action</button></li>
                                <li><button class="dropdown-item" type="button">Another action</button></li>
                                <li><button class="dropdown-item" type="button">Something else here</button></li>
                            </ul>
                        </div> -->


                        <!--Month  -->
                        <select size="1" name="month" class="select-mty">
                            <option selected value="1">มกราคม</option>
                            <option value="2">กุมภาพันธ์</option>
                            <option value="3">มีนาคม</option>
                            <option value="4">เมษายน</option>
                            <option value="5">พฤษภาคม</option>
                            <option value="6">มิถุนายน</option>
                            <option value="7">กรกฎาคม</option>
                            <option value="8">สิงหาคม</option>
                            <option value="9">กันยายน</option>
                            <option value="10">ตุลาคม</option>
                            <option value="11">พฤศจิกายน</option>
                            <option value="12">ธันวาคม</option>
                        </select>

                        <!-- ไตรมาส -->
                        <select size="1" name="trimas" class="select-mty">
                            <option selected >ไตรมาส</option>
                            <option value="2">ไตรมาส 1</option>
                            <option value="3">ไตรมาส 2</option>
                            <option value="4">ไตรมาส 3</option>
                            <option value="5">ไตรมาส 4</option>
                        </select>

                        <!-- Year -->
                        <select name="select" class="select-mty">
                            <?php 
                            for($i = date('Y') ; $i >= 1999; $i--){
                                echo "<option>$i</option>";
                            }
                            ?>
                        </select>

                    </div>
                </div>

                <!-- Table -->
                <div class="dash_table">
                    <table class="table">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Handle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    
</body>
</html>