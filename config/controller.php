<?php 

class Controller {
    private $db;

    function __construct($con){
        $this->db = $con;
    }

    // read data
    function getRole_users(){
        try {
            $sql = "SELECT * FROM role_users";
            $result=$this->db->query($sql);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }

    }
    function insert($fname,$lname,$telephone,$house_number,$role_id,$username,$password,$fileNew){
        try{
            $new_password = md5($password.$username);

            $sql = "INSERT INTO villagers(villager_fname,villager_lname,villager_tel,villager_housenum,role_id,username,password,img_profile) 
            VALUES(:villager_fname,:villager_lname,:villager_tel,:villager_housenum,:role_id,:username,:password,:img_profile)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":villager_fname",$fname);
            $stmt->bindParam(":villager_lname",$lname);
            $stmt->bindParam(":villager_tel",$telephone);
            $stmt->bindParam(":villager_housenum",$house_number);
            $stmt->bindParam(":role_id",$role_id);
            $stmt->bindParam(":username",$username);
            $stmt->bindParam(":password",$new_password);
            $stmt->bindParam(":img_profile",$fileNew);
            $stmt->execute();
            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getVillagers(){
        try{
            $sql = "SELECT * FROM villagers vlg INNER JOIN role_users r ON vlg.role_id = r.role_id ORDER BY vlg.villager_id";
            $result = $this->db->query($sql);
            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    // function login vlg
    function getLoginVLG($username, $password){
        try{
            $sql = "SELECT villager_id, username,password FROM villagers WHERE username=:username AND password=:password";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            $result=$stmt->fetch();
            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    // 

    function stayVillagers()
    {
        try{
            $sql = "SELECT * FROM villagers vlg INNER JOIN role_users r ON vlg.role_id = r.role_id WHERE vlg.role_id='1'";
            $result = $this->db->query($sql);
            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function notStayVillagers()
    {
        try{
            $sql = "SELECT * FROM villagers vlg INNER JOIN role_users r ON vlg.role_id = r.role_id WHERE vlg.role_id='2'";
            $result = $this->db->query($sql);
            return $result;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
   

 

    function delete($id){
        try {
            $sql="DELETE FROM villagers WHERE villager_id=:id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getEditVillager($id){
        try {
            $sql = "SELECT * FROM villagers vlg INNER JOIN role_users r ON vlg.role_id = r.role_id 
            WHERE villager_id = :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getVillagerProfile($id){
        try {
            $sql = "SELECT * FROM villagers vlg INNER JOIN role_users r ON vlg.role_id = r.role_id 
            WHERE villager_id = :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function update($fname,$lname,$telephone,$house_number,$role_id,$villager_id,$username,$fileNew){
        try {
            $sql = "UPDATE villagers SET villager_fname=:villager_fname, villager_lname=:villager_lname, villager_tel=:villager_tel,
             villager_housenum=:villager_housenum,role_id=:role_id ,username=:username,img_profile = :img_profile
            WHERE villager_id = :villager_id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":villager_fname",$fname);
            $stmt->bindParam(":villager_lname",$lname);
            $stmt->bindParam(":villager_tel",$telephone);
            $stmt->bindParam(":villager_housenum",$house_number);
            $stmt->bindParam(":role_id",$role_id);
            $stmt->bindParam(":villager_id",$villager_id);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":img_profile",$fileNew);
            $stmt->execute();
            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }


    // Payment Method...............................................................
    function insertInvoice($vlg_id, $month, $invoice_cmf, $elect_bill, $water_bill, $another_bill,$invoice_ovd,$sumTotal, $date_start, $date_end){
        try {
            $sql = "INSERT INTO invoice(villager_id,month, invoice_cmf, elect_bill, water_bill, another_bill,invoice_overdue,total_amount, date_start, date_end) 
            VALUE (:villager_id,:month, :invoice_cmf, :elect_bill, :water_bill, :another_bill,:invoice_ovd,:sumTotal, :date_start, :date_end)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":villager_id", $vlg_id);
            $stmt->bindParam(":month", $month);
            $stmt->bindParam(":invoice_cmf", $invoice_cmf);
            $stmt->bindParam(":elect_bill", $elect_bill);
            $stmt->bindParam(":water_bill", $water_bill);
            $stmt->bindParam(":another_bill", $another_bill);
            $stmt->bindParam(":invoice_ovd", $invoice_ovd);
            $stmt->bindParam(":sumTotal", $sumTotal);
            $stmt->bindParam(":date_start", $date_start);
            $stmt->bindParam(":date_end", $date_end);
            $stmt->execute();
            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getIdVillagers(){
        try {
            $sql = "SELECT villager_id FROM villagers ORDER BY villager_id";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getInvoice_1(){
        try {
            $sql = "SELECT * FROM invoice ice
            INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
            WHERE ice.status_pay = 1";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getInvoice_2(){
        try {
            $sql = "SELECT * FROM invoice ice
            INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
            WHERE ice.status_pay = 2";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getInvoice_3($month,$year){
        try {
            $sql = "SELECT * FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id 
            WHERE ice.status_pay = 3 AND MONTH(ice.date_start) = :month AND YEAR(ice.date_start) = :year ORDER BY ice.month DESC";
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
    function getInvoice_4(){
        try {
            $sql = "SELECT * FROM invoice ice
            INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
            WHERE ice.status_pay = 4";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getInvoice_5($month,$year){
        try {
            $sql = "SELECT * FROM invoice ice
            INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
            WHERE ice.pay_amount > ice.total_amount AND MONTH(ice.date_start) = :month AND YEAR(ice.date_start) = :year";
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
// Not Success ....................................................................................
    function getInvoice($id){
        try {
            $sql = "SELECT * FROM invoice WHERE villager_id =:id AND status_pay = '1'";
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
    function getInvoice_history($id){
        try {
            $sql = "SELECT * FROM invoice ice
            INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
            WHERE ice.status_pay = 3 AND ice.villager_id = :id";
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
    function getInvoice_waiting($id){
        try {
            $sql = "SELECT * FROM invoice ice
            INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
            WHERE ice.villager_id =:id AND ice.status_pay = '2' ORDER BY ice.month DESC ";
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
    function checkMonth($month){
        if($month == '1'){
            echo "??????????????????";
        }else if($month == '2'){
            echo "??????????????????????????????";
        }else if($month == '3'){
            echo "??????????????????";
        }else if($month == '4'){
            echo "??????????????????";
        }else if($month == '5'){
            echo "?????????????????????";
        }else if($month == '6'){
            echo "????????????????????????";
        }else if($month == '7'){
            echo "?????????????????????";
        }else if($month == '8'){
            echo "?????????????????????";
        }else if($month == '9'){
            echo "?????????????????????";
        }else if($month == '10'){
            echo "??????????????????";
        }else if($month == '11'){
            echo "???????????????????????????";
        }else if($month == '12'){
            echo "?????????????????????";
        }else if($month == '0'){
            echo "???????????????";
        }
    }

    function checkMonthThai($month){
        if($month == '1'){
            $viewMonth = "??????????????????";
        }else if($month == '2'){
            $viewMonth = "??????????????????????????????";
        }else if($month == '3'){
            $viewMonth = "??????????????????";
        }else if($month == '4'){
            $viewMonth = "??????????????????";
        }else if($month == '5'){
            $viewMonth = "?????????????????????";
        }else if($month == '6'){
            $viewMonth = "????????????????????????";
        }else if($month == '7'){
            $viewMonth = "?????????????????????";
        }else if($month == '8'){
            $viewMonth = "?????????????????????";
        }else if($month == '9'){
            $viewMonth = "?????????????????????";
        }else if($month == '10'){
            $viewMonth = "??????????????????";
        }else if($month == '11'){
            $viewMonth = "???????????????????????????";
        }else if($month == '12'){
            $viewMonth = "?????????????????????";
        }else if($month == '0'){
            $viewMonth = "???????????????";
        }
        return $viewMonth;
    }

    
    
    function checkStatusPay($status){
        if($status =="1"){
            echo '?????????????????????????????????????????????';
        }else if($status =="2"){
            echo '?????????????????????????????????'; 
        }else if($status =="3"){
            echo '????????????????????????'; 
        }else if($status =="4"){
            echo '????????????????????????'; 
        }else if($status =="5"){
            echo '????????????????????????????????????'; 
        }
    }
    // vlg payment Invoice
    function vlgPayment($status_pay,$fileNew, $amount,$sumMonthPay , $date_pay, $invoice_id ){
        try {
            $sql = "UPDATE  invoice SET status_pay=:status_pay, img_slip=:img, pay_amount=:amount,sum_month_pay=:sumMonthPay, date_pay=:date_pay
            WHERE invoice_id = :invoice_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":status_pay", $status_pay);
            $stmt->bindParam(":img", $fileNew);
            $stmt->bindParam(":amount", $amount);
            $stmt->bindParam(":sumMonthPay", $sumMonthPay);
            $stmt->bindParam(":date_pay",$date_pay);
            $stmt->bindParam(":invoice_id",$invoice_id);
            $stmt->execute();
            return true;
            

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function checkOverPay($status_pay,$invoice_id,$amount ){
        try {
            $sql = "UPDATE  invoice SET status_pay=:status_pay, pay_amount=:amount
            WHERE invoice_id = :invoice_id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":status_pay", $status_pay);
            $stmt->bindParam(":invoice_id",$invoice_id);
            $stmt->bindParam(":amount",$amount);
            $stmt->execute();
            return true;
            

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function checkSumOverDues($villager_id,$status_pay ){
        try {
            $sql = "SELECT count(status_pay) as sumOVD FROM `invoice` WHERE villager_id = :villager_id AND status_pay=:status_pay";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":villager_id",$villager_id);
            $stmt->bindParam(":status_pay",$status_pay);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

        function checkOverDues_2($month,$villager_id,$status_pay ){
            try {
                $sql = "SELECT month ,status_pay FROM `invoice` WHERE month < :month AND villager_id = :villager_id AND status_pay=:status_pay";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":month", $month);
                $stmt->bindParam(":villager_id",$villager_id);
                $stmt->bindParam(":status_pay",$status_pay);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
                
    
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        function getReplaceOverdue($villager_id){
            try {
                $sql = "SELECT invoice_id ,status_pay FROM `invoice` WHERE villager_id = :villager_id AND status_pay = '4'";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(':villager_id',$villager_id);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        function replaceOverdue($invoice_id ){
            try {
                $sql = "UPDATE  invoice SET status_pay='3' WHERE invoice_id = :invoice_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":invoice_id",$invoice_id);
                $stmt->execute();
                return true;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        // Check max month to pay   
        function checkMaxMonthPay($villager_id ){
            try {
                $sql = "SELECT MAX(sum_month_pay) as maxMonthPay FROM `invoice` WHERE villager_id = :vlg_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":vlg_id",$villager_id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        //check count Invoice_id
        function checkCountInvoice($villager_id ){
            try {
                $sql = "SELECT COUNT(invoice_id) as sumCountInvoice FROM `invoice` WHERE villager_id = :vlg_id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":vlg_id",$villager_id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }

        //Insert Pay Over
        function insertPayOver($vlg_id, $month, $invoice_cmf, $elect_bill, $water_bill, $another_bill,$notInvoice_ovd,$total, $date_start, $date_end,$status_pay){
            try {
                $sql = "INSERT INTO invoice(villager_id,month, invoice_cmf, elect_bill, water_bill, another_bill,invoice_overdue,total_amount, date_start, date_end, status_pay) 
                VALUE (:villager_id,:month, :invoice_cmf, :elect_bill, :water_bill, :another_bill,:invoice_ovd,:sumTotal, :date_start, :date_end, :status_pay)";
    
                $stmt = $this->db->prepare($sql);
                $stmt->bindParam(":villager_id", $vlg_id);
                $stmt->bindParam(":month", $month);
                $stmt->bindParam(":invoice_cmf", $invoice_cmf);
                $stmt->bindParam(":elect_bill", $elect_bill);
                $stmt->bindParam(":water_bill", $water_bill);
                $stmt->bindParam(":another_bill", $another_bill);
                $stmt->bindParam(":invoice_ovd", $notInvoice_ovd);
                $stmt->bindParam(":sumTotal", $total);
                $stmt->bindParam(":date_start", $date_start);
                $stmt->bindParam(":date_end", $date_end);
                $stmt->bindParam(":status_pay", $status_pay);
                $stmt->execute();
                return true;
    
            }catch(PDOException $e){
                echo $e->getMessage();
                return false;
            }
        }




}

?>