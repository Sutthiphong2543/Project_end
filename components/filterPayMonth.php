


<?php 
require_once"../config/connect.php";

if (isset($_POST['month'])) {
    $month = $_POST['month'];
    $year = $_POST['year'];
    $dataInvoice_3 = $controller->getInvoice_3($month,$year);


?>
    <table id="table-pay-3" class="table  table-striped">
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
    <?php if($dataInvoice_3){ ?>
        <?php foreach($dataInvoice_3 as $index => $invoice_3){ ?>
            <tr>
            <td class="text-center"><?php echo $index+1 ?></td>
            <td class="text-nowrap"><?php echo $invoice_3['villager_fname'].' '.$invoice_3['villager_lname'] ?></td>
            <td class="text-center"><?php echo $invoice_3['villager_housenum'] ?></td>
            <td class="text-center"><?php echo $invoice_3['date_start'] ?></td>
            <td class="text-center"><?php echo $controller->checkMonth($invoice_3['month']) ?></td>
            <td class="text-center"><?php echo $controller->checkStatusPay($invoice_3['status_pay']) ?></td>
            <!-- <td class="text-center"><button class="btn btn-info"  data-bs-toggle="modal" data-bs-target="#getPaymentModal<?php echo $invoice_3['invoice_id'] ?>">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></button></td> -->
            </tr>
            
        <?php }?>
    <?php } ?>  
        </tbody>
    </table>

<?php }?>