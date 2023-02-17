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
require_once"fc_income.php";
require_once"filterClass.php";
require_once"chartClass.php";

$controller = new Controller($pdo);
$user = new User($pdo);
$fucIncome = new income($pdo);
$filterClass = new FilterClass($pdo);
$chartClass = new ChartClass($pdo);

// $user->insertUser('admin', '123456');
// $user->insertAdmin('admin','legal','0954690775','admin','123456','?');
?>