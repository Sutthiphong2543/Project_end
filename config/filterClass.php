<?php
class FilterClass{
    private $db;

    function __construct($con)
    {
        $this->db = $con;
    }
    //.........................
    function filterYear(){
        try {
            $sql = "SELECT DISTINCT YEAR(date_start) as date_filter FROM `invoice` ORDER BY date_start DESC";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function filterMonth(){
        try {
            $sql = "SELECT DISTINCT MONTH(date_start) as date_filter FROM `invoice` ORDER BY date_start DESC";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }


    function getIncomeMaxSumPayFilter($id,$year){
        try {
            $sql = "SELECT SUM(pay_amount)/100 as countM FROM invoice ice
            INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
            WHERE ice.villager_id =:id AND ice.status_pay = '3' AND YEAR(ice.date_start) = :year ";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getSumPayFilter($id,$year){
        try {
            $sql = "SELECT SUM(pay_amount) as sumMonth  FROM `invoice` WHERE villager_id = :id AND status_pay = '3' AND YEAR(date_start) = :year ";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
  
    function getMinMonth($id,$year){
        try {
            $sql = "SELECT MIN(month) as minMonth  FROM `invoice` WHERE villager_id = :id AND YEAR(date_start) = :year ";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }





}

?>