<?php  

$host ="localhost";
$username="root";
$password = "";
$db = "amornsap_village";

$dsn = "mysql:host=$host;dbname=$db;charset=utf8";
try {
    $pdo = new PDO($dsn,$username,$password);
}catch(PDOException $e){
    echo $e->getMessage();

}

require_once"controller.php";
require_once"user.php";
$controller = new Controller($pdo);
$user = new User($pdo);

$user->insertUser('admin', '123456');
?>