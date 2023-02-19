<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tri = $_POST['tri'];
    $year = $_POST['year'];



?>

<?php if ($tri == 1){
        $dataOverdue= $dashboardClass->getOverdue_tri1_dash($year);
    ?>
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
    <?php if($dataOverdue){ ?>
        <?php foreach($dataOverdue as $index => $overdue){ ?>
            <tr>
            <td class="text-center"><?php echo $index+1 ?></td>
            <td class="text-nowrap"><?php echo $overdue['villager_fname'].' '.$overdue['villager_lname'] ?></td>
            <td class="text-center"><?php echo $overdue['villager_housenum'] ?></td>
            <td class="text-center"><?php echo $overdue['date_start'] ?></td>
            <td class="text-center"><?php echo $controller->checkMonth($overdue['month']) ?></td>
            </tr>
        <?php }?>
    <?php }else{?>
        <tr>
            <td colspan="6" class="text-center"><center>ไม่มีค้างชำระ</center></td>
        </tr>
    <?php }?>
    </tbody>
</table>


<?php }else if ($tri ==2) {         
        $dataOverdue= $dashboardClass->getOverdue_tri2_dash($year);
        ?>
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
    <?php if($dataOverdue){ ?>
        <?php foreach($dataOverdue as $index => $overdue){ ?>
            <tr>
            <td class="text-center"><?php echo $index+1 ?></td>
            <td class="text-nowrap"><?php echo $overdue['villager_fname'].' '.$overdue['villager_lname'] ?></td>
            <td class="text-center"><?php echo $overdue['villager_housenum'] ?></td>
            <td class="text-center"><?php echo $overdue['date_start'] ?></td>
            <td class="text-center"><?php echo $controller->checkMonth($overdue['month']) ?></td>
            </tr>
        <?php }?>
    <?php }else{?>
        <tr>
            <td colspan="6" class="text-center"><center>ไม่มีค้างชำระ</center></td>
        </tr>
    <?php }?>
    </tbody>
</table>

        
<?php }else if($tri == 3 ){
        $dataOverdue= $dashboardClass->getOverdue_tri3_dash($year);
        ?>
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
    <?php if($dataOverdue){ ?>
        <?php foreach($dataOverdue as $index => $overdue){ ?>
            <tr>
            <td class="text-center"><?php echo $index+1 ?></td>
            <td class="text-nowrap"><?php echo $overdue['villager_fname'].' '.$overdue['villager_lname'] ?></td>
            <td class="text-center"><?php echo $overdue['villager_housenum'] ?></td>
            <td class="text-center"><?php echo $overdue['date_start'] ?></td>
            <td class="text-center"><?php echo $controller->checkMonth($overdue['month']) ?></td>
            </tr>
        <?php }?>
    <?php }else{?>
        <tr>
            <td colspan="6" class="text-center"><center>ไม่มีค้างชำระ</center></td>
        </tr>
    <?php }?>
    </tbody>
</table>
    
<?php } ?>



<?php } ?>