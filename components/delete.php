<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once "../config/connect.php";

if(!isset($_GET["id"])){
    header("Location:../views/ad_villager.php?title=villagers");
}else{
    $id=$_GET["id"];
    $result=$controller->delete($id);
    if($result){
        header("location:../views/ad_villager.php?title=villagers");
    }
}


?>