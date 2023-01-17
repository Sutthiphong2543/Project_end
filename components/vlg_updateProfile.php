<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
 require_once "../config/connect.php";
if(isset($_POST["vlgUpdate"])){
    $villager_id = $_POST["villager_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $telephone = $_POST["telephone"];
    $house_number = $_POST["house_number"];
    $role_id = $_POST["role_id"];
    $username = $_POST["username"];
    $img = $_FILES['img'];

    $img2 = $_POST["img_profile2"];
    $upload =$_FILES['img']["name"];

    if($upload != ''){
        $allow = array('jpg', 'jpeg', 'png');
        $extension = explode(".", $img['name']);
        $fileActExt = strtolower(end($extension));
        $fileNew = rand() . "." . $fileActExt;
        $filePath = "../upload/" . $fileNew;

        if (in_array($fileActExt, $allow)) {
            if ($img['size'] > 0 && $img['error'] == 0) {
                move_uploaded_file($img['tmp_name'], $filePath);
            }
        }
    }else {
        $fileNew = $img2;
    }

    $result=$controller->update($fname,$lname,$telephone,$house_number,$role_id,$villager_id,$username,$fileNew);
    if($result){
        $_SESSION['success'] = " Data has been inserted successfully.";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'success',
                            text: ' แก้ไขโปรไฟล์เรียบร้อย',
                            icon: 'success',
                            timer: 2500,
                            showConfirmButton: false
                        });
                    });
                </script>";
                // header('Location:/project_end/views/ad_villager.php?title=ข้อมูลลูกบ้าน');
                header('refresh:2;/project_end/views/v_dashboard.php?title=dashboard');
            }else {
                $_SESSION['error'] = " Data has been inserted fails.";
                echo "<script>
                    $(document).ready(function() {
                        Swal.fire({
                            title: 'Failed to insert',
                            text: ' Data has been inserted Notsuccessfully',
                            icon: 'error',
                            timer: 5000,
                            showConfirmButton: false
                        });
                    });
                </script>";
        header("location:../views/v_dashboard.php?title=dashboard");
    }
}


?>