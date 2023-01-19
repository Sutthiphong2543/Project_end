<?php 
class User {
    private $db;
    function __construct($con){
        $this->db = $con;
    }
    
    // function insertUser($username,$password){
    //     try{
    //         $result=$this->getUserName($username);
    //         if($result["num"]> 0){
    //             return false;
    //         }else{
    //             $new_password = md5($password.$username);
    //             $sql = "INSERT INTO  users(username,password) VALUES(:username,:password)";

    //             $stmt = $this->db->prepare($sql);
    //             $stmt->bindParam(":username", $username);
    //             $stmt->bindParam(":password", $new_password);
    //             $stmt->execute();
    //             return true;
    //         }
    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //         return false;
    //     }
    // }


    // function getUserName($username){
    //     try{
    //         $sql="SELECT COUNT(*) as num FROM users WHERE username=:username";
    //         $stmt=$this->db->prepare($sql);
    //         $stmt->bindParam(":username", $username);
    //         $stmt->execute();
    //         $result=$stmt->fetch();
    //         return $result;

    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //         return false;
    //     }
    // }

    // function getUser($username, $password){
    //     try{
    //         $sql="SELECT * FROM users WHERE username=:username AND password=:password";
    //         $stmt = $this->db->prepare($sql);
    //         $stmt->bindParam(":username", $username);
    //         $stmt->bindParam(":password", $password);
    //         $stmt->execute();
    //         $result=$stmt->fetch();
    //         return $result;


    //     }catch(PDOException $e){
    //         echo $e->getMessage();
    //         return false;
    //     }
    // }

    function getLegal($username, $password){
        try{
            $sql="SELECT * FROM legal_entity WHERE legal_entity_username=:username AND legal_entity_password=:password";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":password", $password);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);;
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function insertAdmin($fname,$lname,$telephone,$username,$password,$fileNew){
        try{
            $new_password = md5($password.$username);

            $sql = "INSERT INTO legal_entity(legal_entity_fname,legal_entity_lname,legal_entity_tel,legal_entity_username,legal_entity_password,legal_entity_img) 
            VALUES(:ad_fname,:ad_lname,:ad_tel,:username,:password,:ad_img_profile)";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(":ad_fname",$fname);
            $stmt->bindParam(":ad_lname",$lname);
            $stmt->bindParam(":ad_tel",$telephone);
            $stmt->bindParam(":username",$username);
            $stmt->bindParam(":password",$new_password);
            $stmt->bindParam(":ad_img_profile",$fileNew);
            $stmt->execute();
            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    function getProfileLegal($id){
        try{
            $sql="SELECT * FROM legal_entity WHERE legal_entity_id = :id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":id",$id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }

    function updateLegal($fname,$lname,$telephone,$legal_id,$username,$fileNew){
        try {
            $sql = "UPDATE legal_entity SET legal_entity_fname=:legal_fname, legal_entity_lname=:legal_lname, legal_entity_tel=:legal_tel, legal_entity_username=:username, legal_entity_img=:img_profile
            WHERE legal_entity_id  = :legal_id";
            $stmt=$this->db->prepare($sql);
            $stmt->bindParam(":legal_fname",$fname);
            $stmt->bindParam(":legal_lname",$lname);
            $stmt->bindParam(":legal_tel",$telephone);
            $stmt->bindParam(":legal_id",$legal_id);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":img_profile",$fileNew);
            $stmt->execute();
            return true;

        }catch(PDOException $e){
            echo $e->getMessage();
            return false;
        }
    }
    


}
?>