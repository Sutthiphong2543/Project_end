<?php 
    require_once"../components/session.php";
    require_once"../components/check_admin.php";
    require_once"../config/connect.php";
    // get date time thailand
    date_default_timezone_set("Asia/Bangkok");
    $monthNow = date("m");
    $yearNow = date("Y");

    //Get data
    $dataInvoice_1 = $controller->getInvoice_1();
    $dataInvoice_2 = $controller->getInvoice_2();
    $dataInvoice_3 = $controller->getInvoice_3($monthNow,$yearNow);
    $dataInvoice_4 = $controller->getInvoice_4();
    $dataInvoice_5 = $controller->getInvoice_5($monthNow,$yearNow);


    //Filter Year
    $viewFilterMonth = $filterClass->filterMonth();
    $viewFilterYear = $filterClass->filterYear();


    
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
                <table id="table-pay-1" class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่ส่งใบแจ้งชำระ</th>
                        <th scope="col" class="text-center">เดือน</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataInvoice_1 as $index => $invoice_1){ ?>
                        <tr>
                        <td class="text-center"><?php echo $index+1 ?></td>
                        <td class="text-nowrap"><?php echo $invoice_1['villager_fname'].' '.$invoice_1['villager_lname'] ?></td>
                        <td class="text-center"><?php echo $invoice_1['villager_housenum'] ?></td>
                        <td class="text-center"><?php echo $invoice_1['date_start'] ?></td>
                        <td class="text-center"><?php echo $controller->checkMonth($invoice_1['month']) ?></td>
                        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_1['status_pay']) ?></td>
                        <td class="text-center"><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#getPaymentModal<?php echo $invoice_1['invoice_id'] ?>">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></button> </td>
                        </tr>
                        <!-- Modal ใบแจ้งชำระ สถานะ ยังไม่ดำเนินการ -->
    
                        <div class="modal fade" id="getPaymentModal<?php echo $invoice_1['invoice_id'] ?>" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
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
                                                    <div class="pre-img-slip-default">
                                                        <center><h3>รูปสลิป</h3></center>
                                                    </div>
                                                </div>
                                                <div class="detail-right">
                                                    <div class="detail-right-content">
                                                        <div class="form-detail">
                                                            <label class="form-label">บ้านเลขที่ : <?php echo $invoice_1['villager_housenum'] ?></label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ชื่อ : <?php echo $invoice_1['villager_fname'].' '.$invoice_1['villager_lname'] ?></label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ค่าส่วนกลาง : <?php echo $invoice_1['invoice_cmf'] ?> บาท</label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ค้างชำระ : <?php echo $invoice_1['invoice_overdue'] ?> บาท</label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">รวม : <?php echo $invoice_1['total_amount'] ?> บาท</label>
                                                        </div>
                                                        <div class="btn-detail-payment">
                                                            <button class="btn btn-vlg-success"data-bs-dismiss="modal" >ปิด</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                
                                    
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </tbody>
                    </table>
                </div>
                <!-- รอดำเนินการ -->
                <div id="pay-2" class="table-pay tabContent">
                <table id="table-pay-2" class="table  table-striped">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้งชำระ</th>
                        <th scope="col" class="text-center">เดือน</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataInvoice_2 as $index => $invoice_2){ ?>
                        <tr>
                        <tr>
                        <td class="text-center"><?php echo $index+1 ?></td>
                        <td class="text-nowrap"><?php echo $invoice_2['villager_fname'].' '.$invoice_2['villager_lname'] ?></td>
                        <td class="text-center"><?php echo $invoice_2['villager_housenum'] ?></td>
                        <td class="text-center"><?php echo $invoice_2['date_pay'] ?></td>
                        <td class="text-center"><?php echo $controller->checkMonth($invoice_2['month']) ?></td>
                        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_2['status_pay']) ?></td>
                        <td class="text-center"> <button class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#getPaymentModal<?php echo $invoice_2['invoice_id'] ?>">ตรวจสอบการชำระ</i> <i class="bi bi-zoom-in mx-2"></i></button> </td>
                        
                        </tr>
                        <!-- Modal ใบเสร็จรับเงิน -->
    
                        <div class="modal fade" id="getPaymentModal<?php echo $invoice_2['invoice_id'] ?>" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
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
                                                        <img id="img-slip" src="../upload/Slip/<?php echo $invoice_2['img_slip'] ?>" >
                                                    </div>
                                                </div>
                                                <div class="detail-right">
                                                    <div class="detail-right-content">
                                                        <div class="form-detail">
                                                            <label class="form-label">บ้านเลขที่ : <?php echo $invoice_2['villager_housenum'] ?></label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ชื่อ : <?php echo $invoice_2['villager_fname'].' '.$invoice_2['villager_lname'] ?></label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ค่าส่วนกลาง : <?php echo $invoice_2['invoice_cmf'] ?> บาท</label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ค้างชำระ : <?php echo $invoice_2['invoice_overdue'] ?> บาท</label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ชำระล่วงหน้า : <?php echo (($invoice_2['pay_amount'])-($invoice_2['total_amount']))/100 ?> เดือน </label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">รวม : <?php echo $invoice_2['pay_amount'] ?> บาท</label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">วันที่แจ้งชำระ : <?php echo $invoice_2['date_pay'] ?></label>
                                                        </div>
                                                        <div class="btn-detail-payment">
                                                            <a class="btn btn-detail-success" href="../components/ad_checkPayment.php?villager_id=<?php echo $invoice_2['villager_id'] ?>&invoiceID=<?php echo $invoice_2['invoice_id'] ?>">ยืนยันการชำระ</a>
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
                        <?php }?>
                    </tbody>
                    </table>
                </div>
                <!-- ชำระแล้ว -->
                <div id="pay-3" class="table-pay tabContent">
                    <div class="box-filter">
                        <div class="filter">
                            <select id="filterMonth" class="form-select mt-1" aria-label="Filter Year" onchange="filterPaySuccess()">
                                <?php foreach ($viewFilterMonth as $monthFil) { ?>
                                    <?php if($monthFil['date_filter'] == $monthNow){ ?>
                                        <option selected value="<?php echo $monthFil['date_filter'] ?>"><?php echo $controller->checkMonth($monthFil['date_filter']) ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $monthFil['date_filter'] ?>"><?php echo $controller->checkMonth($monthFil['date_filter']) ?></option>
                                    <?php } ?>;
                                <?php }?>
                            </select>
                            <select id="filterYear" class="form-select mt-1" aria-label="Filter Year" onchange="filterPaySuccess()">
                                <?php foreach ($viewFilterYear as $yearFil) { ?>
                                    <?php if($yearFil['date_filter'] == $yearNow){ ?>
                                        <option selected value="<?php echo $yearFil['date_filter'] ?>"><?php echo $yearFil['date_filter'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $yearFil['date_filter'] ?>"><?php echo $yearFil['date_filter'] ?></option>
                                    <?php } ?>;
                                <?php }?>
                            </select>
                            
                        </div>
                    </div>
                <table id="table-pay-3" class="table table-striped mt-2">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้ง</th>
                        <th scope="col" class="text-center">เดือนที่แจ้ง</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <!-- <th scope="col"></th> -->
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataInvoice_3 as $index => $invoice_3){ ?>
                        <tr>
                        <td class="text-center"><?php echo $index+1 ?></td>
                        <td class="text-nowrap"><?php echo $invoice_3['villager_fname'].' '.$invoice_3['villager_lname'] ?></td>
                        <td class="text-center"><?php echo $invoice_3['villager_housenum'] ?></td>
                        <td class="text-center"><?php echo $invoice_3['date_start'] ?></td>
                        <td class="text-center"><?php echo $controller->checkMonth($invoice_3['month']) ?></td>
                        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_3['status_pay']) ?></td>
                        
                        </tr>

                       
                    <?php }?>
                        
                    </tbody>
                    </table>
                </div>
                <!-- ค้างชำระ -->
                <div id="pay-4" class="table-pay tabContent">
                <table id="table-pay-4" class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่ค้างชำระ</th>
                        <th scope="col" class="text-center">เดือนที่ค้างชำระ</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataInvoice_4 as $index => $invoice_4){ ?>
                        <tr>
                        <td class="text-center"><?php echo $index+1 ?></td>
                        <td class="text-nowrap"><?php echo $invoice_4['villager_fname'].' '.$invoice_4['villager_lname'] ?></td>
                        <td class="text-center"><?php echo $invoice_4['villager_housenum'] ?></td>
                        <td class="text-center"><?php echo $invoice_4['date_start'] ?></td>
                        <td class="text-center"><?php echo $controller->checkMonth($invoice_4['month']) ?></td>
                        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_4['status_pay']) ?></td>
                        </tr>
                    <?php }?>
                    </tbody>
                    </table>
                </div>
                <!-- ชำระล่วงหน้า -->
                <div id="pay-5" class="table-pay tabContent">
                <div class="box-filter">
                        <div class="filter">
                            <select id="filterMonth5" class="form-select mt-1" aria-label="Filter Year" onchange="filterPayOver()">
                                <?php foreach ($viewFilterMonth as $monthFil) { ?>
                                    <?php if($monthFil['date_filter'] == $monthNow){ ?>
                                        <option selected value="<?php echo $monthFil['date_filter'] ?>"><?php echo $controller->checkMonth($monthFil['date_filter']) ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $monthFil['date_filter'] ?>"><?php echo $controller->checkMonth($monthFil['date_filter']) ?></option>
                                    <?php } ?>;
                                <?php }?>
                            </select>
                            <select id="filterYear5" class="form-select mt-1" aria-label="Filter Year" onchange="filterPayOver()">
                                <?php foreach ($viewFilterYear as $yearFil) { ?>
                                    <?php if($yearFil['date_filter'] == $yearNow){ ?>
                                        <option selected value="<?php echo $yearFil['date_filter'] ?>"><?php echo $yearFil['date_filter'] ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $yearFil['date_filter'] ?>"><?php echo $yearFil['date_filter'] ?></option>
                                    <?php } ?>;
                                <?php }?>
                            </select>
                            
                        </div>
                    </div>
                <table id="table-pay-5" class="table  table-striped">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้ง</th>
                        <th scope="col" class="text-center">เดือนที่แจ้ง</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($dataInvoice_5 as $index => $invoice_5){ ?>
                        <tr>
                        <td class="text-center"><?php echo $index+1 ?></td>
                        <td class="text-nowrap"><?php echo $invoice_5['villager_fname'].' '.$invoice_5['villager_lname'] ?></td>
                        <td class="text-center"><?php echo $invoice_5['villager_housenum'] ?></td>
                        <td class="text-center"><?php echo $invoice_5['date_start'] ?></td>
                        <td class="text-center"><?php echo $controller->checkMonth($invoice_5['month']) ?></td>
                        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_5['status_pay']) ?></td>
                        <td class="text-center"> <button class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#getPaymentModal<?php echo $invoice_5['invoice_id'] ?>">ดูละเอียดเพิ่มเติม</i> <i class="bi bi-zoom-in mx-2"></i></button> </td>
                        </tr>

                        <!-- Modal ใบเสร็จรับเงิน -->
    
                        <div class="modal fade" id="getPaymentModal<?php echo $invoice_5['invoice_id'] ?>" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
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
                                                        <img id="img-slip" src="../upload/Slip/<?php echo $invoice_5['img_slip'] ?>" >
                                                    </div>
                                                </div>
                                                <div class="detail-right">
                                                    <div class="detail-right-content">
                                                        <div class="form-detail">
                                                            <label class="form-label">บ้านเลขที่ : <?php echo $invoice_5['villager_housenum'] ?></label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ชื่อ : <?php echo $invoice_5['villager_fname'].' '.$invoice_5['villager_lname'] ?></label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ค่าส่วนกลาง : <?php echo $invoice_5['invoice_cmf'] ?> บาท</label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ค้างชำระ : <?php echo $invoice_5['invoice_overdue'] ?> บาท</label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">ชำระล่วงหน้า : <?php echo (($invoice_5['pay_amount'])-($invoice_5['total_amount']))/100 ?> เดือน </label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">รวม : <?php echo $invoice_5['pay_amount'] ?> บาท</label>
                                                        </div>
                                                        <div class="form-detail">
                                                            <label class="form-label">วันที่แจ้งชำระ : <?php echo $invoice_5['date_pay'] ?></label>
                                                        </div>
                                                        <div class="btn-detail-payment">
                                                            <button class="btn btn-vlg-close"data-bs-dismiss="modal" >ปิด</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                
                                    
                                </div>
                            </div>
                        </div>
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
                                                <option value="1">1. มกราคม</option>
                                                <option value="2">2. กุมภาพันธ์</option>
                                                <option value="3">3. มีนาคม</option>
                                                <option value="4">4. เมษายน</option>
                                                <option value="5">5. พฤษภาคม</option>
                                                <option value="6">6. มิถุนายน</option>
                                                <option value="7">7. กรกฎาคม</option>
                                                <option value="8">8. สิงหาคม</option>
                                                <option value="9">9. กันยายน</option>
                                                <option value="10">10. ตุลาคม</option>
                                                <option value="11">11. พฤศจิกายน</option>
                                                <option value="12">12. ธันวาคม</option>
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
                                            <input type="date" name="date-start" id="date1" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>ชำระก่อนวันที่ :</label>
                                        <input type="date" name="date-end" id="date2" class="form-control" required>
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



