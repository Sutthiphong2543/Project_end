<?php 
    require_once"../components/session.php";
    require_once"../components/check_villager.php";
    require_once"../config/connect.php";

    $invoiceVlg = $controller->getInvoice($id); // id เอามาจาก check_villager
    $invoiceVlg_history = $controller->getInvoice_history($id); // id เอามาจาก check_villager
    $invoiceVlg_waiting = $controller->getInvoice_waiting($id); // id เอามาจาก check_villager


    

    // print_r($invoiceVlg) ;

    
    // $date = new DateTime();
    // $date_real = $date->format('Y-m-d ');
    // echo 'real date:'.$date_real;
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

    <!-- Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <!-- .. -->
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
                        <button class="btn tablink" onclick="openPayment_v('table-waiting', this, 'orange')">รอดำเนินการ</button>
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
                    <?php foreach($invoiceVlg as $key){  ?>
                    <div class="pay_box">
                        <div class="p_box pay_box1">
                            <h4 class="text-center">ใบแจ้งชำระค่าส่วนกลางประจำเดือน<?php echo $controller->checkMonth($key['month']);?></h4>
                            <p class="text-center">**** กรุณาชำระก่อนวันที่ <?php echo $key['date_end']  ?>****</p>
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
                                            <td class="text-end prg"><?php echo $key['invoice_cmf'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="prg">ค่าไฟ</td>
                                            <td class="text-end prg"><?php echo $key['elect_bill'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="prg">ค่าน้ำ</td>
                                            <td class="text-end prg"><?php echo $key['water_bill'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="prg">อื่นๆ</td>
                                            <td class="text-end prg"><?php echo $key['another_bill'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="prg">ค้างชำระ</td>
                                            <td class="text-end prg"><?php  ?></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">รวม</td>
                                            <td scope="col" class="text-end "><?php echo $totalInvoice =$key['invoice_cmf']+$key['elect_bill']+$key['water_bill']+$key['another_bill'] ?></td>
                                        </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- button click -->
                        <div class="p_box pay_box3">
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#vlg_pay_step1_modal">แจ้งชำระ</button>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- end payment -->

            <div class="history_pay_v">
                <div id="table-waiting" class="table-history tabContent">
                <table id="waiting_pay_vlg" class="table">
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">เดือน</th>
                                <th scope="col" class="text-center">ใบเสร็จ</th>
                                <th scope="col" class="text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($invoiceVlg_waiting as $ice_waiting){ ?>
                                <tr>
                                <th class="text-nowrap"><?php echo $controller->checkMonth($ice_waiting['month']) ?></th>
                                <td class="text-center"><p class="bg-info text-white"><i class="bi bi-eye-fill mx-2"></i>ดูข้อมูล</p></td>
                                <td class="text-center"><?php echo $controller->checkStatusPay($ice_waiting['status_pay']) ?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                            </table>
                </div>
                <div id="table-history" class="table-history tabContent">
                <table id="history_pay_vlg" class="table">
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">เดือน</th>
                                <th scope="col" class="text-center">ใบเสร็จ</th>
                                <th scope="col" class="text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($invoiceVlg_history as $ice_history){ ?>
                                <tr>
                                <th class="text-nowrap"><?php echo $controller->checkMonth($ice_history['month']) ?></th>
                                <td class="text-center"><p class="bg-info text-white"><i class="bi bi-eye-fill mx-2"></i>ดูข้อมูล</p></td>
                                <td class="text-center"><?php echo $controller->checkStatusPay($ice_history['status_pay']) ?></td>
                                </tr>
                            <?php }?>
                            </tbody>
                            </table>
                </div>
            </div>
        </div>
        
        
    </div>

    <!-- Modal payment vlg -->

<!-- Modal -->
<div class="modal fade" id="vlg_pay_step1_modal" tabindex="-1" aria-labelledby="modalStep1" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
        <!-- Content -->
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <!-- <div class="headerFormPayVlg">
                    <h4 class="text-center">แจ้งชำระ</h4>
                </div> -->
                <div class="contentFormPayVlg">
                    <div class="form-group " >
                        <label for="selectMonth">เลือกจำนวนเดือนที่ต้องชำระ</label>
                        <select class="form-select mt-2" name="payMonth" id="payMonth" aria-label="Select month to pay">
                            <option selected value="1">1 เดือน</option>
                            <option value="2">2 เดือน</option>
                            <option value="3">3 เดือน</option>
                            <option value="4">4 เดือน</option>
                            <option value="5">5 เดือน</option>
                            <option value="6">6 เดือน</option>
                            <option value="7">7 เดือน</option>
                            <option value="8">8 เดือน</option>
                            <option value="9">9 เดือน</option>
                            <option value="10">10 เดือน</option>
                            <option value="11">11 เดือน</option>
                            <option value="12">12 เดือน</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="totalPay">ยอดรวม</label>
                        <input type="text" class="form-control" value="0" readonly>
                    </div>


                </div>
            </form>
        </div>
        <!-- End Content -->
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

        // ................................................................
        // .........>> Table <<............................................
        $(document).ready(function() {
            $('#history_pay_vlg').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#waiting_pay_vlg').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );

        // calculator
       
        var payMonth = document.getElementById("payMonth");
        var outputPayMonth = document.getElementById("outputPayMonth");

        input.addEventListener( "payMonth", function() {
            var value = payMonth.value;
            outputPayMonth.innerHTML=value;
        })
        
    </script>
</body>
</html>