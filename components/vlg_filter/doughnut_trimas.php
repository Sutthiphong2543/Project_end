<?php 
require_once"../../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tri = $_POST['tri'];
    $year = $_POST['year'];



?>

<?php if ($tri == 1){
        //get income expenses 
        $getSumAllMonth = $chartClass->getSum_tri1_month($year);
        $getSumAllExpenses = $chartClass->getSum_tri1_expenses($year);
        $income = $getSumAllMonth['sumAllMonth'];
        $expenses = $getSumAllExpenses['sumAllExpenses'];
   
        $dataDoughnutCh = [$income, $expenses, ($income-$expenses)];
    
    ?>
<canvas id="doughnutChart"></canvas>
<script>
// chat doughnut
{
const chart_doughnut = document.getElementById('doughnutChart').getContext('2d');
        const data_chart = {
            labels: [
                'รายรับ',
                'รายจ่าย',
                'คงเหลือ'
            ],
            datasets: [{
            label: ' ',
            data:  <?php echo json_encode($dataDoughnutCh); ?>,
            backgroundColor: [
                'rgba(84, 202, 202, 1)',
                'rgba(195, 205, 233, 1)',
                'rgba(244, 244, 244, 1)',
            ],
            hoverOffset: 4
            }]
        };
        new Chart(chart_doughnut, {
            type: 'pie',
            data: data_chart,
        });
}
</script>

<?php }else if ($tri ==2) {         
    //get income expenses 
        $getSumAllMonth = $chartClass->getSum_tri2_month($year);
        $getSumAllExpenses = $chartClass->getSum_tri2_expenses($year);
        $income = $getSumAllMonth['sumAllMonth'];
        $expenses = $getSumAllExpenses['sumAllExpenses'];
   
        $dataDoughnutCh = [$income, $expenses, ($income-$expenses)];
    
    ?>
<canvas id="doughnutChart"></canvas>
<script>
// chat doughnut
{
const chart_doughnut = document.getElementById('doughnutChart').getContext('2d');
        const data_chart = {
            labels: [
                'รายรับ',
                'รายจ่าย',
                'คงเหลือ'
            ],
            datasets: [{
            label: ' ',
            data:  <?php echo json_encode($dataDoughnutCh); ?>,
            backgroundColor: [
                'rgba(84, 202, 202, 1)',
                'rgba(195, 205, 233, 1)',
                'rgba(244, 244, 244, 1)',
            ],
            hoverOffset: 4
            }]
        };
        new Chart(chart_doughnut, {
            type: 'pie',
            data: data_chart,
        });
}
</script>

<?php }else if($tri == 3 ){
    //get income expenses 
        $getSumAllMonth = $chartClass->getSum_tri3_month($year);
        $getSumAllExpenses = $chartClass->getSum_tri3_expenses($year);
        $income = $getSumAllMonth['sumAllMonth'];
        $expenses = $getSumAllExpenses['sumAllExpenses'];
   
        $dataDoughnutCh = [$income, $expenses, ($income-$expenses)];
    
    ?>
<canvas id="doughnutChart"></canvas>
<script>
// chat doughnut
{
const chart_doughnut = document.getElementById('doughnutChart').getContext('2d');
        const data_chart = {
            labels: [
                'รายรับ',
                'รายจ่าย',
                'คงเหลือ'
            ],
            datasets: [{
            label: ' ',
            data:  <?php echo json_encode($dataDoughnutCh); ?>,
            backgroundColor: [
                'rgba(84, 202, 202, 1)',
                'rgba(195, 205, 233, 1)',
                'rgba(244, 244, 244, 1)',
            ],
            hoverOffset: 4
            }]
        };
        new Chart(chart_doughnut, {
            type: 'pie',
            data: data_chart,
        });
}
</script>

<?php } ?>



<?php } ?>