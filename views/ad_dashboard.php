<?php 
    require_once"../components/session.php";
    require_once"../components/check_admin.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://www.chartjs.org/samples/2.9.4/utils.js">

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
                        <select size="1" name="month" class="select-mty">
                            <option selected value="1">มกราคม</option>
                            <option value="2">กุมภาพันธ์</option>
                            <option value="3">มีนาคม</option>
                            <option value="4">เมษายน</option>
                            <option value="5">พฤษภาคม</option>
                            <option value="6">มิถุนายน</option>
                            <option value="7">กรกฎาคม</option>
                            <option value="8">สิงหาคม</option>
                            <option value="9">กันยายน</option>
                            <option value="10">ตุลาคม</option>
                            <option value="11">พฤศจิกายน</option>
                            <option value="12">ธันวาคม</option>
                        </select>

                        <!-- ไตรมาส -->
                        <select size="1" name="trimas" class="select-mty">
                            <option selected >ไตรมาส</option>
                            <option value="2">ไตรมาส 1</option>
                            <option value="3">ไตรมาส 2</option>
                            <option value="4">ไตรมาส 3</option>
                            <option value="5">ไตรมาส 4</option>
                        </select>

                        <!-- Year -->
                        <select name="select" class="select-mty">
                            <?php 
                            for($i = date('Y') ; $i >= 1999; $i--){
                                echo "<option>$i</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <!-- Chart Dashboard -->
                <div class="chart-container mt-3">
                    <canvas id="myChart"></canvas>
                </div>
            </div>


            <!-- <div class="head-ct2 ml-3 d-flex ">
                    <button class="btn"> ไตรมาส 1</button>
                    <button class="btn"> ไตรมาส 2</button>
                    <button class="btn"> ไตรมาส 3</button>
                    <button class="btn"> ไตรมาส 4</button>
                    <div class="dropdown">
                        <button class="btn" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false" ><i class="bi bi-sliders" ></i> ตัวกรอง</button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                            <li><button class="dropdown-item" type="button">Action</button></li>
                            <li><button class="dropdown-item" type="button">Another action</button></li>
                            <li><button class="dropdown-item" type="button">Something else here</button></li>
                        </ul>
                    </div>
            </div> -->
           
            

            
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
        function openVillagerDashboard(villagerDetail, elmnt, color) {
        // Hide all elements with class="tabcontent" by default */
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabContent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Remove the background color of all tablinks/buttons
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }

            // Show the specific tab content
            document.getElementById(villagerDetail).style.display = "block";

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();



    </script>
    
    

    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- <script src="../javaScript/dashboard.js"></script> -->
    <!-- chart -->
<script>
        //chart
        const ctx = document.getElementById('myChart').getContext('2d');

const data = {
  labels: ['Jan', 'Feb', 'Mar', 'April', 'Purple', 'Orange','Orange'],
  datasets: [{
    label: 'ไตรมาส',
    data: [65, 59, 80, 81, 56, 55, 40],
    backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
    borderWidth: 1
  }]
};

  new Chart(ctx, {
    type: 'bar',
    data: data,
    options: {
      scales: {
        x: {
          display: false
      },
        y: {
          beginAtZero: true
        }
      }
    },
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