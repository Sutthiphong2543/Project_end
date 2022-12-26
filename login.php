<?php 
    require_once"components/session.php";
    require_once"config/connect.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $new_password = md5($password.$username);
        $result=$user->getUser($username, $new_password);

        if(!$result){
            echo '<div class= "alert alert-danger">ชื่อผู้ใช้และรหัสผ่านไม่ถูกต้อง</div>';
        }else{
        $_SESSION["username"] = $username;
        $_SESSION["userid"] = $result["id"];
        header("Location:views/ad_dashboard.php");
        }
        
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

    <link rel="stylesheet" href="css/login_style.css">
    <title>Login</title>
</head>
<body>
    <img class="bg-main" src="assets/Main-background.png" >
    <div class="wrapper">
        <img class="logo-home" src="assets/LogoHome.png" >

        <form method="POST" action="<?php echo htmlentities($_SERVER['PHP_SELF']) ?>" >
            

            <div class="mb-3">
                <h1 class="Title-head">mornsap village</h1>
            </div>
            <div class="mb-3 field" >
                <label for="username" class="form-label">USERNAME</label>
                <input type="text"
                 name="username"
                 value="<?php if($_SERVER["REQUEST_METHOD"] == "POST") echo $_POST["username"]; ?>"
                 class="form-control" 
                >
                <i class="bi bi-person-fill"></i>
            </div>
            <div class="mb-3 field">
                <label for="password" class="form-label">PASSWORD</label>
                <input type="password" class="form-control" name="password">
                <i class="bi bi-eye-fill"></i>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
                <a href=""><label class="forgot-pass">Forget password</label></a>
            </div>
            <button type="submit" value="Login Success" class="btn btn-primary " name="signin">LOGIN</button>
            <br>
            <p class="text-center mt-3"><a href="signup.php">Signup?</a></p>
            </form>
            
            
    </div>
   
</body>
</html>