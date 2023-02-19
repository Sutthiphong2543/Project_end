<?php 
    require_once"../components/session.php";
    require_once"../components/check_admin.php";
    require_once"../config/connect.php";
    
    //select options Tri
    $Tri =[0,1,2,3];
    //Get Now Year
    date_default_timezone_set("Asia/Bangkok");
    $monthNow = date("m");
    $yearNow = date("Y");
    //Filter Year
    $viewFilter = $filterClass->filterYear();
     //Filter month
    //  $viewFilterMonth = $filterClass->filterMonth();
     $viewFilterMonth = [0,1,2,3,4,5,6,7,8,9,10,11,12];

     //get income expenses 
    $getSumAllMonth = $fucIncome->getSumAllMonth($yearNow);
    $getSumAllExpenses = $fucIncome->getSumAllExpenses($yearNow);

    //data Overdue 
    $dataInvoice_4 = $dashboardClass->getOverdue_dash($yearNow);
    //get data Overpay
    $dataOverpay = $dashboardClass->getOverPay_dash($yearNow);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://www.chartjs.org/samples/2.9.4/utils.js">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  

    <link rel="stylesheet" href="../css/dashboard.css ?<?php echo time(); ?>" >
    <title>Dashboard</title>
</head>
<body>
<?php require_once'../components/ad_template.php'?>
<!-- .......................... -->
    <div class="main-container ">
        <div class="content1">
                <div id="container-header-dash" class="container ">
                    <div class="income text-center shadow-sm p-3 mb-5 bg-body rounded">
                        <h4>รายรับ</h4>
                        <h5><?php echo number_format($getSumAllMonth['sumAllMonth']); ?> บาท</h5>
                    </div>
                    <div class="expenses text-center shadow-sm p-3 mb-5 bg-body rounded">
                        <h4>รายจ่าย</h4>
                        <h5><?php echo number_format($getSumAllExpenses['sumAllExpenses']); ?> บาท</h5>
                    </div>
                    <div class="remaining text-center shadow-sm p-3 mb-5 bg-body rounded">
                        <h4>คงเหลือ</h4>
                        <h5><?php echo number_format($getSumAllMonth['sumAllMonth']-$getSumAllExpenses['sumAllExpenses']); ?> บาท</h5>
                    </div>
                </div>
        </div>
        <div class="content2 ">
            <div class="ct2-box">
                <div class="vlg-head-dash">
                    <!-- Head left -->
                    <div class="vlg-head-left">
                        <!-- <div class="income-head d-flex">
                            <div class="trg-i"></div>
                            <label>รายรับ</label>
                        </div>
                        <div class="outcome-head d-flex">
                            <div class="trg-o"></div>
                            <label>รายจ่าย</label>
                        </div> -->
                    </div>
                    <!-- Head right -->
                    <div class="vlg-head-right">
                        <!--Month  -->
                        <select id="filterMonth" class="select-mty" aria-label="Filter Year" onchange="dash_filterMonth(this.value)">
                            <?php foreach ($viewFilterMonth as $monthFil) { ?>
                                <?php if($monthFil == 0){ ?>
                                    <option selected value="<?php echo $monthFil ?>"><?php echo $controller->checkMonth($monthFil) ?> </option>
                                <?php } else { ?>
                                    <option value="<?php echo $monthFil ?>"><?php echo $controller->checkMonth($monthFil) ?></option>
                                <?php } ?>;
                            <?php }?>
                        </select>

                        <!-- ไตรมาส -->
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
                <!-- Chart Dashboard -->
                <div class="chart-container mt-3">
                    <div id="main-chart">
                        <canvas id="mainChart"></canvas>
                    </div>
                </div>
            </div>

           
            

            
        </div>
        <!-- Chart status -->
        <div class="content3 ">
            <div id="chart-footer" class="chart-footer">
                    <canvas id="ch-success" class="chart-donut" ></canvas>
                    <!-- <canvas id="ch_waiting" class="chart-donut"></canvas> -->
                    <canvas id="ch_danger" class="chart-donut"></canvas>
            </div>
            <div class="title-footer">
                <h4 class="title-dash">ชำระแล้ว</h4>
                <!-- <h4 class="title-dash">รอดำเนินการ</h4> -->
                <h4 class="title-dash">ค้างชำระ</h4>
            </div>
            
        </div>
        <!-- Table Status -->
        <div class="content4 ">
            <div class="ct4-header ">
                <button class="btn btnH tablink" onclick="openVillagerDashboard('vlg-1', this, 'orange')" >ลูกบ้านค้างชำระ</button>
                <button class="btn btnH tablink" onclick="openVillagerDashboard('vlg-2', this, '#0dcaf0')" id="defaultOpen">ลูกบ้านชำระล่วงหน้า</button>
            </div>
            <div class="table-dash">
                <!-- ค้างชำระ -->
                <div id="vlg-1" class="ct4-table tabContent">
                    <table class="table table-ct4 ">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">ชื่อ</th>
                            <th scope="col" class="text-center">บ้านเลขที่</th>
                            <th scope="col" class="text-center">วันที่</th>
                            <th scope="col" class="text-center">เดือนที่ค้างชำระ</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($dataInvoice_4){ ?>
                            <?php foreach($dataInvoice_4 as $index => $invoice_4){ ?>
                                <tr>
                                <td class="text-center"><?php echo $index+1 ?></td>
                                <td class="text-nowrap"><?php echo $invoice_4['villager_fname'].' '.$invoice_4['villager_lname'] ?></td>
                                <td class="text-center"><?php echo $invoice_4['villager_housenum'] ?></td>
                                <td class="text-center"><?php echo $invoice_4['date_start'] ?></td>
                                <td class="text-center"><?php echo $controller->checkMonth($invoice_4['month']) ?></td>
                                </tr>
                            <?php }?>
                        <?php }else{?>
                            <tr>
                                <td colspan="6" class="text-center"><center>ไม่มีค้างชำระ</center></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
                <!--ชำระล่วงหน้า -->
                <div id="vlg-2" class="ct4-table tabContent">
                    <table class="table table-ct4 ">
                    <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">ชื่อ</th>
                            <th scope="col" class="text-center">บ้านเลขที่</th>
                            <th scope="col" class="text-center">วันที่</th>
                            <th scope="col" class="text-center">ชำระล่วงหน้า</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if($dataOverpay){ ?>
                            <?php foreach($dataOverpay as $index => $overPay){ ?>
                                <tr>
                                <td class="text-center"><?php echo $index+1 ?></td>
                                <td class="text-nowrap"><?php echo $overPay['villager_fname'].' '.$overPay['villager_lname'] ?></td>
                                <td class="text-center"><?php echo $overPay['villager_housenum'] ?></td>
                                <td class="text-center"><?php echo $overPay['date_start'] ?></td>
                                <td class="text-center"><?php echo $overPay['overPay']/100 ?> เดือน</td>
                                </tr>
                            <?php }?>
                        <?php }else{?>
                            <tr>
                                <td colspan="5" class="text-center"><center>ไม่มีชำระล่วงหน้า</center></td>
                            </tr>
                        <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        <!-- Main-container -->
    </div>

    <script>

        //header tab
        function openVillagerDashboard(villagerDetail, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabContent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(villagerDetail).style.display = "block";
            elmnt.style.backgroundColor = color;
        }
        document.getElementById("defaultOpen").click();
    </script>
    
    

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    <!-- <script src="../javaScript/dashboard.js"></script> -->
    <!-- chart -->
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

// Chart success waiting overdue
    //get Count invoice all
    $countMax = $chartClass->ch_donut_Year_maxData($yearNow);
    $resultCountAll = $countMax['countInvoiceAll'];

    //get count invoice status pay success
    $countInvoice = $chartClass->ch_donut_success($yearNow);
    $resultCount = $countInvoice['countInvoice'];
    $successPercent = $resultCountAll-$resultCount; //หาเปอร์เซ็น
    //push in arr
    $dataSuccess =[$resultCount, $successPercent ];


    //get count invoice status pay overdue
    $countOverdue = $chartClass->ch_donut_overdue($yearNow);
    $resultOverdue = $countOverdue['countInvoice'];
    $overduePercent = $resultCountAll-$resultOverdue; //หาเปอร์เซ็น
    //push in arr
    $dataOverdue =[$resultOverdue, $overduePercent ];
?>
<script>
        


        //chart
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

    



  const ch_success = document.getElementById('ch-success').getContext('2d');
  const data_success = {
    labels: [
        'ชำระแล้ว',
        'ยังไม่ชำระ',
    ],
    datasets: [{
      label: ' ',
      data:  <?php echo json_encode($dataSuccess); ?>,
      backgroundColor: [
        'rgba(137, 245, 188, 1)',
        'rgba(244, 244, 244, 1)',
      ],
      hoverOffset: 4
    }]
  };
  new Chart(ch_success, {
    type: 'doughnut',
    data: data_success,
  });


//..................................................chart danger
  const ch_danger = document.getElementById('ch_danger').getContext('2d');
  const data_danger = {
    labels: [
        'ค้างชำระ',
        'ไม่มีค้างชำระ',
    ],
    datasets: [{
      label: ' ',
      data: <?php echo json_encode($dataOverdue); ?>,
      backgroundColor: [
        'rgba(249, 128, 128, 1)',
        'rgba(244, 244, 244, 1)'
      ],
      hoverOffset: 4
    }]
  };
  new Chart(ch_danger, {
    type: 'doughnut',
    data: data_danger,
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

        //chart doughnut year
        $.ajax({
            type: "POST",
            url: "../components/dash_ch_doughnut_year.php",
            data:{year:year},
            success: function(data) {
                $("#chart-footer").html(data);
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

        //table dashboard  Over Payment year
        $.ajax({
            type: "POST",
            url: "../components/dash_table_overPay_year.php",
            data:{year:year},
            success: function(data) {
                $("#vlg-2").html(data);
            }
        });

        // table overdue year
        $.ajax({
            type: "POST",
            url: "../components/dash_table_overdue_year.php",
            data:{year:year},
            success: function(data) {
                $("#vlg-1").html(data);
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

            // chart doughnut tri mas filterTri
            $.ajax({
                type: "POST",
                url: "../components/dash_ch_doughnut_tri.php",
                data:{tri:tri,year:yearTri},
                success: function(data) {
                    $("#chart-footer").html(data);
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

            //table dashboard  Over Payment tri mas
            $.ajax({
                type: "POST",
                url: "../components/dash_table_overPay_tri.php",
                data:{tri:tri,year:yearTri},
                success: function(data) {
                    $("#vlg-2").html(data);
                }
            }); 

            // table dashboard overdue tri mas
            $.ajax({
                type: "POST",
                url: "../components/dash_table_overdue_tri.php",
                data:{tri:tri,year:yearTri},
                success: function(data) {
                    $("#vlg-1").html(data);
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

            // chart doughnut month filter
            $.ajax({
                type: "POST",
                url: "../components/dash_ch_doughnut_month.php",
                data:{month:month,year:yearTri},
                success: function(data) {
                    $("#chart-footer").html(data);
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

            //table dashboard  Over Payment month
            $.ajax({
                type: "POST",
                url: "../components/dash_table_overPay_month.php",
                data:{month:month,year:yearTri},
                success: function(data) {
                    $("#vlg-2").html(data);
                }
            }); 

            // table dashboard overdue month
            $.ajax({
                type: "POST",
                url: "../components/dash_table_overdue_month.php",
                data:{month:month,year:yearTri},
                success: function(data) {
                    $("#vlg-1").html(data);
                }
            });

        }
</script>
    
</body>
</html>