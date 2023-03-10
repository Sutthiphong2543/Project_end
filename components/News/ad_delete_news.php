<?php
require_once"../../config/connect.php";

if(isset($_POST["id"])){
    $id=$_POST["id"];
    $result= $newsClass->deleteNews($id);
}


?>