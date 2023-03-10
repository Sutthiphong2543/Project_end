<?php 
require_once"../../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $topic_news = $_POST['news_topic'];
    $detail_news = $_POST['news_detail'];

    date_default_timezone_set("Asia/Bangkok");
    $date = date("Y-m-d");

    // echo "News: ".$topic_news;
    // echo "Detail: ". $detail_news;
    // echo "Date: ".$date;
    $create_news = $newsClass->createNews($topic_news, $detail_news, $date);
    if($create_news){
        exit();
    }
    


 
  }
?>