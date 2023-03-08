<?php 
    require_once"../components/session.php";
    require_once"../components/check_admin.php";
    require_once"../config/connect.php";


$name = $fucIncome->getIncomeName();
$sumCol = 0;// sum Column

//Filter Year
$viewFilter = $filterClass->filterYear();

//Get Max Year
date_default_timezone_set("Asia/Bangkok");
$year = date("Y");
//Get Expenses
$expenses = $fucIncome->getExpenses($year);  
//Get Reports
$report = $fucIncome->getReport($year);


//select options Tri
$Tri =[0,1,2,3];

//test


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Use Ajax -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>  
    
    <link rel="stylesheet" href="../css/income.css ?<?php echo time(); ?>">
    <title>income</title>
</head>
<body>
<?php require_once'../components/ad_template.php'?>
<!-- .......................... -->
    <div class="main-container ">
        <div class="main-income">
            <div class="head-income">
                <div class="head-income-left">
                    <button class="btn tablink btn-head" onclick="tabIOcome('table-income', this, '#00ECBC')" id="defaultOpen">รายรับ</button>
                    <button class="btn tablink btn-head" onclick="tabIOcome('table-outcome', this, '#FFCAA6')">รายจ่าย</button>
                    <button class="btn tablink btn-head" onclick="tabIOcome('table-report', this, '#F86594')">สรุป</button>
                </div>
                <div class="head-income-right text-end">
                    <select id="filterTri" class="form-select " aria-label="Filter Year" onchange="filterTri(this.value)">
                        <?php foreach ($Tri as $viewTri) { ?>
                            <?php if($viewTri == 0){ ?>
                                <option selected value="<?php echo $viewTri; ?>"><?php echo $filterClass->filterTri( $viewTri); ?></option>
                            <?php }else{ ?>
                                <option  value="<?php echo $viewTri; ?>"><?php echo $filterClass->filterTri( $viewTri); ?></option>
                            <?php }?>
                        <?php }?>
                    </select>
                    <select id="filterYear" class="form-select mx-2" aria-label="Filter Year" onchange="filterYear(this.value)">
                        <?php foreach ($viewFilter as $yearFil) { ?>
                            <?php if ($yearFil['date_filter'] == $year){ ?>
                                <option selected value="<?php echo $yearFil['date_filter']; ?>"><?php echo $yearFil['date_filter'] ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $yearFil['date_filter']; ?>"><?php echo $yearFil['date_filter'] ?></option>
                            <?php } ?>
                        <?php }?>
                    </select>
                    <div class="printer">
                        <button class="btn btn-printer" onclick="window.print();" ><i class="bi bi-printer mx-2" ></i>พิมพ์</button>
                    </div>
                </div>
            </div>
                <div id="table-income" class="tabContent table-income">
                    <table id="income-table" class="table">
                    <thead>
                        <tr class="text-center">
                        <th scope="col" >บ้านเลขที่</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">Jan.</th>
                        <th scope="col">Feb.</th>
                        <th scope="col">Mar.</th>
                        <th scope="col">Apr.</th>
                        <th scope="col">May.</th>
                        <th scope="col">Jun.</th>
                        <th scope="col">Jul.</th>
                        <th scope="col">Aug.</th>
                        <th scope="col">Sep.</th>
                        <th scope="col">Oct.</th>
                        <th scope="col">Nov.</th>
                        <th scope="col">Dec.</th>
                        <th scope="col">รวม</th>
                        
                        </tr>
                    </thead>
                    <tbody class="text-center">
                    <?php foreach ($name as $name) {
                        $id = $name['villager_id'];
                        $maxPay = $fucIncome->getIncomeMaxSumPay($id,$year);

                        //get all pay
                        $sumPay = $fucIncome->getSumPay($id,$year);
                        foreach ( $sumPay as $SumPay){
                            $resultSumPay = $SumPay['sumMonth']/100;
                        }
                        //get min month
                        $minMonth = $fucIncome->getMinMonth($id,$year);
                        foreach ( $minMonth as $MinPay){
                            $resultMinPay = $MinPay['minMonth'];
                        }
                        
                        ?>
                        <!-- table house number and villager name -->
                        <tr >
                        <td><?php echo $name['villager_housenum'] ?></td>
                        <td class="text-start"><?php echo $name['villager_fname'].' '.$name['villager_lname'] ?></td>
                        
                        <!-- loop create icons -->
                        <?php foreach ($maxPay as $count) {
                            $ct = $count['countM'];
                            $sumCol +=$ct;  // sum total column
                            for ($i = 1; $i <= 12; $i++) { //loop 12 month
                                if($i >= $resultMinPay){ //Check Month Pay First
                                    if($i<=  $resultSumPay+($resultMinPay-1)){ // +($resultMinPay-1) มาจาก เขาเริ่มจ่ายที่เดือนอะไรลบด้วย 1
                                        echo '<td><i class="bi bi-check-circle-fill"></i></td>';
                                    }else{
                                        echo '<td><i class="bi bi-x-circle"></i></td>';
                                    }
                                }else if($i < $resultMinPay){
                                    // echo '<td><i class="bi bi-x-circle"></i></td>';
                                    echo '<td></td>';
                                }
                            }
                        ?>
                        <td><?php echo number_format(($ct*100),0,'.',',')  ?></td>
                        <?php } ?>
                        </tr>
                    <?php } ?>
                        <tr id="totalRow">
                            <td colspan="2">รวม</td>
                            <td ><label id="Jan"></label></td>
                            <td ><label id="Feb"></label></td>
                            <td ><label id="Mar"></label></td>
                            <td ><label id="Apr"></label></td>
                            <td ><label id="May"></label></td>
                            <td ><label id="Jun"></label></td>
                            <td ><label id="Jul"></label></td>
                            <td ><label id="Aug"></label></td>
                            <td ><label id="Sep"></label></td>
                            <td ><label id="Oct"></label></td>
                            <td ><label id="Nov"></label></td>
                            <td ><label id="Dec"></label></td>
                            <td ><?php echo number_format(($sumCol*100),0,'.',',') ?></td>
                        </tr>
                    </tbody>
                    </table>
                </div>

