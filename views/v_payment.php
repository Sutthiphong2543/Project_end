<?php 
    require_once"../components/session.php";
    require_once"../components/check_villager.php";
    
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

    <link rel="stylesheet" href="../css/vlg_payment.css?<?php echo time(); ?>">
    <title>Villager Payment</title>
</head>
<body>
    <?php 
        require_once '../components/template_vlg.php';
    ?>
    <div class="main-container">
        <div class="vlg_payment">
            <!-- Header -->
            <div class="pay_header">
                <!-- BTN -->
                <div class="pay_btn">
                    <div class="pay_left">
                        <button class="btn tablink" onclick="openPayment_v('re_pay', this, 'orange')" id="defaultOpen">ใบแจ้งชำระ</button>
                        <button class="btn tablink" onclick="openPayment_v('table-history', this, 'orange')">ประวัติการชำระ</button>
                    </div>
                    <div class="pay_right">
                        <button class="btn "><i class="bi bi-sliders mx-1" ></i>เดือน</button>
                    </div>
                </div>
            </div>
            <!-- content -->
            <div id="re_pay" class="tabContent">
                <hr>
                <!-- box -->
                <div class="pay_content">
                    <!-- content inside -->
                    <div class="pay_box">
                        <div class="p_box pay_box1">
                            <h4 class="text-center">ใบแจ้งชำระค่าส่วนกลางประจำเดือนมกราคม</h4>
                            <p class="text-center">**** กรุณาชำระก่อนวันที่ 7 กุมพาพันธ ์****</p>
                        </div>
                        <!-- table content -->
                        <div class="p_box pay_box2">
                            <div class="pay_table">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">รายการ</th>
                                        <th scope="col" class="text-end">จำนวน (บาท)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="prg">ค่าส่วนกลาง</td>
                                            <td class="text-end prg">100</td>
                                        </tr>
                                        <tr>
                                            <td class="prg">ค่าไฟ</td>
                                            <td class="text-end prg">-</td>
                                        </tr>
                                        <tr>
                                            <td class="prg">ค่าน้ำ</td>
                                            <td class="text-end prg">-</td>
                                        </tr>
                                        <tr>
                                            <td class="prg">อื่นๆ</td>
                                            <td class="text-end prg">-</td>
                                        </tr>
                                        <tr>
                                            <td class="prg">ค้างชำระ</td>
                                            <td class="text-end prg">100</td>
                                        </tr>
                                        <tr>
                                            <td scope="col">รวม</td>
                                            <td scope="col" class="text-end ">200</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                        <!-- button click -->
                        <div class="p_box pay_box3">
                            <button class="btn btn-success">แจ้งชำระ</button>
                            <button  class="b-ams btn"><i class="bi bi-paperclip mx-1"></i>แนบหลักฐานการชำระ</button>
                        </div>
                        
                        
                    </div>
                </div>
            </div>
            <!-- end payment -->

            <div class="history_pay_v">
                <hr>
                <div id="table-history" class="tabContent">
                <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">เดือน</th>
                                <th scope="col" class="text-center">ใบเสร็จ</th>
                                <th scope="col" class="text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th class="text-nowrap">มกราคม</th>
                                <td class="text-center"><p class="bg-info text-white"><i class="bi bi-eye-fill mx-2"></i>ดูข้อมูล</p></td>
                                <td class="text-center">ชำระแล้ว</td>
                                </tr>
                            </tbody>
                            </table>
                </div>
            </div>
        </div>
        
        
    </div>

    <script>
    function openPayment_v(villagerDetail, elmnt, color) {
        // Hide all elements with class="tabcontent" by default */
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabContent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Remove the background color of all tablinks/buttons
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }

            // Show the specific tab content
            document.getElementById(villagerDetail).style.display = "block";

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();

    </script>
</body>
</html>