<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
session_start();
require_once "config/connect.php";


// if (isset($_POST['submit_villager'])) {
//     $fname = $_POST["fname"];
//     $lname = $_POST["lname"];
//     $telephone = $_POST["telephone"];
//     $house_number = $_POST["house_number"];
//     $role_id = $_POST["role_id"];
//     $username = $_POST["username"];
//     $password = $_POST["password"];

//     $adVillager=$controller->insert($fname,$lname,$telephone,$house_number,$role_id,$username,$password);
//     if ($adVillager) {
//         // $_SESSION['status'] = "Successfully Insert";
//         // header("Location:../views/ad_villager.php");
//         echo "Successfully";
//         header('Location:/project_end/views/ad_villager.php?title=ข้อมูลลูกบ้าน');
//     }else{
//         $_SESSION['status'] = "Not Successfully Insert";
//         header("Location: ../views/ad_villager.php?title=ข้อมูลลูกบ้าน");
//     }
// }


if(isset($_POST['submit_villager'])){
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $telephone = $_POST["telephone"];
    $house_number = $_POST["house_number"];
    $role_id = $_POST["role_id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $img = $_FILES['img_profile'];

    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $img['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = "upload/" . $fileNew;

    if(in_array($fileActExt, $allow)){
        if($img['size'] > 0 && $img['error'] ==0){
            if(move_uploaded_file($img['tmp_name'],$filePath)){
                $adVillager=$controller->insert($fname,$lname,$telephone,$house_number,$role_id,$username,$password,$fileNew);

                if($adVillager){
                    $_SESSION['success'] = " Data has been inserted successfully.";
                    echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'success',
                                text: ' Data has been inserted successfully',
                                icon: 'success',
                                timer: 5000,
                                showConfirmButton: false
                            });
                        });
                    </script>";
                    // header('Location:/project_end/views/ad_villager.php?title=ข้อมูลลูกบ้าน');
                    header('refresh:2;/project_end/views/ad_villager.php?title=villagers');
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
                    header('refresh:1;/project_end/views/ad_villager.php?title=villagers');
                }
            }else{
                header('refresh:1;/project_end/views/ad_villager.php?title=villagers');
            }
        }else{
            header('refresh:1;/project_end/views/ad_villager.php?title=villagers');
        }
    }else{
        header('refresh:1;/project_end/views/ad_villager.php?title=villagers');
    }
}

?>
