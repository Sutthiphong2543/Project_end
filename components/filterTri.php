<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tri = $_POST['tri'];
    $year = $_POST['year'];



?>
    <?php if ($tri == 1){ 
        //get trimas 1
        $tri1 = $filterClass->getFilterReport1($year);
        ?>
            <table id="report-table" class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th colspan="5" scope="col" ><?php echo $filterClass->filterTri( $tri); ?></th>
                    </tr>
                    <tr class="text-center">
                        <th scope="col">เดือน</th>
                        <th scope="col" class="text-end">รายรับ (บาท)</th>
                        <th scope="col" class="text-end">รายจ่าย (บาท)</th>
                        <th scope="col" class="text-end">คงเหลือ (บาท)</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php if($tri1){ //check get data true?> 
                    <?php foreach($tri1 as  $viewReport){ //loop
                        $date = new DateTime($viewReport['expenses_date']); 
                        $month = $date->format('m');

                        //Get Sum total all months
                        $sumTotalMonth = $fucIncome->getSumTotalMonth($month,$year); // loop month expenses
                        $getSumAllMonth = $filterClass->getSumTri1($year); // sum all months
                        $getSumAllExpenses = $filterClass->getSumExpensesTri1($year);
                        ?>
                        <tr  style="height: 55px;">
                            <td class="text-start"><?php echo $controller->checkMonth($month)  ?></td>
                            <td class="text-end"><?php echo number_format($sumTotalMonth['sumMonth']); ?></i></td>
                            <td class="text-end"><?php echo number_format($viewReport['expenses_total']); ?></td>
                            <td class="text-end"><?php echo number_format($sumTotalMonth['sumMonth']-$viewReport['expenses_total']) ?></td>
                        </tr>
                    <?php } ?>
                        <tr id="totalReportRow">
                            <td >รวม</td>
                            <td class="text-end"><label id="totalIncome"><?php echo number_format($getSumAllMonth['sumAllMonth']); ?></label></td>
                            <td class="text-end"><label id="totalExpenses"><?php echo number_format($getSumAllExpenses['sumAllExpenses']); ?></label></td>
                            <td class="text-end"><label id="totalRemaining"><?php echo number_format($getSumAllMonth['sumAllMonth']-$getSumAllExpenses['sumAllExpenses']); ?></label></td>
                        </tr>
                <?php }else{ ?>
                        <tr >
                            <td colspan="4">No data</td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>

    <?php } else if ($tri == 2){
        //get trimas 2
        $tri2 = $filterClass->getFilterReport2($year);
        ?>
            <table id="report-table" class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th colspan="5" scope="col" ><?php echo $filterClass->filterTri( $tri); ?></th>
                    </tr>
                    <tr class="text-center">
                        <th scope="col">เดือน</th>
                        <th scope="col" class="text-end">รายรับ (บาท)</th>
                        <th scope="col" class="text-end">รายจ่าย (บาท)</th>
                        <th scope="col" class="text-end">คงเหลือ (บาท)</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php if($tri2){ //check get data true?> 
                    <?php foreach($tri2 as  $viewReport){ //loop
                        $date = new DateTime($viewReport['expenses_date']); 
                        $month = $date->format('m');

                        //Get Sum total all months
                        $sumTotalMonth = $fucIncome->getSumTotalMonth($month,$year); // loop month expenses
                        $getSumAllMonth = $filterClass->getSumTri2($year); // sum all months
                        $getSumAllExpenses = $filterClass->getSumExpensesTri2($year);
                        ?>
                        <tr  style="height: 55px;">
                            <td class="text-start"><?php echo $controller->checkMonth($month)  ?></td>
                            <td class="text-end"><?php echo number_format($sumTotalMonth['sumMonth']); ?></i></td>
                            <td class="text-end"><?php echo number_format($viewReport['expenses_total']); ?></td>
                            <td class="text-end"><?php echo number_format($sumTotalMonth['sumMonth']-$viewReport['expenses_total']) ?></td>
                        </tr>
                    <?php } ?>
                        <tr id="totalReportRow">
                            <td >รวม</td>
                            <td class="text-end"><label id="totalIncome"><?php echo number_format($getSumAllMonth['sumAllMonth']); ?></label></td>
                            <td class="text-end"><label id="totalExpenses"><?php echo number_format($getSumAllExpenses['sumAllExpenses']); ?></label></td>
                            <td class="text-end"><label id="totalRemaining"><?php echo number_format($getSumAllMonth['sumAllMonth']-$getSumAllExpenses['sumAllExpenses']); ?></label></td>
                        </tr>
                <?php }else{ ?>
                        <tr >
                            <td colspan="4">No data</td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>

    <?php } else if($tri == 3){
        //get trimas 3
        $tri3 = $filterClass->getFilterReport3($year);
        ?>
            <table id="report-table" class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th colspan="5" scope="col" ><?php echo $filterClass->filterTri( $tri); ?></th>
                    </tr>
                    <tr class="text-center">
                        <th scope="col">เดือน</th>
                        <th scope="col" class="text-end">รายรับ (บาท)</th>
                        <th scope="col" class="text-end">รายจ่าย (บาท)</th>
                        <th scope="col" class="text-end">คงเหลือ (บาท)</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php if($tri3){ //check get data true?> 
                    <?php foreach($tri3 as  $viewReport){ //loop
                        $date = new DateTime($viewReport['expenses_date']); 
                        $month = $date->format('m');

                        //Get Sum total all months
                        $sumTotalMonth = $fucIncome->getSumTotalMonth($month,$year); // loop month expenses
                        $getSumAllMonth = $filterClass->getSumTri3($year); // sum all months
                        $getSumAllExpenses = $filterClass->getSumExpensesTri3($year);
                        ?>
                        <tr  style="height: 55px;">
                            <td class="text-start"><?php echo $controller->checkMonth($month)  ?></td>
                            <td class="text-end"><?php echo number_format($sumTotalMonth['sumMonth']); ?></i></td>
                            <td class="text-end"><?php echo number_format($viewReport['expenses_total']); ?></td>
                            <td class="text-end"><?php echo number_format($sumTotalMonth['sumMonth']-$viewReport['expenses_total']) ?></td>
                        </tr>
                    <?php } ?>
                        <tr id="totalReportRow">
                            <td >รวม</td>
                            <td class="text-end"><label id="totalIncome"><?php echo number_format($getSumAllMonth['sumAllMonth']); ?></label></td>
                            <td class="text-end"><label id="totalExpenses"><?php echo number_format($getSumAllExpenses['sumAllExpenses']); ?></label></td>
                            <td class="text-end"><label id="totalRemaining"><?php echo number_format($getSumAllMonth['sumAllMonth']-$getSumAllExpenses['sumAllExpenses']); ?></label></td>
                        </tr>
                <?php }else{ ?>
                        <tr >
                            <td colspan="4">No data</td>
                        </tr>
                <?php } ?>
                </tbody>
            </table>
    <?php }?>

<?php }?>