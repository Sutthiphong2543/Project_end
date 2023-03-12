<?php 
require_once"../../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $year = $_POST['year'];

     //get income expenses 
     $getSumAllMonth = $fucIncome->getSumAllMonth($year);
     $income = $getSumAllMonth['sumAllMonth'];
     $getSumAllExpenses = $fucIncome->getSumAllExpenses($year);
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