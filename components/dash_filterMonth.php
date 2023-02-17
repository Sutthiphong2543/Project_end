<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $month = $_POST['month'];
    $year = $_POST['year'];

    // get month thai
    $labelMonth =[$controller->checkMonthThai($month)];
    // get income month 
    $M_CH = $chartClass->getCh_income_month($month,$year);
    $dataIncome_month = [$M_CH['sumMonth']];
    // get expenses month
    $income_month = $chartClass->getCh_expenses($month,$year);
    

?>
<?php if($labelMonth && $M_CH){ 
    if($income_month){
        $dataExpenses_month = [$income_month['expenses_total']];
    }else {
        $dataExpenses_month[] = 0;
    }
    
?>

<div id="main-chart">
    <canvas id="mainChart"></canvas>
</div>


<script>
    {
        
        const ctx = document.getElementById('mainChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($labelMonth); ?>,
                datasets: [
                    {
                        label: 'รายรับ',
                        data: <?php echo json_encode($dataIncome_month); ?>,
                        backgroundColor: 'rgba(84, 202, 202, 1)',
                        borderColor: 'rgba(84, 202, 202, 1)',
                        // borderWidth: 1
                    },
                    {
                        label: 'รายจ่าย',
                        data: <?php echo json_encode($dataExpenses_month); ?>,
                        backgroundColor: 'rgba(195, 205, 233, 1)',
                        borderColor: 'rgba(195, 205, 233, 1)',
                        // borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    x:{
                        grid:{
                            display:true,
                            drawOnChartArea:false,
                            drawBorder:false,
                        }
                    },
                    y:{
                        grid:{
                            draBorder: false
                        },
                        beginAtZero: true
                    }
                }
            }
        });

    }
</script>
<?php }?>


<div id="main-chart">
    <canvas id="mainChart"></canvas>
</div>


<script>
    {
        const ctx = document.getElementById('mainChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['ยังไม่มีข้อมูล'],
                datasets: [
                    {
                        label: 'รายรับ',
                        data: ' ',
                        backgroundColor: 'rgba(84, 202, 202, 1)',
                        borderColor: 'rgba(84, 202, 202, 1)',
                        // borderWidth: 1
                    },
                    {
                        label: 'รายจ่าย',
                        data: ' ',
                        backgroundColor: 'rgba(195, 205, 233, 1)',
                        borderColor: 'rgba(195, 205, 233, 1)',
                        // borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    x:{
                        grid:{
                            display:true,
                            drawOnChartArea:false,
                            drawBorder:false,
                        }
                    },
                    y:{
                        grid:{
                            draBorder: false
                        },
                        beginAtZero: true
                    }
                }
            }
        });

    }

<?php } ?>