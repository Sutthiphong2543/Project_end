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

    function getIncomeMaxSumPay($id,$year){
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

    function getAllMonth($id,$year){
        try {
            $sql = "SELECT month  FROM `invoice` WHERE villager_id = :id AND YEAR(date_start) = :year AND status_pay = '3'";
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

    function getSumPay($id,$year){
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

    // Year latest
    function getLatestYear(){
        try {
            $sql = "SELECT month  FROM `invoice` ";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    // ........ Expenses .............
    
    function createExpenses($input1,$input2,$input3,$input4,$input5,$input6,$date,$total){
        try {
            $sql = "INSERT INTO expenses (waste_collection_fee,electric_fee,central_caretaker_fee,garbage_maintenance_fee,mechanic_wages,another,expenses_total,expenses_date )
            VALUES(:input1,:input2,:input3,:input4,:input5,:input6, :expenses_total ,:dateExpenses)";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':input1',$input1);
            $stmt->bindParam(':input2',$input2);
            $stmt->bindParam(':input3',$input3);
            $stmt->bindParam(':input4',$input4);
            $stmt->bindParam(':input5',$input5);
            $stmt->bindParam(':input6',$input6);
            $stmt->bindParam(':expenses_total',$total);
            $stmt->bindParam(':dateExpenses',$date);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getExpenses($year){
        try {
            $sql = "SELECT * FROM `expenses` WHERE YEAR(expenses_date) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getReport($year){
        try {
            $sql = "SELECT expenses_total, expenses_date FROM `expenses` WHERE YEAR(expenses_date) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getSumTotalMonth($month,$year){ //Get total all month
        try {
            $sql = "SELECT SUM(invoice_cmf) as sumMonth FROM `invoice` WHERE Month = :month AND YEAR(date_start) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':month',$month);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getSumAllMonth($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(invoice_cmf) as sumAllMonth FROM `invoice` WHERE YEAR(date_start) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getSumAllExpenses($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(expenses_total) as sumAllExpenses FROM `expenses` WHERE YEAR(expenses_date) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }




}

?>