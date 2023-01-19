<?php
require_once '../config/connect.php';
$result=$controller->getRole_users();
$id = $_GET['id'];
$vlg_id = $controller->getEditVillager($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href=" ../css/vlg_editProfile.css ?<?php echo time(); ?>">

        <!-- sweet alert -->
    <script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
</head>
<body>
<?php 
        require_once '../components/template_vlg.php';
?>

<div class="main-container ">
    <div class="vlg_editProfile">
                    <!-- Header -->
            <div class="header-edit ">
                    <h5>แก้ไขมูลส่วนตัว</h4>
            </div>
            <hr class="mr-15">
            <!-- Content -->
                <div class="box-edit ">
                    <!-- Box1 -->
                    <div class="box-edit-1 bd-c">
                        <div class="prev-img">
                            <img  class="prev-profile" src="../upload/<?php echo $vlg["img_profile"]  ?>" id="edit_previewImg">
                        </div>
                    </div>
                    <!-- box2 -->
                    <div class="box-edit-2 bd-c">
                        <!-- Form -->
                        <form action="vlg_updateProfile.php" method="post"class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="villager_id" value="<?php echo $vlg["villager_id"] ?>">
                            <input type="hidden"  value="<?php echo $vlg["img_profile"] ?>" name="img_profile2"  >

                            <div class="box-name-vlg d-flex">
                                <div class="form-group mb-3 i-wd-1">
                                    <label for="fname" class="form-label">first name</label>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $vlg["villager_fname"] ?>">
                                </div>
                                <div class="form-group mb-3 i-wd-1">
                                    <label for="lname" class="form-label">last name</label>
                                    <input type="text" class="form-control" name="lname" value="<?php echo $vlg["villager_lname"] ?>">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="telephone" class="form-label">เบอร์โทรศัพท์</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type="number" class="form-control" name="telephone" value="<?php echo $vlg["villager_tel"] ?>" maxlength="10">
                            </div>
                            <div class="form-group mb-3">
                                <label for="house_number" class="form-label">บ้านเลขที่</label>
                                <input type="text" class="form-control" name="house_number" value="<?php echo $vlg["villager_housenum"] ?>" placeholder="000/000" maxlength="7" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $vlg["username"] ?>" aria-describedby="username" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">password</label>
                                <input type="password" class="form-control" name="password" value="<?php echo $vlg["password"] ?>" aria-describedby="password" readonly>
                            </div>
                            <div class="form-group  mb-3">
                                <label for="img_profile" class="form-label lb-ad">Image</label>
                                <input type="file" class="form-control i-form-ad" name="img" id="imgInput"  >
                                
                                
                                <!-- <img width="250" id="previewImg" alt=""> -->
                            </div>
                            <div class="form-group mb-3" style="display:none;">
                                <label for="role_id" class="form-label">สถานะ</label>
                                <select name="role_id" class="form-select mb-3" >
                                    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)){  ?>
                                        <option <?php if($row["role_id"] == $vlg["role_id"]) echo"selected" ?>
                                        value="<?php echo $row["role_id"]; ?>"><?php echo $row["role_status"]?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="form-footer">
                                <button type="submit" name= "vlgUpdate" class="btn btn-primary mt-3">ยืนยันการแก้ไขข้อมูล</button>
                                <a class="btn btn-secondary mt-3" href="../views/v_dashboard.php?title=dashboard">ย้อนกลับ</a>
                            </div>
                            
                            
                        </form> 
                    </div>
                </div>

    </div>

</div>

<script>
    // Preview img
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('edit_previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file){
                previewImg.src = URL.createObjectURL(file);
            }
        }

</script>
</body>
</html>
