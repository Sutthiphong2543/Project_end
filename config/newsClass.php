<?php
class NewsClass{
    private $db;

    function __construct($con)
    {
        $this->db = $con;
    }
    //.........................
    function createNews($topic_news, $detail_news, $date){
        try {
           $sql = "INSERT INTO announce_news(announce_topic, announce_news_detail, announce_news_date) 
           VALUES(:topic, :detail, :date)";
           $stmt = $this->db->prepare($sql);
           $stmt->bindParam(':topic',$topic_news);
           $stmt->bindParam(':detail',$detail_news);
           $stmt->bindParam(':date',$date);
           $stmt->execute();
           return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getDataNews(){
        try {
            $sql = "SELECT * FROM `announce_news`";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    //  dashboard villagers
    function getViewNews(){
        try {
            $sql = "SELECT * FROM announce_news WHERE announce_news_id = (SELECT MAX(announce_news_id) FROM announce_news)";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function dataNewsUpdate($id){
        try {
            $sql = "SELECT * FROM announce_news WHERE announce_news_id = :id";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    // update News
    function updateNews($topic, $detail, $id){
        try {
            $sql = "UPDATE announce_news SET announce_topic = :topic, announce_news_detail = :detail   WHERE announce_news_id = :id";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':topic',$topic);
            $stmt->bindParam(':detail',$detail);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    // Delete News
    function deleteNews($id){
        try {
            $sql="DELETE FROM announce_news WHERE announce_news_id = :id ";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }



}

?>