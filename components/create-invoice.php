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

    $idVlg = $controller->getIdUsers();
    foreach ($idVlg as $key){
        $vlg_id = $key['villager_id'];
        $createInvoice = $controller->insertInvoice($vlg_id,$month, $invoice_cmf, $elect_bill, $water_bill, $another_bill, $date_start, $date_end);
        
        if($createInvoice){
            header("Location:../views/ad_payment.php?title=payment");
        }

    }
}else{
    header("Location:../views/ad_payment.php?title=payment");
}
?>