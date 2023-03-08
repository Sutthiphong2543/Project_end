<?php 
require_once"../../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $detail = $_POST['detailAppeals'];
    $area = $_POST['num_home'];

    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");

    // echo $id.':'.$name.':'.$detail.':'.$area.':'.$date;
    $createAppeal = $repairClass->createAppeal($id, $name, $detail, $area, $date, 1);
    
 
  }
?>