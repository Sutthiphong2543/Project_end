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
    function insertInvoice($vlg_id, $month, $invoice_cmf, $elect_bill, $water_bill, $another_bill, $date_start, $date_end){
        try {
            $sql = "INSERT INTO invoice(villager_id,month, invoice_cmf, elect_bill, water_bill, another_bill, date_start, date_end) 
            VALUE (:villager_id,:month, :invoice_cmf, :elect_bill, :water_bill, :another_bill, :date_start, :date_end)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":villager_id", $vlg_id);
            $stmt->bindParam(":month", $month);
            $stmt->bindParam(":invoice_cmf", $invoice_cmf);
            $stmt->bindParam(":elect_bill", $elect_bill);
            $stmt->bindParam(":water_bill", $water_bill);
            $stmt->bindParam(":another_bill", $another_bill);
            $stmt->bindParam(":date_start", $date_start);
            $stmt->bindParam(":date_end", $date_end);
            $stmt->execute();
            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getIdUsers(){
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
    function getInvoice_3(){
        try {
            $sql = "SELECT * FROM invoice ice
            INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
            WHERE ice.status_pay = 3";
            $stmt= $this->db->prepare($sql);
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
    function getInvoice_5(){
        try {
            $sql = "SELECT * FROM invoice ice
            INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id
            WHERE ice.status_pay = 5";
            $stmt= $this->db->prepare($sql);
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
            $sql = "SELECT * FROM invoice WHERE villager_id =:id AND status_pay = '3'";
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
            $sql = "SELECT * FROM invoice WHERE villager_id =:id AND status_pay = '2'";
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
    // function getInvoice($id){
    //     try {
    //         $sql = "SELECT * FROM invoice ice INNER JOIN villagers vlg ON ice.villager_id = vlg.villager_id WHERE ice.villager_id = :id";
    //         $stmt= $this->db->prepare($sql);
    //         $stmt->bindValue(':id',$id);
    //         $stmt->execute();
    //         $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    //         return $result;
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //         return false;
    //     }
    // }

    function checkMonth($month){
        if($month == '1'){
            echo "มกราคม";
        }else if($month == '2'){
            echo "กุมภาพันธ์";
        }else if($month == '3'){
            echo "มีนาคม";
        }else if($month == '4'){
            echo "เมษายน";
        }else if($month == '5'){
            echo "พฤษภาคม";
        }else if($month == '6'){
            echo "มิถุนายน";
        }else if($month == '7'){
            echo "กรกฎาคม";
        }else if($month == '8'){
            echo "สิงหาคม";
        }else if($month == '9'){
            echo "กันยายน";
        }else if($month == '10'){
            echo "ตุลาคม";
        }else if($month == '11'){
            echo "พฤศจิกายน";
        }else if($month == '12'){
            echo "ธันวาคม";
        }
    }
    
    function checkStatusPay($status){
        if($status =="1"){
            echo 'ยังไม่ดำเนินการ';
        }else if($status =="2"){
            echo 'รอดำเนินการ'; 
        }else if($status =="3"){
            echo 'ชำระแล้ว'; 
        }else if($status =="4"){
            echo 'ค้างชำระ'; 
        }else if($status =="5"){
            echo 'ชำระล่วงหน้า'; 
        }
    }


}

?>