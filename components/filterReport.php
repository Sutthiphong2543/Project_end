<?php 
require_once"../config/connect.php";

    if(isset($_POST['year'])){
        $year = $_POST['year'];

        //Get Reports
        $report = $fucIncome->getReport($year);
    
?>
<table id="report-table" class="table">
    <thead>
        <tr class="text-center">
        <th scope="col" >#</th>
        <th scope="col">เดือน</th>
        <th scope="col" class="text-end">รายรับ (บาท)</th>
        <th scope="col" class="text-end">รายจ่าย (บาท)</th>
        <th scope="col" class="text-end">คงเหลือ (บาท)</th>
        
        </tr>
    </thead>
    <tbody class="text-center">
    <?php foreach($report as $index => $viewReport){ 
        $date = new DateTime($viewReport['expenses_date']); 
        $month = $date->format('m');

        //Get Sum total all months
        $sumTotalMonth = $fucIncome->getSumTotalMonth($month,$year);
        $getSumAllMonth = $fucIncome->getSumAllMonth($year);
        $getSumAllExpenses = $fucIncome->getSumAllExpenses($year);
        ?>
        <tr  style="height: 55px;">
            <th ><?php echo $index+1 ?></th>
            <td class="text-start"><?php echo $controller->checkMonth($month)  ?></td>
            <td class="text-end"><?php echo number_format($sumTotalMonth['sumMonth']); ?></i></td>
            <td class="text-end"><?php echo number_format($viewReport['expenses_total']); ?></td>
            <td class="text-end"><?php echo number_format($sumTotalMonth['sumMonth']-$viewReport['expenses_total']) ?></td>
        </tr>
    <?php } ?>
        <tr id="totalReportRow">
            <td colspan="2">รวม</td>
            <td class="text-end"><label id="totalIncome"><?php echo number_format($getSumAllMonth['sumAllMonth']); ?></label></td>
            <td class="text-end"><label id="totalExpenses"><?php echo number_format($getSumAllExpenses['sumAllExpenses']); ?></label></td>
            <td class="text-end"><label id="totalRemaining"><?php echo number_format($getSumAllMonth['sumAllMonth']-$getSumAllExpenses['sumAllExpenses']); ?></label></td>
        </tr>
    </tbody>
</table>
<?php } ?>