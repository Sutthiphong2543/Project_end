<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $year = $_POST['year'];

    //get income expenses 
    $getSumAllMonth = $fucIncome->getSumAllMonth($year);
    $getSumAllExpenses = $fucIncome->getSumAllExpenses($year);

?>
<div class="income text-center shadow-sm p-3  bg-body rounded border">
    <h4>รายรับ</h4>
    <h5><?php echo number_format($getSumAllMonth['sumAllMonth']); ?> บาท</h5>
</div>
<div class="expenses text-center shadow-sm p-3  bg-body rounded border">
    <h4>รายจ่าย</h4>
    <h5><?php echo number_format($getSumAllExpenses['sumAllExpenses']); ?> บาท</h5>
</div>
<div class="remaining text-center shadow-sm p-3  bg-body rounded border">
    <h4>คงเหลือ</h4>
    <h5><?php echo number_format($getSumAllMonth['sumAllMonth']-$getSumAllExpenses['sumAllExpenses']); ?> บาท</h5>
</div>


<?php } ?>