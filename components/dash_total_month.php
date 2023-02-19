<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $month = $_POST['month'];
    $year = $_POST['year'];

  //get income expenses 
  $getSumAllMonth = $chartClass->getCh_income_month($month,$year);
  $getSumAllExpenses = $chartClass->getCh_expenses($month,$year);
  if($getSumAllExpenses){
    $newSumAllExpenses = $getSumAllExpenses['expenses_total'];
  }else if(!$getSumAllExpenses){
    $newSumAllExpenses = 0;
  }
    

?>
   <div class="income text-center shadow-sm p-3 mb-5 bg-body rounded">
        <h4>รายรับ</h4>
        <h5><?php echo number_format($getSumAllMonth['sumMonth']); ?> บาท</h5>
    </div>
    <div class="expenses text-center shadow-sm p-3 mb-5 bg-body rounded">
        <h4>รายจ่าย</h4>
        <h5><?php echo number_format($newSumAllExpenses); ?> บาท</h5>
    </div>
    <div class="remaining text-center shadow-sm p-3 mb-5 bg-body rounded">
        <h4>คงเหลือ</h4>
        <h5><?php echo number_format($getSumAllMonth['sumMonth'] - $newSumAllExpenses); ?> บาท</h5>
    </div>


<?php } ?>