<?php 
    require_once"../components/session.php";
    require_once"../components/check_admin.php";
    require_once"../config/connect.php";

    $dataInvoice_1 = $controller->getInvoice_1();
    $dataInvoice_2 = $controller->getInvoice_2();
    $dataInvoice_3 = $controller->getInvoice_3();
    $dataInvoice_4 = $controller->getInvoice_4();
    $dataInvoice_5 = $controller->getInvoice_5();





    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/payment.css ?<?php echo time(); ?>">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    

    <title>Payment</title>
</head>
<body>
<?php require_once'../components/ad_template.php'?>
<!-- .......................... -->
    <div class="main-container ">
        <div class="main-dash">
            <div class="header-dash d-flex mt-2">
                <button class="btn tablink" onclick="openVillagerPay('pay-1', this, 'orange')" id="defaultOpen">รายการใบแจ้งชำระ</button>
                <button class="btn tablink" onclick="openVillagerPay('pay-2', this, '#F1C40F')">รอดำเนินการ</button>
                <button class="btn tablink" onclick="openVillagerPay('pay-3', this, '#48C9B0')">ชำระแล้ว</button>
                <button class="btn tablink" onclick="openVillagerPay('pay-4', this, '#E74C3C')">ค้างชำระ</button>
                <button class="btn tablink" onclick="openVillagerPay('pay-5', this, '#3498DB')">ชำระล่วงหน้า</button>
                <div class="noti-pay">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#notiPaymentModal">ใบแจ้งชำระ</button>
                </div>
            </div>
            <!-- Table -->
            <div class="box-table-pay">
                <!-- รายการทั้งหมด -->
                
                <div id="pay-1" class="table-pay tabContent">
                <table id="table-pay-1" class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่ส่งใบแจ้งชำระ</th>
                        <th scope="col" class="text-center">เดือน</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataInvoice_1 as $invoice_1){ ?>
                        <tr>
                        <th class="text-nowrap"><?php echo $invoice_1['villager_fname'].' '.$invoice_1['villager_lname'] ?></th>
                        <td class="text-center"><?php echo $invoice_1['villager_housenum'] ?></td>
                        <td class="text-center"><?php echo $invoice_1['date_start'] ?></td>
                        <td class="text-center"><?php echo $controller->checkMonth($invoice_1['month']) ?></td>
                        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_1['status_pay']) ?></td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        </tr>
                        <?php }?>
                    </tbody>
                    </table>
                </div>
                <!-- รอดำเนินการ -->
                <div id="pay-2" class="table-pay tabContent">
                <table id="table-pay-2" class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้งชำระ</th>
                        <th scope="col" class="text-center">เดือน</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataInvoice_2 as $invoice_2){ ?>
                        <tr>
                        <tr>
                        <th class="text-nowrap"><?php echo $invoice_2['villager_fname'].' '.$invoice_2['villager_lname'] ?></th>
                        <td class="text-center"><?php echo $invoice_2['villager_housenum'] ?></td>
                        <td class="text-center"><?php echo $invoice_2['date_pay'] ?></td>
                        <td class="text-center"><?php echo $controller->checkMonth($invoice_2['month']) ?></td>
                        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_2['status_pay']) ?></td>
                        <td class="text-center"> <button class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#getPaymentModal" >ตรวจสอบการชำระ</i> <i class="bi bi-zoom-in mx-2"></i></button> </td>
                        
                        </tr>
                        <?php }?>
                    </tbody>
                    </table>
                </div>
                <!-- ชำระแล้ว -->
                <div id="pay-3" class="table-pay tabContent">
                <table id="table-pay-3" class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้ง</th>
                        <th scope="col" class="text-center">เดือนที่แจ้ง</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataInvoice_3 as $invoice_3){ ?>
                        <tr>
                        <th class="text-nowrap"><?php echo $invoice_3['villager_fname'].' '.$invoice_3['villager_lname'] ?></th>
                        <td class="text-center"><?php echo $invoice_3['villager_housenum'] ?></td>
                        <td class="text-center"><?php echo $invoice_3['date_start'] ?></td>
                        <td class="text-center"><?php echo $controller->checkMonth($invoice_3['month']) ?></td>
                        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_3['status_pay']) ?></td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        </tr>
                    <?php }?>
                        
                    </tbody>
                    </table>
                </div>
                <!-- ค้างชำระ -->
                <div id="pay-4" class="table-pay tabContent">
                <table id="table-pay-4" class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้ง</th>
                        <th scope="col" class="text-center">เดือนที่แจ้ง</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataInvoice_4 as $invoice_4){ ?>
                        <tr>
                        <th class="text-nowrap"><?php echo $invoice_4['villager_fname'].' '.$invoice_4['villager_lname'] ?></th>
                        <td class="text-center"><?php echo $invoice_4['villager_housenum'] ?></td>
                        <td class="text-center"><?php echo $invoice_4['date_start'] ?></td>
                        <td class="text-center"><?php echo $controller->checkMonth($invoice_4['month']) ?></td>
                        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_4['status_pay']) ?></td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        </tr>
                    <?php }?>
                    </tbody>
                    </table>
                </div>
                <!-- ชำระล่วงหน้า -->
                <div id="pay-5" class="table-pay tabContent">
                <table id="table-pay-5" class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้ง</th>
                        <th scope="col" class="text-center">เดือนที่แจ้ง</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataInvoice_5 as $invoice_5){ ?>
                        <tr>
                        <th class="text-nowrap"><?php echo $invoice_5['villager_fname'].' '.$invoice_5['villager_lname'] ?></th>
                        <td class="text-center"><?php echo $invoice_5['villager_housenum'] ?></td>
                        <td class="text-center"><?php echo $invoice_5['date_start'] ?></td>
                        <td class="text-center"><?php echo $controller->checkMonth($invoice_5['month']) ?></td>
                        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_5['status_pay']) ?></td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        </tr>
                    <?php }?>
                    </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal ใบแจ้งชำระ -->
    <div class="modal fade" id="notiPaymentModal" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Form -->
                    <form action="../components/create-invoice.php" method="POST">
                    <div class="modal-payment1">
                        <!-- payment1 -->
                        <div class="payment-1">
                            <!-- title head -->
                            <div class="head-pay">
                                <h2 class="text-center">ใบแจ้งชำระค่าส่วนกลาง</h2>
                            </div>
                            <hr>
                            <!-- Detail vlg  -->
                            <div class="detail-vlg-pay">
                                <div class="d-vlg-p">
                                        <div class="form-group">
                                            <label>เดือน : </label>
                                            <select size="1" name="month" class="form-control select-mty" required>
                                                <option selected >เลือกเดือน</option>
                                                <option value="1">มกราคม</option>
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
                                        </div>
                                        <div class="form-group">
                                            <label>ค่าส่วนกลาง : </label>
                                            <input type="text" name="invoice-cmf" class="form-control" value="100" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>ค่าไฟ : </label>
                                            <input type="text" name="elect-bill" class="form-control" value="0" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>ค่าน้ำ : </label>
                                            <input type="text" name="water-bill" class="form-control" value="0" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label>อื่นๆ : </label>
                                            <input type="text" name="another-bill" class="form-control" value="0" readonly>
                                        </div>
                                </div>
                                <!-- Right -->
                                <div class="date-pay-right">
                                    <div class="form-group">
                                            <label>วันที่แจ้งชำระ :</label>
                                            <input type="date" name="date-start" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>ชำระก่อนวันที่ :</label>
                                        <input type="date" name="date-end" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- btn  -->
                        <div class="payment-3">
                            <div class="btn-pay-vlg">
                                <button type="submit" name="create-invoice" class="btn btn-vlg-success">สร้าง</button>
                                <button class="btn btn-vlg-close"data-bs-dismiss="modal" >ยกเลิก</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

     <!-- Modal ใบเสร็จรับเงิน -->
    
        <div class="modal fade" id="getPaymentModal" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="main-detail-payment">
                        <div class="container">
                            <div class="header">
                                <h4 class="text-center">รายละเอียดการแจ้งชำระ</h4>
                            </div>
                            <hr>
                            <div class="content-detail-payment">
                                <div class="detail-left">
                                    <div class="pre-img-slip">
                                        <img id="img-slip" src="../upload/Slip/1149281660.jpg" >
                                    </div>
                                </div>
                                <div class="detail-right">
                                    <div class="detail-right-content">
                                        <div class="form-detail">
                                            <label class="form-label">บ้านเลขที่ : 241/119</label>
                                        </div>
                                        <div class="form-detail">
                                            <label class="form-label">ชื่อ : Sutthiphong Singkham</label>
                                        </div>
                                        <div class="form-detail">
                                            <label class="form-label">ค้างชำระ : 0 บาท</label>
                                        </div>
                                        <div class="form-detail">
                                            <label class="form-label">ชำระล่วงหน้า : 0 เดือน</label>
                                        </div>
                                        <div class="form-detail">
                                            <label class="form-label">วันที่แจ้งชำระ : 16/02/2565 18.30</label>
                                        </div>
                                        <div class="btn-detail-payment">
                                            <button class="btn btn-detail-success">ยืนยันการชำระ</button>
                                            <button class="btn btn-vlg-close"data-bs-dismiss="modal" >ยกเลิก</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                  
                    
                </div>
            </div>
        </div>

<script>
    // table
        $(document).ready(function() {
            $('#table-pay-1').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#table-pay-2').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#table-pay-3').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#table-pay-4').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#table-pay-5').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
    // tab
    function openVillagerPay(villagerDetail, elmnt, color) {
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

        // Open detail slip

</script>

</body>
</html>