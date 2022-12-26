<?php
    require_once "session.php";

?>
<?php
session_destroy();
header("Location:..\login.php");
?>