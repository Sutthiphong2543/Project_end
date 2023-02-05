<?php 
    require_once"../components/session.php";
    require_once"../components/check_admin.php";
    require_once"../config/connect.php";

    // $data = $controller->getInvoice_1();
    // foreach ( $data as $year){
    // $show= $year['date_start'];
    // $year = date('Y', strtotime($show));
    // echo $year;
    // }

$name = $fucIncome->getIncomeName();
$sumCol = 0;// sum Column

//test
// $countPayOver = $fucIncome->getCountPayOver(2);
// foreach($countPayOver as $countOverpay){
//     $resultCountOverPay = abs($countOverpay['total_amount']-$countOverpay['pay_amount']) /100;
// }
// $arr = [];
// for ($i = 1; $i <= 12; $i++) {
//     $arr[] = $i;
// }
// for($ad=1; $ad <=$resultCountOverPay;$ad++){
//     $arr[] = max($arr) + 1;
// }
// print_r($arr);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
                <button class="btn tablink" onclick="tabIOcome('table-outcome', this, '#FFCAA6')">รานจ่าย</button>
                <button class="btn tablink" onclick="tabIOcome('table-report', this, '#F86594')">สรุป</button>
                <div class="filter">
                    <!-- <button class="btn btn-filer"><i class="bi bi-sliders mx-2" ></i>2022</button> -->
                    <select class="form-select mt-2" aria-label="Default select example">
                        <option selected>2022</option>
                        <option value="1">2023</option>
                        <option value="2">2024</option>
                        <option value="3">2025</option>
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
                        $maxPay = $fucIncome->getIncomeMaxSumPay($id);

                        //get all pay
                        $sumPay = $fucIncome->getSumPay($id);
                        foreach ( $sumPay as $SumPay){
                            $resultSumPay = $SumPay['sumMonth']/100;
                        }
                        //get min month
                        $minMonth = $fucIncome->getMinMonth($id);
                        foreach ( $minMonth as $MinPay){
                            $resultMinPay = $MinPay['minMonth'];
                        }
                        
                        ?>
                        <!-- table house number and villager name -->
                        <tr >
                        <th><?php echo $name['villager_housenum'] ?></th>
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
                        <td><?php echo $ct*100  ?></td>
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
                            <td ><?php echo ($sumCol*100) ?></td>
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

  Jan.innerHTML = sumJan*100;
  Feb.innerHTML = sumFeb*100;
  Mar.innerHTML = sumMar*100;
  Apr.innerHTML = sumApr*100;
  May.innerHTML = sumMay*100;
  Jun.innerHTML = sumJun*100;
  Jul.innerHTML = sumJul*100;
  Aug.innerHTML = sumAug*100;
  Sep.innerHTML = sumSep*100;
  Oct.innerHTML = sumOct*100;
  Nov.innerHTML = sumNov*100;
  Dec.innerHTML = sumDec*100;
</script>

            <!-- table tab outcome -->
            <div id="table-outcome" class="tabContent table-income">
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


<script>


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