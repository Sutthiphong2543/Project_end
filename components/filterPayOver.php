

<?php 
require_once"../config/connect.php";

if (isset($_POST['month'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dataInvoice_5 = $controller->getInvoice_5($month,$year);

?>
<table id="table-pay-5" class="table  table-striped">
    <thead>
        <tr>
        <th scope="col" class="text-center">#</th>
        <th scope="col" class="text-center">ชื่อ</th>
        <th scope="col" class="text-center">บ้านเลขที่</th>
        <th scope="col" class="text-center">วันที่แจ้ง</th>
        <th scope="col" class="text-center">เดือนที่แจ้ง</th>
        <th scope="col" class="text-center">สถานะ</th>
        <th scope="col" ></th>
        </tr>
    </thead>
    <tbody>
    <?php if($dataInvoice_5){ ?>
    <?php foreach($dataInvoice_5 as $index => $invoice_5){ ?>
        <tr>
        <td class="text-center"><?php echo $index+1 ?></td>
        <td class="text-nowrap"><?php echo $invoice_5['villager_fname'].' '.$invoice_5['villager_lname'] ?></td>
        <td class="text-center"><?php echo $invoice_5['villager_housenum'] ?></td>
        <td class="text-center"><?php echo $invoice_5['date_start'] ?></td>
        <td class="text-center"><?php echo $controller->checkMonth($invoice_5['month']) ?></td>
        <td class="text-center"><?php echo $controller->checkStatusPay($invoice_5['status_pay']) ?></td>
        <td class="text-center"> <button class="btn btn-info" style="width:250px"  data-bs-toggle="modal" data-bs-target="#getPaymentModal<?php echo $invoice_5['invoice_id'] ?>">ดูละเอียดเพิ่มเติม</i> <i class="bi bi-zoom-in mx-2"></i></button> </td>
        </tr>

        <!-- Modal ใบเสร็จรับเงิน -->

        <div class="modal fade" id="getPaymentModal<?php echo $invoice_5['invoice_id'] ?>" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="background: #ffffff">
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

    <?php } ?>  
        </tbody>
    </table>

<?php }?>