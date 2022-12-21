<?php
 require_once "../config/connect.php";

    if(isset($_POST["submit"])){
        $villager_id = $_POST["villager_id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $telephone = $_POST["telephone"];
        $house_number = $_POST["house_number"];
        $role_id = $_POST["role_id"];

        $result=$controller->update($fname,$lname,$telephone,$house_number,$role_id,$villager_id);
        if($result){
            header("location:../views/ad_villager.php");
        }

    }
?>