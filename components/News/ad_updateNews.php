<?php 
require_once"../../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $topic = $_POST['news_topic'];
    $detail = $_POST['news_detail'];
    $id = $_POST['id'];

    $updateNews = $newsClass->updateNews($topic, $detail, $id);
    if  ($updateNews){
        exit();
    }

}
?>