<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $tri = $_POST['tri'];
    $year = $_POST['year'];


?>
<?php 
if($tri == 1){ // tri mas 1
// Chart success waiting overdue
    //get Count invoice all
    $countMax = $chartClass->ch_donut_Tri1_maxData($year);
    $resultCountAll = $countMax['countInvoiceAll'];
//success
    //get count invoice status pay success
    $countInvoice = $chartClass->ch_donut_tri1_success($year);
    $resultCount = $countInvoice['countInvoice'];
    $successPercent = $resultCountAll-$resultCount; //หาเปอร์เซ็น
    //push in arr
    $dataSuccess =[$resultCount, $successPercent ];

//OverPay
    //get count overPay
    $countOverPay = $chartClass->ch_donut_tri1_overPay($year);
    $resultOverPay = $countOverPay['countInvoice'];
    $overPayPercent = $resultCountAll-$resultOverPay; //หาเปอร์เซ็น
    //push in arr
    $dataOverPay =[$resultOverPay, $overPayPercent ];

//Overdue
    //get count invoice status pay overdue
    $countOverdue = $chartClass->ch_donut_tri1_overdue($year);
    $resultOverdue = $countOverdue['countInvoice'];
    $overduePercent = $resultCountAll-$resultOverdue; //หาเปอร์เซ็น
    //push in arr
    $dataOverdue =[$resultOverdue, $overduePercent ];
?>
        <canvas id="ch-success" class="chart-donut" ></canvas>
        <canvas id="ch_overPay" class="chart-donut"></canvas>
        <canvas id="ch_danger" class="chart-donut"></canvas>
        <script>
    {
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

        //..................................................over 
        const ch_overPay = document.getElementById('ch_overPay').getContext('2d');
        const data_overPay = {
            labels: [
                'จ่ายล่วงหน้า',
                'ไม่จ่ายล่วงหน้า',
            ],
            datasets: [{
            label: ' ',
            data:  <?php echo json_encode($dataOverPay); ?>,
            backgroundColor: [
                'rgba(255, 203, 68, 1)',
                'rgba(244, 244, 244, 1)',
            ],
            hoverOffset: 4
            }]
        };
        new Chart(ch_overPay, {
            type: 'doughnut',
            data: data_overPay,
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

    }
</script>
<?php }else if($tri ==2){ 
    // tri mas 2
// Chart success waiting overdue
    //get Count invoice all
    $countMax = $chartClass->ch_donut_Tri2_maxData($year);
    $resultCountAll = $countMax['countInvoiceAll'];
//success
    //get count invoice status pay success
    $countInvoice = $chartClass->ch_donut_tri2_success($year);
    $resultCount = $countInvoice['countInvoice'];
    $successPercent = $resultCountAll-$resultCount; //หาเปอร์เซ็น
    //push in arr
    $dataSuccess =[$resultCount, $successPercent ];

//OverPay
    //get count overPay
    $countOverPay = $chartClass->ch_donut_tri2_overPay($year);
    $resultOverPay = $countOverPay['countInvoice'];
    $overPayPercent = $resultCountAll-$resultOverPay; //หาเปอร์เซ็น
    //push in arr
    $dataOverPay =[$resultOverPay, $overPayPercent ];


//Overdue
    //get count invoice status pay overdue
    $countOverdue = $chartClass->ch_donut_tri2_overdue($year);
    $resultOverdue = $countOverdue['countInvoice'];
    $overduePercent = $resultCountAll-$resultOverdue; //หาเปอร์เซ็น
    //push in arr
    $dataOverdue =[$resultOverdue, $overduePercent ];
?>
        <canvas id="ch-success" class="chart-donut" ></canvas>
        <canvas id="ch_overPay" class="chart-donut"></canvas>
        <canvas id="ch_danger" class="chart-donut"></canvas>
        <script>
    {
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

        //..................................................over 
        const ch_overPay = document.getElementById('ch_overPay').getContext('2d');
        const data_overPay = {
            labels: [
                'จ่ายล่วงหน้า',
                'ไม่จ่ายล่วงหน้า',
            ],
            datasets: [{
            label: ' ',
            data:  <?php echo json_encode($dataOverPay); ?>,
            backgroundColor: [
                'rgba(255, 203, 68, 1)',
                'rgba(244, 244, 244, 1)',
            ],
            hoverOffset: 4
            }]
        };
        new Chart(ch_overPay, {
            type: 'doughnut',
            data: data_overPay,
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

    }
</script> 
<?php }else if($tri == 3){     // tri mas 3
// Chart success waiting overdue
    //get Count invoice all
    $countMax = $chartClass->ch_donut_Tri3_maxData($year);
    $resultCountAll = $countMax['countInvoiceAll'];
//success
    //get count invoice status pay success
    $countInvoice = $chartClass->ch_donut_tri3_success($year);
    $resultCount = $countInvoice['countInvoice'];
    $successPercent = $resultCountAll-$resultCount; //หาเปอร์เซ็น
    //push in arr
    $dataSuccess =[$resultCount, $successPercent ];

//OverPay
    //get count overPay
    $countOverPay = $chartClass->ch_donut_tri3_overPay($year);
    $resultOverPay = $countOverPay['countInvoice'];
    $overPayPercent = $resultCountAll-$resultOverPay; //หาเปอร์เซ็น
    //push in arr
    $dataOverPay =[$resultOverPay, $overPayPercent ];


//Overdue
    //get count invoice status pay overdue
    $countOverdue = $chartClass->ch_donut_tri3_overdue($year);
    $resultOverdue = $countOverdue['countInvoice'];
    $overduePercent = $resultCountAll-$resultOverdue; //หาเปอร์เซ็น
    //push in arr
    $dataOverdue =[$resultOverdue, $overduePercent ];
?>
        <canvas id="ch-success" class="chart-donut" ></canvas>
        <canvas id="ch_overPay" class="chart-donut"></canvas>
        <canvas id="ch_danger" class="chart-donut"></canvas>
<script>
    {
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

        //..................................................over 
        const ch_overPay = document.getElementById('ch_overPay').getContext('2d');
        const data_overPay = {
            labels: [
                'จ่ายล่วงหน้า',
                'ไม่จ่ายล่วงหน้า',
            ],
            datasets: [{
            label: ' ',
            data:  <?php echo json_encode($dataOverPay); ?>,
            backgroundColor: [
                'rgba(255, 203, 68, 1)',
                'rgba(244, 244, 244, 1)',
            ],
            hoverOffset: 4
            }]
        };
        new Chart(ch_overPay, {
            type: 'doughnut',
            data: data_overPay,
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

    }
</script> 
<?php } ?>
<!-- end if -->

<?php } ?>