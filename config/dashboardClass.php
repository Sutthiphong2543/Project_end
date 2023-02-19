<?php
class DashboardClass{
    private $db;

    function __construct($con)
    {
        $this->db = $con;
    }
    //.........................
    function getOverPay_dash($year){
        try {
            $sql = "SELECT villager_fname,villager_lname, villager_housenum,date_start,(pay_amount-total_amount) as overPay FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.pay_amount > ice.total_amount AND YEAR(ice.date_start) = :year";
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
// filter tri mas
    function getOverPay_dash_tri1($year){
        try {
            $sql = "SELECT villager_fname,villager_lname, villager_housenum,date_start,(pay_amount-total_amount) as overPay FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.pay_amount > ice.total_amount AND YEAR(ice.date_start) = :year AND ice.month BETWEEN 1 AND 4";
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
    function getOverPay_dash_tri2($year){
        try {
            $sql = "SELECT villager_fname,villager_lname, villager_housenum,date_start,(pay_amount-total_amount) as overPay FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.pay_amount > ice.total_amount AND YEAR(ice.date_start) = :year AND ice.month BETWEEN 5 AND 8";
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
    function getOverPay_dash_tri3($year){
        try {
            $sql = "SELECT villager_fname,villager_lname, villager_housenum,date_start,(pay_amount-total_amount) as overPay FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.pay_amount > ice.total_amount AND YEAR(ice.date_start) = :year AND ice.month BETWEEN 9 AND 12";
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
// filter month
    function getOverPay_dash_month($month,$year){
        try {
            $sql = "SELECT villager_fname,villager_lname, villager_housenum,date_start,(pay_amount-total_amount) as overPay FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.month = :month AND ice.pay_amount > ice.total_amount AND YEAR(ice.date_start) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':month',$month);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

//........................................ Overdue ........................................

    function getOverdue_dash($year){
        try {
            $sql = "SELECT villager_fname,villager_lname, villager_housenum,date_start,month FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.status_pay = 4 AND YEAR(ice.date_start) = :year";
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

// Tri mas
    function getOverdue_tri1_dash($year){
        try {
            $sql = "SELECT villager_fname,villager_lname, villager_housenum,date_start,month FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.status_pay = 4 AND YEAR(ice.date_start) = :year  AND ice.month BETWEEN 1 AND 4";
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
    function getOverdue_tri2_dash($year){
        try {
            $sql = "SELECT villager_fname,villager_lname, villager_housenum,date_start,month FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.status_pay = 4 AND YEAR(ice.date_start) = :year  AND ice.month BETWEEN 5 AND 8";
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
    function getOverdue_tri3_dash($year){
        try {
            $sql = "SELECT villager_fname,villager_lname, villager_housenum,date_start,month FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.status_pay = 4 AND YEAR(ice.date_start) = :year  AND ice.month BETWEEN 9 AND 12";
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

//Overdue month filter
    function getOverdue_month_dash($month,$year){
        try {
            $sql = "SELECT villager_fname,villager_lname, villager_housenum,date_start,month FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.status_pay = 4 AND YEAR(ice.date_start) = :year  AND ice.month = :month ";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':month',$month);
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