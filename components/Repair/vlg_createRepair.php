<?php 
require_once"../../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $topic = $_POST['topic_repair'];
    $area = $_POST['area'];

    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");


    $img = $_FILES['img_area'];
    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $img['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = "../../upload/Image_repair/" . $fileNew;

    if(in_array($fileActExt, $allow)){
            if($img['size'] > 0 && $img['error'] ==0){
                if(move_uploaded_file($img['tmp_name'],$filePath)){
                  $create_repair = $repairClass->createRepair($id, $name, $topic, $area, $fileNew, $date, 1);
                }
            }
    }
 
  }
?>