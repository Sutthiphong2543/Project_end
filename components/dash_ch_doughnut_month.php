<?php 
require_once"../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $month = $_POST['month'];
    $year = $_POST['year'];

    //get Count invoice all
    $countMax = $chartClass->ch_donut_month_maxData($month,$year);
    $resultCountAll = $countMax['countInvoiceAll'];
//success
    //get count invoice status pay success
    $countInvoice = $chartClass->ch_donut_month_success($month,$year);
    $resultCount = $countInvoice['countInvoice'];
    $successPercent = $resultCountAll-$resultCount; //หาเปอร์เซ็น
    //push in arr
    $dataSuccess =[$resultCount, $successPercent ];

//Overdue
    //get count invoice status pay overdue
    $countOverdue = $chartClass->ch_donut_month_overdue($month,$year);
    $resultOverdue = $countOverdue['countInvoice'];
    $overduePercent = $resultCountAll-$resultOverdue; //หาเปอร์เซ็น
    //push in arr
    $dataOverdue =[$resultOverdue, $overduePercent ];
    

?>
       <canvas id="ch-success" class="chart-donut" ></canvas>
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