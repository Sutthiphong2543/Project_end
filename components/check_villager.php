<?php 
require_once "../config/connect.php";

if(!isset($_SESSION["villagers_id"])){
    header("Location:..\login.php");
}else{
    $id=$_SESSION["villagers_id"];
    $vlg=$controller->getVillagerProfile($id);
    // print_r ($vlg);
}
?>