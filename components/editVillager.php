<?php
require_once "../config/connect.php";
$result=$controller->getRole_users();

if(!isset($_GET["id"])){
    header('Location:../views/ad_villager.php?title=villagers');
}else{
    $id=$_GET["id"];
    $vlg=$controller->getEditVillager($id);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-3">Sign Up</h1>

        <form action="updateVillager.php" method="post">
            <input type="hidden" name="villager_id" value="<?php echo $vlg["villager_id"] ?>">
            <div class="form-group mb-3">
                <label for="fname" class="form-label">first name</label>
                <input type="text" class="form-control" name="fname" value="<?php echo $vlg["villager_fname"] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="lname" class="form-label">last name</label>
                <input type="text" class="form-control" name="lname" value="<?php echo $vlg["villager_lname"] ?>">
            </div>
            <div class="form-group mb-3">
                <label for="telephone" class="form-label">เบอร์โทรศัพท์</label>
                <input type="text" class="form-control" name="telephone" value="<?php echo $vlg["villager_tel"] ?>" maxlength="10">
            </div>
            <div class="form-group mb-3">
                <label for="house_number" class="form-label">บ้านเลขที่</label>
                <input type="text" class="form-control" name="house_number" value="<?php echo $vlg["villager_housenum"] ?>" placeholder="000/000" maxlength="7">
            </div>
            <div class="form-group mb-3">
                <label for="role_id" class="form-label">สถานะ</label>
                <select name="role_id" class="form-select mb-3">
                    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)){  ?>
                        <option <?php if($row["role_id"] == $vlg["role_id"]) echo"selected" ?>
                        value="<?php echo $row["role_id"]; ?>"><?php echo $row["role_status"]?></option>
                    <?php }?>
                </select>
            </div>
            

            <div class="mb-3">
                <label for="username" class="form-label">username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $vlg["username"] ?>" aria-describedby="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">password</label>
                <input type="password" class="form-control" name="password" value="<?php echo $vlg["password"] ?>" aria-describedby="password">
            </div>
            <button type="submit" name= "submit" class="btn btn-primary">ยืนยันการแก้ไขข้อมูล</button>
        </form>
    </div>
</body>
</html>