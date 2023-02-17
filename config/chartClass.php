<?php
class ChartClass{
    private $db;

    function __construct($con)
    {
        $this->db = $con;
    }
    //.........................
    function getCh_income_month($month, $year){
        try {
            $sql = "SELECT SUM(invoice_cmf) as sumMonth FROM `invoice` WHERE status_pay = 3 AND month = :month AND YEAR(date_start) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':month',$month);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getCh_expenses($month, $year){
        try {
            $sql = "SELECT expenses_total FROM `expenses` WHERE MONTH(expenses_date) = :month AND YEAR(expenses_date) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':month',$month);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    // function loop tri mas
    function getCh_sumMonth_tri1($month,$year){ 
        try {
            $sql = "SELECT SUM(invoice_cmf) as sumMonth FROM `invoice` WHERE status_pay = 3 AND Month = :month AND YEAR(date_start) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':month',$month);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    //function loop sum expenses
    function getCh_sumExpenses_tri1($month,$year){ 
        try {
            $sql = "SELECT expenses_total as expensesTotal FROM `expenses` WHERE MONTH(expenses_date) = :month AND YEAR(expenses_date) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':month',$month);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

}

?>