<?php
class RepairClass{
    private $db;

    function __construct($con)
    {
        $this->db = $con;
    }
    //.........................
    function createRepair($id, $name, $topic, $area, $img, $date, $status){
        try {
           $sql = "INSERT INTO repair_notice(villager_id, noti_repair_name	,noti_repair_subject,noti_repair_detail,img_repair,noti_repair_date,status_repair) VALUES(:id, :name, :topic, :area, :img_repair, :date, :status)";
           $stmt = $this->db->prepare($sql);
           $stmt->bindParam(':id',$id);
           $stmt->bindParam(':name',$name);
           $stmt->bindParam(':topic',$topic);
           $stmt->bindParam(':area',$area);
           $stmt->bindParam(':img_repair',$img);
           $stmt->bindParam(':date',$date);
           $stmt->bindParam(':status',$status);
           $stmt->execute();
           return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getDataRepair($id){
        try {
            $sql = "SELECT * FROM `repair_notice` WHERE villager_id = :id AND status_repair = 1";
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
      //data  villager
      function getDataRepair_vlg_st2($id){
        try {
            $sql = "SELECT * FROM `repair_notice` WHERE villager_id = :id AND status_repair = 2";
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
    function getDataRepair_vlg_st3($id){
        try {
            $sql = "SELECT * FROM `repair_notice` WHERE villager_id = :id AND status_repair = 3";
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
    function getDataRepairAll(){
        try {
            $sql = "SELECT * FROM `repair_notice` WHERE status_repair = 1";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getDataRepair_st2(){
        try {
            $sql = "SELECT * FROM `repair_notice` WHERE status_repair = 2";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
  
    function getDataRepair_st3(){
        try {
            $sql = "SELECT * FROM `repair_notice` WHERE status_repair = 3";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getSelectHouse(){
        try {
            $sql = "SELECT villager_id, villager_housenum FROM `villagers`";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function statusRepair($status){
        if ($status == 1){
            echo "รอรับเรื่อง";
        }else if ($status == 2){
            echo "กำลังดำเนินการ";
        }else if ($status == 3){
            echo "ซ่อมเรียบร้อยแล้ว";
        }

    }
    function statusAppeal($status){
        if ($status == 1){
            echo "รอดำเนินการ";
        }else if ($status == 2){
            echo "รับเรื่องแล้ว";
        }else if ($status == 3){
            echo "ร้องเรียนเรียบร้อยแล้ว";
        }

    }

    function createAppeal($id, $name, $detail, $area, $date, $status){
        try {
           $sql = "INSERT INTO appeals(villager_id,appeal_name, appeal_detail, appeal_area, appeal_date, appeal_status) VALUES(:id, :name, :detail, :area,:date, :status)";
           $stmt = $this->db->prepare($sql);
           $stmt->bindParam(':id',$id);
           $stmt->bindParam(':name',$name);
           $stmt->bindParam(':detail',$detail);
           $stmt->bindParam(':area',$area);
           $stmt->bindParam(':date',$date);
           $stmt->bindParam(':status',$status);
           $stmt->execute();
           return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getDataAppeals($id){
        try {
            $sql = "SELECT * FROM `appeals` WHERE villager_id = :id AND appeal_status = 1";
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
    function getDataAppeals2($id){
        try {
            $sql = "SELECT * FROM `appeals` WHERE villager_id = :id AND appeal_status = 2";
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
    function getDataAppeals3($id){
        try {
            $sql = "SELECT * FROM `appeals` WHERE villager_id = :id AND appeal_status = 3";
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
    function getDataAppealsAll(){
        try {
            $sql = "SELECT * FROM `appeals` WHERE  appeal_status = 1";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function checkHouseNumber($id){
        try {
            $sql = "SELECT villager_housenum as house_num FROM `villagers` WHERE villager_id = :id";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            $result=$stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    //update repair status 2
    function repair_status2($id){
        try {
            $sql = "UPDATE repair_notice
            SET status_repair = 2 
            WHERE noti_repair_id = :id";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function repair_status3($id){
        try {
            $sql = "UPDATE repair_notice
            SET status_repair = 3 
            WHERE noti_repair_id = :id";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

// appeal
    function getDataAppealAll(){
        try {
            $sql = "SELECT * FROM `appeals` WHERE appeal_status = 1";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    //update repair status 2
    function appeal_status2($id){
        try {
            $sql = "UPDATE appeals
            SET appeal_status = 2 
            WHERE appeal_id = :id";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function appeal_status3($id){
        try {
            $sql = "UPDATE appeals
            SET appeal_status = 3 
            WHERE appeal_id = :id";
            $stmt= $this->db->prepare($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return true;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function getDataAppeal_st2(){
        try {
            $sql = "SELECT * FROM `appeals` WHERE appeal_status = 2";
            $stmt= $this->db->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getDataAppeal_st3(){
        try {
            $sql = "SELECT * FROM `appeals` WHERE appeal_status = 3";
            $stmt= $this->db->prepare($sql);
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