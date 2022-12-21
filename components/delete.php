<?php
require_once "../config/connect.php";

if(!isset($_GET["id"])){
    header("Location:../views/ad_villager.php");
}else{
    $id=$_GET["id"];
    $result=$controller->delete($id);
    if($result){
        header("location:../views/ad_villager.php");
    }
}


?>