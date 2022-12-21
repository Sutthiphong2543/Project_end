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
    function insert($fname,$lname,$telephone,$house_number,$role_id){
        try{
            $sql = "INSERT INTO villagers(villager_fname,villager_lname,villager_tel,villager_housenum,role_id) 
            VALUES(:villager_fname,:villager_lname,:villager_tel,:villager_housenum,:role_id)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":villager_fname",$fname);
            $stmt->bindParam(":villager_lname",$lname);
            $stmt->bindParam(":villager_tel",$telephone);
            $stmt->bindParam(":villager_housenum",$house_number);
            $stmt->bindParam(":role_id",$role_id);
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

    function update($fname,$lname,$telephone,$house_number,$role_id,$villager_id){
        try {
            $sql = "UPDATE villagers SET villager_fname=:villager_fname, villager_lname=:villager_lname, villager_tel=:villager_tel, villager_housenum=:villager_housenum,role_id=:role_id 
            WHERE villager_id = :villager_id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":villager_fname",$fname);
            $stmt->bindParam(":villager_lname",$lname);
            $stmt->bindParam(":villager_tel",$telephone);
            $stmt->bindParam(":villager_housenum",$house_number);
            $stmt->bindParam(":role_id",$role_id);
            $stmt->bindParam(":villager_id",$villager_id);
            $stmt->execute();
            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }


}

?>