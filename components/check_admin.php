<?php 
require_once "../config/connect.php";

if(!isset($_SESSION["admin_id"])){
    header("Location:..\login.php");
}else{
    $id=$_SESSION["admin_id"];
    $legal = $user->getProfileLegal($id);
}
?>