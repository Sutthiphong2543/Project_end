<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tri = $_POST['tri'];
    $year = $_POST['year'];



?>

<?php if ($tri == 1){
        //get income expenses 
        $getSumAllMonth = $chartClass->getSum_tri1_month($year);
        $getSumAllExpenses = $chartClass->getSum_tri1_expenses($year);
    
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


<?php }else if ($tri ==2) {         
    //get income expenses 
        $getSumAllMonth = $chartClass->getSum_tri2_month($year);
        $getSumAllExpenses = $chartClass->getSum_tri2_expenses($year);
    
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


<?php }else if($tri == 3 ){
    //get income expenses 
        $getSumAllMonth = $chartClass->getSum_tri3_month($year);
        $getSumAllExpenses = $chartClass->getSum_tri3_expenses($year);
    
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



<?php } ?>