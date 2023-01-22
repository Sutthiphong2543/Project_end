<?php 
session_start();
require_once "../config/connect.php";



if(isset($_POST['create-invoice'])){
    $month = $_POST['month'];
    $invoice_cmf = $_POST['invoice-cmf'];
    $elect_bill = $_POST['elect-bill'];
    $water_bill = $_POST['water-bill'];
    $another_bill = $_POST['another-bill'];
    $date_start = $_POST['date-start'];
    $date_end = $_POST['date-end'];

    $idVlg = $controller->getIdVillagers();
    

// เช็คว่าลูกบ้านมีค้างชำระหรือไม่

    foreach ($idVlg as $key) {
        $vlg_id = $key['villager_id'];
        $ovd = $controller->checkOverDues_2($month, $vlg_id, '4'); // เช็คว่ามีค้างชำระไหม
        if($ovd){   //ถ้ามี
            $sumCount = $controller->checkSumOverDues($key['villager_id'], '4'); //ดึงข้อมูลว่ามีค้างกี่เดือน
            foreach($sumCount as $count){
                $invoice_ovd = $count['sumOVD'] * 100;
                $sumTotal= $invoice_cmf+ $invoice_ovd+ $elect_bill + $water_bill + $another_bill;   //ได้จำนวนเดือนที่ค้าง มาคูณ ราคา ค่าส่วนกลาง
            }
            $createInvoice = $controller->insertInvoice($vlg_id,$month, $invoice_cmf, $elect_bill, $water_bill, $another_bill,$invoice_ovd,$sumTotal, $date_start, $date_end);  //สร้างใบแจ้ง
            if($createInvoice){
                header("Location:../views/ad_payment.php?title=payment");
            }
        }else{
            $notInvoice_ovd = 0;
            $total = $invoice_cmf + $elect_bill + $water_bill + $another_bill+$notInvoice_ovd;
            $createInvoice = $controller->insertInvoice($vlg_id,$month, $invoice_cmf, $elect_bill, $water_bill, $another_bill,$notInvoice_ovd,$total, $date_start, $date_end);
            
            if($createInvoice){
                header("Location:../views/ad_payment.php?title=payment");
            }
        }
    }


// True
    // foreach ($idVlg as $key){
    //     $vlg_id = $key['villager_id'];
    //     $createInvoice = $controller->insertInvoice($vlg_id,$month, $invoice_cmf, $elect_bill, $water_bill, $another_bill, $date_start, $date_end);
        
    //     if($createInvoice){
    //         header("Location:../views/ad_payment.php?title=payment");
    //     }

    // }
}else{
    header("Location:../views/ad_payment.php?title=payment");
}
?>