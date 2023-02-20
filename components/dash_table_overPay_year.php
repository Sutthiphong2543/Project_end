<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $year = $_POST['year'];

    //get data Overpay
    $dataOverpay = $dashboardClass->getOverPay_dash($year);

?>
    <table id="table-vlg-2" class="table table-ct4 ">
        <thead>
            <tr>
            <th scope="col" class="text-center">#</th>
            <th scope="col" class="text-center">ชื่อ</th>
            <th scope="col" class="text-center">บ้านเลขที่</th>
            <th scope="col" class="text-center">วันที่</th>
            <th scope="col" class="text-center">ชำระล่วงหน้า</th>
            </tr>
        </thead>
        <tbody>
        <?php if($dataOverpay){ ?>
            <?php foreach($dataOverpay as $index => $overPay){ ?>
                <tr>
                <td class="text-center"><?php echo $index+1 ?></td>
                <td class="text-nowrap"><?php echo $overPay['villager_fname'].' '.$overPay['villager_lname'] ?></td>
                <td class="text-center"><?php echo $overPay['villager_housenum'] ?></td>
                <td class="text-center"><?php echo $overPay['date_start'] ?></td>
                <td class="text-center"><?php echo $overPay['overPay']/100 ?> เดือน</td>
                </tr>
            <?php }?>
        <?php }else{?>
            <tr>
                <td colspan="5" class="text-center"><center>ไม่มีชำระล่วงหน้า</center></td>
            </tr>
        <?php }?>
        </tbody>
    </table>

<?php } ?>