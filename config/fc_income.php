<?php
class Income{
    private $db;

    function __construct($con)
    {
        $this->db = $con;
    }
    //.........................

    function getIncomeName(){
        try {
            $sql = "SELECT villager_id, villager_fname, villager_lname, villager_housenum FROM `villagers`";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getIncomeMaxSumPay($id){
        try {
            $sql = "SELECT MAX(sum_month_pay) as countM FROM invoice ice
            INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
            WHERE ice.villager_id =:id AND ice.status_pay = '3' AND YEAR(ice.date_start) = 2023 ";
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
    // function getIncomeCount($id){
    //     try {
    //         $sql = "SELECT COUNT(month) as countM FROM invoice ice
    //         INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
    //         WHERE ice.villager_id =:id AND ice.status_pay = '3' ";
    //         $stmt= $this->db->prepare($sql);
    //         $stmt->bindParam(':id',$id);
    //         $stmt->execute();
    //         $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //         return false;
    //     }
    // }

    // function sumJan(){
    //     try {
    //         $sql = "SELECT COUNT(month) as countMonth FROM `invoice` WHERE month = 1 AND YEAR(date_start) = 2023 AND status_pay = '3'";
    //         $stmt= $this->db->prepare($sql);
    //         $stmt->execute();
    //         $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //         return false;
    //     }
    // }

    function getAllMonth($id){
        try {
            $sql = "SELECT month  FROM `invoice` WHERE villager_id = :id AND YEAR(date_start) = 2023 AND status_pay = '3'";
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

    function getSumPay($id){
        try {
            $sql = "SELECT SUM(pay_amount) as sumMonth  FROM `invoice` WHERE villager_id = :id AND status_pay = '3' AND YEAR(date_start) = 2023 ";
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
    function getMinMonth($id){
        try {
            $sql = "SELECT MIN(month) as minMonth  FROM `invoice` WHERE villager_id = :id AND YEAR(date_start) = 2023 ";
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





}

?>