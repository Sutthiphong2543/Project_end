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

    function filterTri($tri){
        if($tri == '0'){
            echo " ไตรมาส ";
        }else if($tri == '1'){
            echo " ไตรมาส 1";
        }else if($tri == '2'){
            echo " ไตรมาส 2";
        }else if($tri == '3'){
            echo " ไตรมาส 3";
        }else if($tri == '4'){
            echo " ไตรมาส 4";
        }

    }
    function filterTriChart($tri){
        if($tri == '0'){
            $viewTri = " ไตรมาส ";
        }else if($tri == '1'){
            $viewTri =" ไตรมาส 1";
        }else if($tri == '2'){
            $viewTri= " ไตรมาส 2";
        }else if($tri == '3'){
            $viewTri =" ไตรมาส 3";
        }else if($tri =='4'){
            $viewTri =" ไตรมาส 4";
        }
        return $viewTri;
    }


    // report tri mas  1
    function getFilterReport1($year){
        try {
            $sql = "SELECT expenses_total, expenses_date FROM `expenses` WHERE YEAR(expenses_date) = :year AND MONTH(expenses_date) BETWEEN 1 AND 4";
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

    function getSumTri1($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(invoice_cmf) as sumAllMonth FROM `invoice` WHERE YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 1 AND 4";
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
    function getSumExpensesTri1($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(expenses_total) as sumAllExpenses FROM `expenses` WHERE YEAR(expenses_date) = :year AND MONTH(expenses_date) BETWEEN 1 AND 4";
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


    // report tri mas  2
    function getFilterReport2($year){
        try {
            $sql = "SELECT expenses_total, expenses_date FROM `expenses` WHERE YEAR(expenses_date) = :year AND MONTH(expenses_date) BETWEEN 5 AND 8";
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

    function getSumTri2($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(invoice_cmf) as sumAllMonth FROM `invoice` WHERE YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 5 AND 8";
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
    function getSumExpensesTri2($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(expenses_total) as sumAllExpenses FROM `expenses` WHERE YEAR(expenses_date) = :year AND MONTH(expenses_date) BETWEEN 5 AND 8";
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

    // report tri mas  3
    function getFilterReport3($year){
        try {
            $sql = "SELECT expenses_total, expenses_date FROM `expenses` WHERE YEAR(expenses_date) = :year AND MONTH(expenses_date) BETWEEN 9 AND 12";
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

    function getSumTri3($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(invoice_cmf) as sumAllMonth FROM `invoice` WHERE YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 9 AND 12";
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
    function getSumExpensesTri3($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(expenses_total) as sumAllExpenses FROM `expenses` WHERE YEAR(expenses_date) = :year AND MONTH(expenses_date) BETWEEN 9 AND 12";
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