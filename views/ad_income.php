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
$year = date("Y");;
    
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
            <div class="head-income d-flex">
                <button class="btn tablink" onclick="tabIOcome('table-income', this, '#00ECBC')" id="defaultOpen">รายรับ</button>
                <button class="btn tablink" onclick="tabIOcome('table-outcome', this, '#FFCAA6')">รายจ่าย</button>
                <button class="btn tablink" onclick="tabIOcome('table-report', this, '#F86594')">สรุป</button>
                <div class="filter">
                    <!-- <button class="btn btn-filer"><i class="bi bi-sliders mx-2" ></i>2022</button> -->
                    
                    <select id="filterYear" class="form-select mx-1" aria-label="Filter Year" onchange="filterYear(this.value)">
                        <?php foreach ($viewFilter as $yearFil) { ?>
                            <?php if ($yearFil['date_filter'] == $year){ ?>
                                <option selected value="<?php echo $yearFil['date_filter']; ?>"><?php echo $yearFil['date_filter'] ?></option>
                            <?php } else { ?>
                                <option value="<?php echo $yearFil['date_filter']; ?>"><?php echo $yearFil['date_filter'] ?></option>
                            <?php } ?>
                        <?php }?>
                    </select>
                    
                </div>
                <div class="printer">
                    <button class="btn btn-printer"><i class="bi bi-printer mx-2" ></i>พิมพ์</button>
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
                                    echo '<td><i class="bi bi-x-circle"></i></td>';
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

  Jan.innerHTML = (sumJan*100).toLocaleString();
  Feb.innerHTML = (sumFeb*100).toLocaleString();
  Mar.innerHTML = (sumMar*100).toLocaleString();
  Apr.innerHTML = (sumApr*100).toLocaleString();
  May.innerHTML = (sumMay*100).toLocaleString();
  Jun.innerHTML = (sumJun*100).toLocaleString();
  Jul.innerHTML = (sumJul*100).toLocaleString();
  Aug.innerHTML = (sumAug*100).toLocaleString();
  Sep.innerHTML = (sumSep*100).toLocaleString();
  Oct.innerHTML = (sumOct*100).toLocaleString();
  Nov.innerHTML = (sumNov*100).toLocaleString();
  Dec.innerHTML = (sumDec*100).toLocaleString();
</script>

            <!-- table tab outcome -->
            <div id="table-outcome" class="tabContent table-income">
                <div class="second-tab">
                    <button class="btn btn-click"  id="createExpenses"><i class="bi bi-file-earmark-plus mx-1"></i> บันทึกรายจ่าย</a></button>
                </div>
                
            <table class="table" style="width:100%;">
                <thead>
                    <tr class="text-center">
                        <th scope="col" >#</th>
                        <th scope="col">เดือน</th>
                        <th scope="col">จำนวน (บาท)</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr>
                        <td scope="row" ><label class="label">1</label></td>
                        <td class="text-center"><label class="label">มกราคม</label></td>
                        <td><label class="label">12000</label></i></td>
                        <td class="text-center" style="width:20%"> <a  class="btn btn-detail" ><i class="bi bi-zoom-in mx-2"></i> ดูรายละเอียดข้อมูล</a> </td>
                    </tr>
                    
                </tbody>
                </table>
            </div>
            <!-- Modal Expenses -->

            <!-- Modal -->
            <div class="modal fade" id="expensesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>บันทึกรายจ่าย</h4>
                        <label data-bs-dismiss="modal" class="btn-close" aria-label="Close"></label>
                    </div>
                    <div class="grid-form-createExpenses">
                        <div class="form-createExpenses mt-3">
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
                                <div class="mb-3"><input type="number" class="form-control" id="input1"  value="0"></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input2"  value="0"></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input3"  value="0"></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input4"  value="0"></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input5"  value="0"></div>
                                <div class="mb-3"><input type="number" class="form-control" id="input6"  value="0"></div>
                                <div class="mb-3"><p class="total-sumInput" id="result" ></p></div>

                            </div>
                        
                        </div>
                        <div class="footer-form text-center">
                            <hr>
                            <button type="submit" class="btn btn-success">บันทึก</button>
                            <button type="submit" class="btn btn-light">ปิด</button>
                        </div>
                    </div>
                </div>
            </div>
            </div>







            <!-- table  สรุป -->
            <div id="table-report" class="tabContent table-income">
            <table class="table">
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
                    <tr >
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td>600</td>
                    </tr>
                    <tr>
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td>600</td>
                    </tr>
                    
                </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- ........................................JavaScript................................................. -->
<script>
    // CreateExpenses
    $(document).ready(function() {
        // Open modal when button is clicked
        $("#createExpenses").click(function() {
            $("#expensesModal").modal("show");
        });

        // // Submit form data to PHP script when save button is clicked
        // $("#submitBtn").click(function() {
        //     var name = $("#name").val();
        //     var email = $("#email").val();

        //     // Use AJAX to submit form data to PHP script
        //     $.ajax({
        //     type: "POST",
        //     url: "submit.php",
        //     data: { name: name, email: email },
        //     success: function(response) {
        //         // Show success message
        //         alert("Data submitted successfully!");

        //         // Close modal
        //         $("#myModal").modal("hide");
        //     }
        //     });
        // });
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



    // Filter Year
    
    function filterYear(year) {
        $.ajax({
            type: "POST",
            url: "../components/filterIncome.php",
            data:{year:year},
            success: function(data) {
                $("#table-income").html(data);
            }
        })
        
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