<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $year = $_POST['year'];


    for($i=1;$i<=12;$i++){
        //loop get name month
        $newLabel[] = $controller->checkMonthThai($i);

        //loop sum month
        $sumMonth = $chartClass->getCh_income_month($i, $year);
        $totalMonth[] = $sumMonth['sumMonth'];

        //loop get total expenses
        $getTotalExpenses = $chartClass->getCh_expenses($i, $year);
        if($getTotalExpenses){
            $totalExpenses[] = $getTotalExpenses['expenses_total'];
        }else{
            $totalExpenses[] = 0;
        }
        

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
                labels: <?php echo json_encode($newLabel); ?>,
                datasets: [
                    {
                        label: 'รายรับ',
                        data: <?php echo json_encode($totalMonth); ?>,
                        backgroundColor: 'rgba(84, 202, 202, 1)',
                        borderColor: 'rgba(84, 202, 202, 1)',
                        // borderWidth: 1
                    },
                    {
                        label: 'รายจ่าย',
                        data: <?php echo json_encode($totalExpenses); ?>,
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


<?php } ?>