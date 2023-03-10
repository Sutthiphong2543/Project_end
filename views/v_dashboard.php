<?php 
    require_once"../components/session.php";
    require_once"../components/check_villager.php";
     //select options Tri
     $Tri =[0,1,2,3];
    //Get Now Year
    date_default_timezone_set("Asia/Bangkok");
    $monthNow = date("m");
    $yearNow = date("Y");
    //Filter Year
    $viewFilter = $filterClass->filterYear();
    //  $viewFilterMonth = $filterClass->filterMonth();
    $viewFilterMonth = [0,1,2,3,4,5,6,7,8,9,10,11,12];

     //get income expenses 
     $getSumAllMonth = $fucIncome->getSumAllMonth($yearNow);
     $getSumAllExpenses = $fucIncome->getSumAllExpenses($yearNow);
     $income = $getSumAllMonth['sumAllMonth'];
     $expenses = $getSumAllExpenses['sumAllExpenses'];

     $dataDoughnutCh = [$income, $expenses, ($income-$expenses)];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <!-- chart and jquery -->
    <link href="https://www.chartjs.org/samples/2.9.4/utils.js">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  

    <link rel="stylesheet" href="../css/vlg_dashboard.css?<?php echo time(); ?>">
    <title>Dashboard</title>
</head>
<body></body>
    <?php 
        require_once '../components/template_vlg.php';
    ?>
    
    <div class="main-container">
        <div class="vlg_dashboard ">

        <!-- News -->
            <div class="news ">
                <div class="title_news text-center">
                    <h1>????????????????????????????????????????????????</h1>
                </div>
                <div class="content_news">
                <?php
                    $news = $newsClass->getViewNews();
                    foreach($news as $data){
                ?>
                    <div class="mb-3">
                        <label  class="form-label">?????????????????? : <?php echo $data['announce_topic']; ?></label>
                    </div>
                    <div class="mb-3">
                        <p  class="form-label" style="text-align: justify;"><?php echo $data['announce_news_detail']; ?></p>
                    </div>
                    <div class="mb-3">
                        <small  class="form-label" style="text-align: justify;">???????????????????????????????????? : <?php echo date("d/m/Y", strtotime($data['announce_news_date'])) ?></small>
                    </div>

                <?php } ?>
                </div>
            </div>
            
            <!-- Chart  -->
           <div class="dash-header">
                    <div class="mb-3">
                        <h4  class="form-label" style="text-align: justify;">??????????????????????????????-?????????????????????</h4>
                    </div>
                    <div class="mb-3">
                        <!--Month  -->
                        <select id="filterMonth" class="select-mty " aria-label="Filter Year" onchange="dash_filterMonth(this.value)">
                            <?php foreach ($viewFilterMonth as $monthFil) { ?>
                                <?php if($monthFil == 0){ ?>
                                    <option selected value="<?php echo $monthFil ?>"><?php echo $controller->checkMonth($monthFil) ?> </option>
                                <?php } else { ?>
                                    <option value="<?php echo $monthFil ?>"><?php echo $controller->checkMonth($monthFil) ?></option>
                                <?php } ?>;
                            <?php }?>
                        </select>

                        <!-- ?????????????????? -->
                        <select id="filterTri" class="select-mty " aria-label="Filter Year" onchange="filterTri(this.value)">
                            <?php foreach ($Tri as $viewTri) { ?>
                                <?php if($viewTri == 0){ ?>
                                    <option selected value="<?php echo $viewTri; ?>"><?php echo $filterClass->filterTri( $viewTri); ?></option>
                                <?php }else{ ?>
                                    <option  value="<?php echo $viewTri; ?>"><?php echo $filterClass->filterTri( $viewTri); ?></option>
                                <?php }?>
                            <?php }?>
                        </select>

                        <!-- Year -->
                        <select id="filterYear" class="select-mty" aria-label="Filter Year" onchange="filterYear(this.value)">
                            <?php foreach ($viewFilter as $yearFil) { ?>
                                <?php if ($yearFil['date_filter'] == $yearNow){ ?>
                                    <option selected value="<?php echo $yearFil['date_filter']; ?>"><?php echo $yearFil['date_filter'] ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $yearFil['date_filter']; ?>"><?php echo $yearFil['date_filter'] ?></option>
                                <?php } ?>
                            <?php }?>
                        </select>
                    </div>
            
           </div>
           <div class="dash-chart ">
                    <div class="mb-3 mt-3 ">
                        <div id="main-chart" >
                            <canvas id="mainChart"></canvas>
                        </div>
                        <div id="container-header-dash"  class="footer-chart mt-3 ">
                            <div class="footer-margin text-center mb-1 border">
                                <h4>??????????????????</h4>
                                <h5><?php echo  number_format($getSumAllMonth['sumAllMonth']); ?> ?????????</h5>
                            </div>
                            <div class="footer-margin text-center mb-1 border">
                                <h4>?????????????????????</h4>
                                <h5><?php echo  number_format($getSumAllExpenses['sumAllExpenses']); ?> ?????????</h5>
                            </div>
                            <div class="footer-margin text-center mb-1 border">
                                <h4>?????????????????????</h4>
                                <h5><?php echo number_format($getSumAllMonth['sumAllMonth']-$getSumAllExpenses['sumAllExpenses']); ?> ?????????</h5>
                            </div>
                        </div>
                    </div>
                    <div class="chart-donut mt-3 mb-3 border">
                        <div id="doughnut-chart">
                            <canvas id="doughnutChart" width="300" height="50"></canvas>
                        </div>

                    </div>

           </div>

        </div>
    </div>

    <?php 
