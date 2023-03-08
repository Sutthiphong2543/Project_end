<?php
require_once'../config/connect.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $date = $_POST['date'];
  $input1 = $_POST['input1'];
  $input2 = $_POST['input2'];
  $input3 = $_POST['input3'];
  $input4 = $_POST['input4'];
  $input5 = $_POST['input5'];
  $input6 = $_POST['input6'];


  $total = $input1+$input2+$input3+$input4+$input5+$input6;


  
  $result = $fucIncome->createExpenses($input1,$input2,$input3,$input4,$input5,$input6,$date,$total);
  
  exit;
}
?>