<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tri = $_POST['tri'];
    $year = $_POST['year'];


?>
<?php 
if($tri == 1){ // tri mas 1
        for ($i = 1; $i <= 4; $i++){
            // get month thai
            $labelMonth[] =$controller->checkMonthThai($i);
            // get income month tri1
            $sumIncomeMonth_ch = $chartClass->getCh_sumMonth_tri1($i,$year);
            $dataIncome_month[] = $sumIncomeMonth_ch['sumMonth'];
            
            // get expenses month
            $expensesTotal = $chartClass->getCh_sumExpenses_tri1($i,$year);
            if($expensesTotal){
                $dataExpenses_month[] = $expensesTotal['expensesTotal'];
            }else{
                $dataExpenses_month[] = 0;
            }
        }
?>
<!-- Tri mas 1 -->
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

<?php }else if($tri ==2){ 
    // tri mas 2
    for ($i = 5; $i <= 8; $i++){
        // get month thai
        $labelMonth[] =$controller->checkMonthThai($i);
        // get income month tri1
        $sumIncomeMonth_ch = $chartClass->getCh_sumMonth_tri1($i,$year);
        $dataIncome_month[] = $sumIncomeMonth_ch['sumMonth'];
        
        // get expenses month
        $expensesTotal = $chartClass->getCh_sumExpenses_tri1($i,$year);
        if($expensesTotal){
            $dataExpenses_month[] = $expensesTotal['expensesTotal'];
        }else{
            $dataExpenses_month[] = 0;
        }
    }
    ?>
<!-- Tri mas 2 -->
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
    
<?php }else if($tri == 3){     // tri mas 3
    for ($i = 9; $i <= 12; $i++){
        // get month thai
        $labelMonth[] =$controller->checkMonthThai($i);
        // get income month tri1
        $sumIncomeMonth_ch = $chartClass->getCh_sumMonth_tri1($i,$year);
        $dataIncome_month[] = $sumIncomeMonth_ch['sumMonth'];
        
        // get expenses month
        $expensesTotal = $chartClass->getCh_sumExpenses_tri1($i,$year);

        if($expensesTotal){
            $dataExpenses_month[] = $expensesTotal['expensesTotal'];
        }else{
            $dataExpenses_month[] = 0;
        }
        
    }
    ?>

        <!-- Tri mas 3 -->
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

    
<?php } ?>
<!-- end if -->


<!-- if data not true   -->
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