//Main Chart
   

    for($i=1;$i<=12;$i++){
        //loop get name month
        $newLabel[] = $controller->checkMonthThai($i);

        //loop sum month
        $sumMonth = $chartClass->getCh_income_month($i, $yearNow);
        $totalMonth[] = $sumMonth['sumMonth'];

        //loop get total expenses
        $getTotalExpenses = $chartClass->getCh_expenses($i, $yearNow);
        if($getTotalExpenses){
            $totalExpenses[] = $getTotalExpenses['expenses_total'];
        }else{
            $totalExpenses[] = 0;
        }
        
    }


?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
        //chart
        const ctx = document.getElementById('mainChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($newLabel); ?>,
                datasets: [
                    {
                        label: '??????????????????',
                        data: <?php echo json_encode($totalMonth); ?>,
                        backgroundColor: 'rgba(84, 202, 202, 1)',
                        borderColor: 'rgba(84, 202, 202, 1)',
                        // borderWidth: 1
                    },
                    {
                        label: '?????????????????????',
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
// chat doughnut
        const chart_doughnut = document.getElementById('doughnutChart').getContext('2d');
        const data_chart = {
            labels: [
                '??????????????????',
                '?????????????????????',
                '?????????????????????'
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


        // --------------------------------
     //filter year
     function filterYear(year) {
        $('#filterTri')[0].selectedIndex = 0; //reset tri mas  when click select year
        $('#filterMonth')[0].selectedIndex = 0;
        $.ajax({
            type: "POST",
            url: "../components/dash_filterYear.php",
            data:{year:year},
            success: function(data) {
                $("#main-chart").html(data);
            }
        });

        //Header dashboard total
        $.ajax({
            type: "POST",
            url: "../components/dash_total_year.php",
            data:{year:year},
            success: function(data) {
                $("#container-header-dash").html(data);

            }
        });

        //chart doughnut year
        $.ajax({
            type: "POST",
            url: "../components/vlg_filter/doughnut_year.php",
            data:{year:year},
            success: function(data) {
                $("#doughnut-chart").html(data);
            }
        });
    }

// filter tri mas......................................................
        function filterTri(tri){
            $('#filterMonth')[0].selectedIndex = 0;
            // Filter Tri mas
            let yearTri = document.getElementById("filterYear").value;
            $.ajax({
                type: "POST",
                url: "../components/dash_filterTri.php",
                data:{tri:tri,year:yearTri},
                success: function(data) {
                    $("#main-chart").html(data);
                }
            }); 

            // Header dashboard total tri
            $.ajax({
                type: "POST",
                url: "../components/dash_total_tri.php",
                data:{tri:tri,year:yearTri},
                success: function(data) {
                    $("#container-header-dash").html(data);
                }
            }); 

            // chart doughnut tri mas filterTri
            $.ajax({
                type: "POST",
                url: "../components/vlg_filter/doughnut_trimas.php",
                data:{tri:tri,year:yearTri},
                success: function(data) {
                    $("#doughnut-chart").html(data);
                }
            });
        }

//filter month........................................................
        
        function dash_filterMonth(month){
            $('#filterTri')[0].selectedIndex = 0;
            // Filter Tri mas
            let yearTri = document.getElementById("filterYear").value;
            //filter
            $.ajax({
                type: "POST",
                url: "../components/dash_filterMonth.php",
                data:{month:month,year:yearTri},
                success: function(data) {
                    $("#main-chart").html(data);
                }
            }); 

            //filter total month
            $.ajax({
                type: "POST",
                url: "../components/dash_total_month.php",
                data:{month:month,year:yearTri},
                success: function(data) {
                    $("#container-header-dash").html(data);
                }
            }); 

            // chart doughnut month filter
            $.ajax({
                type: "POST",
                url: "../components/vlg_filter/doughnut_month.php",
                data:{month:month,year:yearTri},
                success: function(data) {
                    $("#doughnut-chart").html(data);
                }
            }); 
        }
</script>
</body>
</html>