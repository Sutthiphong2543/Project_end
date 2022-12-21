<?php
    session_start();
    require_once "config/connect.php";
    $result=$controller->getRole_users();

    if(isset($_POST["submit"])){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $telephone = $_POST["telephone"];
        $house_number = $_POST["house_number"];
        $role_id = $_POST["role_id"];

        if(empty($fname)){
            $_SESSION['error'] = 'กรุณากรอกชื่อ';
            header('Location:signup.php');
        }else {
            $status=$controller->insert($fname,$lname,$telephone,$house_number,$role_id);
            if($status){
                header("Location:views/ad_villager.php");
            }else {
                echo" insert not successful";
            }
        }




        // $status=$controller->insert($fname,$lname,$telephone,$house_number,$role_id);
        // if($status){
        //     header("Location:views/ad_villager.php");
        // }else {
        //     echo" insert not successful";
        // }
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

        <form action="signup.php" method="post">
        <div class="form-group mb-3">
            <label for="fname" class="form-label">first name</label>
            <input type="text" class="form-control" name="fname" aria-describedby="firstname">
        </div>
        <div class="form-group mb-3">
            <label for="lname" class="form-label">last name</label>
            <input type="text" class="form-control" name="lname" aria-describedby="lastname">
        </div>
        <div class="form-group mb-3">
            <label for="telephone" class="form-label">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control" name="telephone" aria-describedby="telephone" maxlength="10">
        </div>
        <div class="form-group mb-3">
            <label for="house_number" class="form-label">บ้านเลขที่</label>
            <input type="text" class="form-control" name="house_number" aria-describedby="House_number" placeholder="000/000" maxlength="7">
        </div>
        <div class="form-group mb-3">
            <label for="role_id" class="form-label">สถานะ</label>
            <select name="role_id" class="form-select mb-3">
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $row["role_id"]; ?>"><?php echo $row["role_status"]?></option>
                <?php }?>
            </select>
        </div>
        

        <!-- <div class="mb-3">
            <label for="username" class="form-label">username</label>
            <input type="text" class="form-control" name="username" aria-describedby="username">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">password</label>
            <input type="password" class="form-control" name="password" aria-describedby="password">
        </div>
        <div class="mb-3">
            <label for="confirm password" class="form-label">confirm Password</label>
            <input type="password" class="form-control" name="c_password">
        </div> -->
        <button type="submit" name= "submit" class="btn btn-primary">Submit</button>
        </form>
        <br>
            <p><a href="login.php">Login?</a></p>
    </div>
</body>
</html>