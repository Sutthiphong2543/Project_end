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

    //filter year
    function getCh_sumExpenses_year($month,$year){ 
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


    //Page dashboard
    function ch_donut_Year_maxData($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoiceAll FROM `invoice` WHERE  YEAR(date_start) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function ch_donut_success($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE status_pay = 3 AND YEAR(date_start) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
   
    function ch_donut_overdue($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE status_pay = 4 AND YEAR(date_start) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function ch_donut_overPay($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE pay_amount > total_amount AND YEAR(date_start) = :year";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }


// filter chart doughnut tri mas
    function ch_donut_Tri1_maxData($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoiceAll FROM `invoice` WHERE YEAR(date_start) = :year  AND MONTH(date_start) BETWEEN 1 AND 4";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function ch_donut_tri1_success($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE status_pay = 3 AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 1 AND 4";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function ch_donut_tri1_overdue($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE status_pay = 4 AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 1 AND 4";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function ch_donut_tri1_overPay($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE pay_amount > total_amount AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 1 AND 4";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }



    // tri 2
    function ch_donut_Tri2_maxData($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoiceAll FROM `invoice` WHERE YEAR(date_start) = :year  AND MONTH(date_start) BETWEEN 5 AND 8";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function ch_donut_tri2_success($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE status_pay = 3 AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 5 AND 8";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function ch_donut_tri2_overdue($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE status_pay = 4 AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 5 AND 8";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function ch_donut_tri2_overPay($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE pay_amount > total_amount AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 5 AND 8";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    // tri 3
    function ch_donut_Tri3_maxData($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoiceAll FROM `invoice` WHERE YEAR(date_start) = :year  AND MONTH(date_start)  BETWEEN 9 AND 12";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function ch_donut_tri3_success($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE status_pay = 3 AND YEAR(date_start) = :year AND MONTH(date_start)  BETWEEN 9 AND 12";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function ch_donut_tri3_overdue($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE status_pay = 4 AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 9 AND 12";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function ch_donut_tri3_overPay($year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE pay_amount > total_amount AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 9 AND 12";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
// filter chart doughnut month
    function ch_donut_month_maxData($month, $year){
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoiceAll FROM `invoice` WHERE MONTH(date_start) = :month AND YEAR(date_start) = :year";
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
    function ch_donut_month_success($month, $year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE MONTH(date_start) = :month AND status_pay = 3 AND YEAR(date_start) = :year" ;
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
    function ch_donut_month_overdue($month, $year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE MONTH(date_start) = :month AND status_pay = 4 AND YEAR(date_start) = :year " ;
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
    function ch_donut_month_overPay($month, $year){ 
        try {
            $sql = "SELECT COUNT(invoice_id) as countInvoice FROM `invoice` WHERE MONTH(date_start) = :month AND pay_amount > total_amount AND YEAR(date_start) = :year " ;
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
// Total dashboard Tri mas
    function getSum_tri1_month($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(invoice_cmf) as sumAllMonth FROM `invoice` WHERE status_pay = 3 AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 1 AND 4";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getSum_tri1_expenses($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(expenses_total) as sumAllExpenses FROM `expenses` WHERE YEAR(expenses_date) = :year AND MONTH(expenses_date) BETWEEN 1 AND 4";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    //tri2
    function getSum_tri2_month($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(invoice_cmf) as sumAllMonth FROM `invoice` WHERE status_pay = 3 AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 5 AND 8";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getSum_tri2_expenses($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(expenses_total) as sumAllExpenses FROM `expenses` WHERE YEAR(expenses_date) = :year AND MONTH(expenses_date) BETWEEN 5 AND 8";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    //tri3
    function getSum_tri3_month($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(invoice_cmf) as sumAllMonth FROM `invoice` WHERE status_pay = 3 AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 9 AND 12";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getSum_tri3_expenses($year){ //Get Sum all month
        try {
            $sql = "SELECT SUM(expenses_total) as sumAllExpenses FROM `expenses` WHERE YEAR(expenses_date) = :year AND MONTH(expenses_date) BETWEEN 9 AND 12";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':year',$year);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

// Total dashboard month

function getSum_month($month,$year){ //Get Sum all month
    try {
        $sql = "SELECT SUM(invoice_cmf) as sumAllMonth FROM `invoice` WHERE status_pay = 3 AND YEAR(date_start) = :year AND MONTH(date_start) BETWEEN 9 AND 12";
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
function getSum_expenses($year){ //Get Sum all month
    try {
        $sql = "SELECT SUM(expenses_total) as sumAllExpenses FROM `expenses` WHERE YEAR(expenses_date) = :year AND MONTH(expenses_date) BETWEEN 9 AND 12";
        $stmt= $this->db->prepare($sql);
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