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
     $viewFilterMonth = [0,1,2,3,4,5,6,7,8,9,10,11,12]
    

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
                <div class="container ">
                    <div class="income text-center shadow-sm p-3 mb-5 bg-body rounded">
                        <h4>รายรับ</h4>
                        <h5>25,000 บาท</h5>
                    </div>
                    <div class="expenses text-center shadow-sm p-3 mb-5 bg-body rounded">
                        <h4>รายจ่าย</h4>
                        <h5>20,000 บาท</h5>
                    </div>
                    <div class="remaining text-center shadow-sm p-3 mb-5 bg-body rounded">
                        <h4>คงเหลือ</h4>
                        <h5>5,000 บาท</h5>
                    </div>
                </div>
        </div>
        <div class="content2 ">
            <div class="ct2-box">
                <div class="vlg-head-dash">
                    <!-- Head left -->
                    <div class="vlg-head-left">
                        <div class="income-head d-flex">
                            <div class="trg-i"></div>
                            <label>รายรับ</label>
                        </div>
                        <div class="outcome-head d-flex">
                            <div class="trg-o"></div>
                            <label>รายจ่าย</label>
                        </div>
                    </div>
                    <!-- Head right -->
                    <div class="vlg-head-right">
                        <!--Month  -->
                        <select id="filterMonth" class="select-mty" aria-label="Filter Year" onchange="dash_filterMonth(this.value)">
                            <?php foreach ($viewFilterMonth as $monthFil) { ?>
                                <?php if($monthFil == $monthNow){ ?>
                                    <option selected value="<?php echo $monthFil ?>"><?php echo $controller->checkMonth($monthFil) ?></option>
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
        <div class="content3 text-center ">
            <div class="chart-footer d-flex">
                <div class="chart-container" style="position: relative; height:13vh; width:33vw">
                    <canvas id="ch-success" ></canvas>
                </div>
                <div class="chart-container" style="position: relative; height:13vh; width:33vw">
                    <canvas id="ch_waiting" ></canvas>
                </div>
                <div class="chart-container" style="position: relative; height:13vh; width:33vw">
                    <canvas id="ch_danger" ></canvas>
                </div>
            </div>
            <div class="title-footer d-flex m-2">
                <h3 class="title-dash">ชำระแล้ว</h3>
                <h3 class="title-dash">รอดำเนินการ</h3>
                <h3 class="title-dash">ค้างชำระ</h3>
            </div>
            
        </div>
        <!-- Table Status -->
        <div class="content4 ">
            <div class="ct4-header ">
                <button class="btn btnH tablink" onclick="openVillagerDashboard('vlg-1', this, 'orange')" id="defaultOpen">ลูกบ้านค้างชำระ</button>
                <button class="btn btnH tablink" onclick="openVillagerDashboard('vlg-2', this, '#0dcaf0')">ลูกบ้านชำระล่วงหน้า</button>
            </div>
            <div class="table-dash">
                <!-- ค้างชำระ -->
                <div id="vlg-1" class="ct4-table tabContent">
                    <table class="table table-ct4 ">
                        <thead>
                            <tr>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">บ้านเลขที่</th>
                            <th scope="col">ยอดค้างชำระ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>นางสาวฐา วันดี</td>
                                <td>241/1</td>
                                <td>2 เดือน</td>
                            </tr>
                            <tr>
                                <td>นางสาวฐา วันดี</td>
                                <td>241/1</td>
                                <td>2 เดือน</td>
                            </tr>
                            <tr>
                                <td>นางสาวฐา วันดี</td>
                                <td>241/1</td>
                                <td>2 เดือน</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--ชำระล่วงหน้า -->
                <div id="vlg-2" class="ct4-table tabContent">
                    <table class="table table-ct4 ">
                        <thead>
                            <tr>
                            <th scope="col">ชื่อ</th>
                            <th scope="col">บ้านเลขที่</th>
                            <th scope="col">ชำระล่วงหน้า</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>นางสาวฐา วันดี</td>
                                <td>241/1</td>
                                <td>2 เดือน</td>
                            </tr>
                            <tr>
                                <td>นางสาวฐา วันดี</td>
                                <td>241/1</td>
                                <td>2 เดือน</td>
                            </tr>
                            <tr>
                                <td>นางสาวฐา วันดี</td>
                                <td>241/1</td>
                                <td>2 เดือน</td>
                            </tr>
                            <tr>
                                <td>นางสาวฐา วันดี</td>
                                <td>241/1</td>
                                <td>2 เดือน</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
        <!-- Main-container -->
    </div>

    <script>
        //filter year
        function filterYear(year) {
        $('#filterTri')[0].selectedIndex = 0; //reset tri mas  when click select year
        
        $.ajax({
            type: "POST",
            url: "../components/dash_filterYear.php",
            data:{year:year},
            success: function(data) {
                $("#main-chart").html(data);
            }
        });
        }

        // filter tri mas
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
        }

        //filter month
        
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
        }



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
    <!-- <script src="../javaScript/dashboard.js"></script> -->
    <!-- chart -->
<?php 
// get month thai
$labelMonth[] =$controller->checkMonthThai($monthNow);
// get income month 
$M_CH = $chartClass->getCh_income_month($monthNow,$yearNow);
 $dataIncome_month = [$M_CH['sumMonth']];
// get expenses month
$income_month = $chartClass->getCh_expenses($monthNow,$yearNow);
 $dataExpenses_month = [$income_month['expenses_total']];
?>
<script>
        


        //chart
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



  const ch_success = document.getElementById('ch-success').getContext('2d');
  const data_success = {
    labels: [
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [300, 50, 100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]
  };
  new Chart(ch_success, {
    type: 'doughnut',
    data: data_success,
  });

  const ch_waiting = document.getElementById('ch_waiting').getContext('2d');
  const data_waiting = {
    labels: [
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [300, 50, 100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]
  };
  new Chart(ch_waiting, {
    type: 'doughnut',
    data: data_waiting,
  });

  const ch_danger = document.getElementById('ch_danger').getContext('2d');
  const data_danger = {
    labels: [
    ],
    datasets: [{
      label: 'My First Dataset',
      data: [300, 50, 100],
      backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)'
      ],
      hoverOffset: 4
    }]
  };
  new Chart(ch_danger, {
    type: 'doughnut',
    data: data_danger,
  });
</script>
    
</body>
</html>