<script>


    // Filter Year
      $(document).ready(function() {
            $('#table-pay-3').DataTable( {
                responsive: true,
                "pageLength": 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: " ค้นหา"
                },
            } );
        } );
    
    function filterPaySuccess(){
        let month = document.getElementById('filterMonth').value;
        let year = document.getElementById('filterYear').value;
        $.ajax({
            type: "POST",
            url: "../components/filterPayMonth.php",
            data: {month:month, year:year},
            success:function(data){
                $("#table-pay-3").html(data);
                $(document).ready(function() {
                    $('#table-pay-3').DataTable( {
                        destroy:true,  // ทำลาย data อันเก่าก่อน
                        responsive: true,
                        "pageLength": 10,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: " ค้นหา"
                        },
                    } );
                } );
            }
        })
    }


    $(document).ready(function() {
        $('#table-pay-5').DataTable( {
            responsive: true,
            "pageLength": 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: " ค้นหา"
                },
        } );
    } );


    function filterPayOver(){
        let month = document.getElementById('filterMonth5').value;
        let year = document.getElementById('filterYear5').value;
        let modal = document.getElementsByClassName('modal');
        $.ajax({
            type: "POST",
            url: "../components/filterPayOver.php",
            data: {month:month, year:year},
            success:function(data){
                $("#table-pay-5").html(data);
                $(document).ready(function() {
                    $('#table-pay-5').DataTable( {
                        destroy:true,  // ทำลาย data อันเก่าก่อน
                        responsive: true,
                        "pageLength": 10,
                        language: {
                            search: "_INPUT_",
                            searchPlaceholder: " ค้นหา"
                        },
                    } );
                } );
            }
        })
    }
   


    //select month
    const date1Input = document.getElementById("date1");
    const date2Input = document.getElementById("date2");

    date1Input.addEventListener("input", function() {
    const date1 = new Date(date1Input.value);
    const date2 = new Date(date1.getTime() + 15 * 24 * 60 * 60 * 1000);
    date2Input.value = date2.toISOString().substr(0, 10);
    });



    // table
        $(document).ready(function() {
            $('#table-pay-1').DataTable({
                responsive: true,
                pageLength: 10,
                searching: true,
                dom: "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: " ค้นหา"
                },
            });
        });
        $(document).ready(function() {
            $('#table-pay-2').DataTable( {
                responsive: true,
                "pageLength": 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: " ค้นหา"
                },
            } );
        } );
        $(document).ready(function() {
            $('#table-pay-4').DataTable( {
                responsive: true,
                "pageLength": 10,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: " ค้นหา"
                },
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