<script> // เช็คว่าคอลัมน์ที่ ..  มี ตนจ่ายทั้งหมดกี่คน
  var table = document.getElementById("income-table");

  var Jan = document.getElementById("Jan");
  var Feb = document.getElementById("Feb");
  var Mar = document.getElementById("Mar");
  var Apr = document.getElementById("Apr");
  var May = document.getElementById("May");
  var Jun = document.getElementById("Jun");
  var Jul = document.getElementById("Jul");
  var Aug = document.getElementById("Aug");
  var Sep = document.getElementById("Sep");
  var Oct = document.getElementById("Oct");
  var Nov = document.getElementById("Nov");
  var Dec = document.getElementById("Dec");

  var sumJan = 0;
  var sumFeb = 0;
  var sumMar = 0;
  var sumApr = 0;
  var sumMay = 0;
  var sumJun = 0;
  var sumJul = 0;
  var sumAug = 0;
  var sumSep = 0;
  var sumOct = 0;
  var sumNov = 0;
  var sumDec = 0;
  
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[2].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumJan++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[3].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumFeb++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[4].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumMar++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[5].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumApr++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[6].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumMay++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[7].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumJun++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[8].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumJul++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[9].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumAug++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[10].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumSep++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[11].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumOct++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[12].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumNov++;
    }
  }
  for (var i = 0; i < table.rows.length; i++) {
    if (table.rows[i].cells[13].innerHTML == '<i class="bi bi-check-circle-fill"></i>') {
        sumDec++;
    }
  }



  let totalJan = (sumJan*100).toLocaleString();
  let totalFeb = (sumFeb*100).toLocaleString();
  let totalMar = (sumMar*100).toLocaleString();
  let totalApr = (sumApr*100).toLocaleString();
  let totalMay = (sumMay*100).toLocaleString();
  let totalJun = (sumJun*100).toLocaleString();
  let totalJul = (sumJul*100).toLocaleString();
  let totalAug = (sumAug*100).toLocaleString();
  let totalSep = (sumSep*100).toLocaleString();
  let totalOct = (sumOct*100).toLocaleString();
  let totalNov = (sumNov*100).toLocaleString();
  let totalDec = (sumDec*100).toLocaleString();

 
  Jan.innerHTML = totalJan;
  Feb.innerHTML = totalFeb;
  Mar.innerHTML = totalMar;
  Apr.innerHTML = totalApr;
  May.innerHTML = totalMay;
  Jun.innerHTML = totalJun;
  Jul.innerHTML = totalJul;
  Aug.innerHTML = totalAug;
  Sep.innerHTML = totalSep;
  Oct.innerHTML = totalOct;
  Nov.innerHTML = totalNov;
  Dec.innerHTML = totalDec;


