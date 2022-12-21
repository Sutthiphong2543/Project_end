<?php  

$host ="localhost";
$username="root";
$password = "";
$db = "amornsap_village";

$dsn = "mysql:host=$host;dbname=$db";
try {
    $pdo = new PDO($dsn,$username,$password);
}catch(PDOException $e){
    echo $e->getMessage();

}

require_once"controller.php";
$controller = new Controller($pdo);
?>