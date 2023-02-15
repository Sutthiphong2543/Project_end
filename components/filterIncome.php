<?php 
require_once"../config/connect.php";

    if(isset($_POST['year'])){
        $year = $_POST['year'];

        $name = $fucIncome->getIncomeName();
        $sumCol = 0;// sum Column
    
?>
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
                                    // echo '<td><i class="bi bi-x-circle"></i></td>';
                                    echo '<td></td>';
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
<?php } ?>