</script>

            <!-- table tab outcome -->
            <div id="table-outcome" class="tabContent table-income ">
                <div class="second-tab mt-2">
                    <button class="btn btn-click"  id="createExpenses"><i class="bi bi-file-earmark-plus mx-1"></i> บันทึกรายจ่าย</a></button>
                </div>
                
            <table id="expenses" class="table table-striped " style="width:100%;">
                <thead>
                    <tr class="text-center">
                        <th scope="col" >#</th>
                        <th scope="col">เดือน</th>
                        <th scope="col">จำนวน (บาท)</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach($expenses as $index => $viewExpenses){ 
                        $date = new DateTime($viewExpenses['expenses_date']); 
                        $month = $date->format('m');
                        ?>
                    <tr>
                        <td scope="row" ><label class="label"><?php echo $index+1 ?></label></td>
                        <td class="text-center"><label class="label"><?php echo $controller->checkMonth($month)  ?></label></td>
                        <td class="text-end" style="width:20%"><label class="label"><?php echo $expensesTotal = number_format($viewExpenses['expenses_total']) ?></label></i></td>
                        <td class="text-center" style="width:30%"> <a type="button" class="btn btn-detail" data-bs-toggle="modal" data-bs-target="#ExpensesModal<?php echo $viewExpenses['expenses_id'] ?>">
                            <i class="bi bi-zoom-in mx-2"></i> ดูรายละเอียดข้อมูล
                        </a> </td>
                    </tr>

                    <!-- Modal Expenses-->
                    <div class="modal fade" id="ExpensesModal<?php echo $viewExpenses['expenses_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <label data-bs-dismiss="modal" class="btn-close" aria-label="Close"></label>
                            </div>
                            <div class="grid-form-createExpenses">
                                <div class="select-month text-center ">
                                    <h3>รายละเอียดบันทึกรายจ่ายเดือน <?php echo $controller->checkMonth($month)  ?></h3>
                                </div>
                                <div class="form-createExpenses mt-1">
                                    <div class="expensesLeft pd-l">
                                            <div class="mb-3"><h5>รายการ</h5></div>
                                            <div class="mb-3"><label class="form-label mt-2" >ค่าเก็บขยะ</label></div>
                                            <div class="mb-3"><label class="form-label mt-2" >ค่าไฟ</label></div>
                                            <div class="mb-3"><label class="form-label mt-2" >ค่าคนดูแลค่าส่วนกลาง</label></div>
                                            <div class="mb-3"><label class="form-label mt-2" >ค่าคนดูแลโรงขยะ</label></div>
                                            <div class="mb-3"><label class="form-label mt-2" >ค่าจ้างช่าง</label></div>
                                            <div class="mb-3"><label class="form-label mt-2" >อื่นๆ</label></div>
                                            <div class="mb-3"><h5>รวม</h5></div>
                                    </div>
                                    <div class="expensesRight pd-r">
                                        <div class="mb-3 pl-2 text-end"><h5>จำนวน (บาท)</h5></div>
                                        <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['waste_collection_fee'])  ?></label></div>
                                        <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['electric_fee'])  ?></label></div>
                                        <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['central_caretaker_fee'])  ?></label></div>
                                        <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['garbage_maintenance_fee'])  ?></label></div>
                                        <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['mechanic_wages'])  ?></label></div>
                                        <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['another'])  ?></label></div>
                                        <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['expenses_total']).' '.'บาท'  ?></label></div>
                                        

                                    </div>
                                
                                </div>
                                <div class="footer-form text-center">
                                    <hr>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php } ?>
                </tbody>
                </table>
            </div>

            <!-- Modal Create-->
            <div class="modal fade" id="expensesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>บันทึกรายจ่าย</h4>
                        <label data-bs-dismiss="modal" class="btn-close" aria-label="Close"></label>
                    </div>
                    <form id="form-expenses" enctype="multipart/form-data">
                    <div class="grid-form-createExpenses">
                        <div class="select-month  ">
                            <label class="form-label">เลือก วัน / เดือน /ปี</label>
                            <input type="date" class="form-control form-date " id="fname"  name="date" required>
                        </div>
                        <div class="form-createExpenses mt-1">
                            <div class="expensesLeft pd-l">
                                    <div class="mb-3"><h5>รายการ</h5></div>
                                    <div class="mb-3"><label class="form-label mt-2" >ค่าเก็บขยะ</label></div>
                                    <div class="mb-3"><label class="form-label mt-2" >ค่าไฟ</label></div>
                                    <div class="mb-3"><label class="form-label mt-2" >ค่าคนดูแลค่าส่วนกลาง</label></div>
                                    <div class="mb-3"><label class="form-label mt-2" >ค่าคนดูแลโรงขยะ</label></div>
                                    <div class="mb-3"><label class="form-label mt-2" >ค่าจ้างช่าง</label></div>
                                    <div class="mb-3"><label class="form-label mt-2" >อื่นๆ</label></div>
                                    <div class="mb-3"><h5>รวม</h5></div>
                            </div>
                            <div class="expensesRight pd-r">
                                <div class="mb-3"><h5>จำนวน (บาท)</h5></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input1" name="input1"  value="0"></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input2" name="input2" value="0"></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input3" name="input3" value="0"></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input4" name="input4" value="0"></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input5" name="input5" value="0"></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input6" name="input6"  value="0"></div>
                                <div class="mb-3"><p class="total-sumInput" id="result" ></p></div>

                            </div>
                        
                        </div>
                        <div class="upload-file">
                            <div class="form-group">
                                <label class="form-label">แนบไฟล์</label>
                                <input type="file" name="uploadFile" class="form-control">
                            </div>
                        </div>
                        <div class="footer-form text-center">
                            <hr>
                            <button type="submit" class="btn btn-head">บันทึก</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            </div>
            







            <!-- table  สรุป -->
            <div id="table-report" class="tabContent table-income">
            <table id="report-table" class="table table-striped">
                <thead>
                    <tr class="text-center">
                    <th scope="col" >#</th>
                    <th scope="col">เดือน</th>
                    <th scope="col" class="text-end">รายรับ (บาท)</th>
                    <th scope="col" class="text-end">รายจ่าย (บาท)</th>
                    <th scope="col" class="text-end">คงเหลือ (บาท)</th>
                    
                    </tr>
                </thead>
                <tbody class="text-center">
                <?php foreach($report as $index => $viewReport){ 
                    $date = new DateTime($viewReport['expenses_date']); 
                    $month = $date->format('m');

                    //Get Sum total all months
                    $sumTotalMonth = $fucIncome->getSumTotalMonth($month,$year);
                    $getSumAllMonth = $fucIncome->getSumAllMonth($year);
                    $getSumAllExpenses = $fucIncome->getSumAllExpenses($year);
                    ?>
                    <tr  style="height: 55px;">
                        <th ><?php echo $index+1 ?></th>
                        <td class="text-start"><?php echo $controller->checkMonth($month)  ?></td>
                        <td class="text-end"><?php echo number_format($sumTotalMonth['sumMonth']); ?></i></td>
                        <td class="text-end"><?php echo number_format($viewReport['expenses_total']); ?></td>
                        <td class="text-end"><?php echo number_format($sumTotalMonth['sumMonth']-$viewReport['expenses_total']) ?></td>
                    </tr>
                <?php } ?>
                    <tr id="totalReportRow">
                        <td colspan="2">รวม</td>
                        <td class="text-end"><label id="totalIncome"><?php echo number_format($getSumAllMonth['sumAllMonth']); ?></label></td>
                        <td class="text-end"><label id="totalExpenses"><?php echo number_format($getSumAllExpenses['sumAllExpenses']); ?></label></td>
                        <td class="text-end"><label id="totalRemaining"><?php echo number_format($getSumAllMonth['sumAllMonth']-$getSumAllExpenses['sumAllExpenses']); ?></label></td>
                    </tr>
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ........................................JavaScript................................................. -->
<!-- <script src="https://code.jquery.com/jquery-3.6.3.js" ></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
 
    // CreateExpenses
    $(document).ready(function() {
        // Open modal when button is clicked
        $("#createExpenses").click(function() {
            $("#expensesModal").modal("show");
        });

        $("#form-expenses").submit(function(e) {
            e.preventDefault();
            var formExpenses = $(this).serialize();
            $.ajax({
                type: "POST",
                url: "../components/createExpenses.php",
                data: formExpenses,
                success: function(data) {
                    $("#expensesModal").modal("hide");
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'Save Success ',
                            text: ' บันทึกเรียบร้อยแล้ว',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 2000);
                    });
                    
                }
            });
        });
    });

    //Calculate 
    document.getElementById("input1").addEventListener("input", calculate);
    document.getElementById("input2").addEventListener("input", calculate);
    document.getElementById("input3").addEventListener("input", calculate);
    document.getElementById("input4").addEventListener("input", calculate);
    document.getElementById("input5").addEventListener("input", calculate);
    document.getElementById("input6").addEventListener("input", calculate); // Add event listener for result element 
        
    function calculate() {
        var input1 = parseInt(document.getElementById("input1").value);
        var input2 = parseInt(document.getElementById("input2").value);
        var input3 = parseInt(document.getElementById("input3").value);
        var input4 = parseInt(document.getElementById("input4").value);
        var input5 = parseInt(document.getElementById("input5").value);
        var input6 = parseInt(document.getElementById("input6").value);
        var result = (input1 + input2 + input3 + input4 + input5 + input6).toLocaleString();  // Added missing "+" operator 
        

        document.getElementById('result').innerHTML = result + " " + "บาท"; // Changed "result" to 'result' to match the id of the element  

    }
    //input format



    // Filter incomes
    function filterYear(year) {
        $('#filterTri')[0].selectedIndex = 0; //reset tri mas  when click select year

        //
        $.ajax({
            type: "POST",
            url: "../components/filterIncome.php",
            data:{year:year},
            success: function(data) {
                $("#table-income").html(data);
            }
        });
        // Filter incomes
        $.ajax({
            type: "POST",
            url: "../components/filterExpenses.php",
            data:{year:year},
            success: function(data) {
                $("#expenses").html(data);
            }
        });
        // Filter reports
        $.ajax({
            type: "POST",
            url: "../components/filterReport.php",
            data:{year:year},
            success: function(data) {
                $("#report-table").html(data);
            }
        });

        
    }

    function filterTri(tri){
            // Filter Tri mas
            let yearTri = document.getElementById("filterYear").value;
            $.ajax({
                type: "POST",
                url: "../components/filterTri.php",
                data:{tri:tri,year:yearTri},
                success: function(data) {
                    $("#report-table").html(data);
                }
            }); 
        }
 


     // header tab
     

     function tabIOcome(villagerDetail, elmnt, color) {
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

            // show button trimas
            if(villagerDetail =='table-report'){
                $('#filterTri').show().css("grid-template-columns", "auto auto auto");
            }else{
                $('#filterTri').hide().css("grid-template-columns", "auto auto ");
            }
            // Show the specific tab content
            document.getElementById(villagerDetail).style.display = "block";
            

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
</script>
</body>
</html>