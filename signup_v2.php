<?php
session_start();
require_once "config/connect.php";


if (isset($_POST['submit_villager'])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $telephone = $_POST["telephone"];
    $house_number = $_POST["house_number"];
    $role_id = $_POST["role_id"];
    $username = $_POST["username"];
    $password = $_POST["password"];

    $adVillager=$controller->insert($fname,$lname,$telephone,$house_number,$role_id,$username,$password);
    if ($adVillager) {
        // $_SESSION['status'] = "Successfully Insert";
        // header("Location:../views/ad_villager.php");
        echo "Successfully";
        header('Location:/project_end/views/ad_villager.php?title=ข้อมูลลูกบ้าน');
    }else{
        $_SESSION['status'] = "Not Successfully Insert";
        header("Location: ../views/ad_villager.php?title=ข้อมูลลูกบ้าน");
    }

}


?>