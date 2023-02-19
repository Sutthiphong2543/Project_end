<?php
require_once"../components/session.php";
require_once "../config/connect.php";
if(!isset($_GET["id"])){
    header('Location:../views/ad_dashboard.php?title=dashboard');
}else{
    $id=$_GET["id"];
    $legal=$user->getProfileLegal($id);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/ad_editProfile.css?<?php echo time(); ?>">
    <title>Legal entity Edit Profile</title>
</head>
<body>
<?php require_once'../components/ad_template.php'?>
<!-- .......................... -->
<div class="main-container ">
    <div class="ad-editProfile-container ">
        <!-- Header -->
        <div class="header-edit ">
            <h5>แก้ไขข้อมูลส่วนตัว</h4>
        </div>
        <hr class="mr-15">
            <!-- Content -->
                <div class="box-edit ">
                    <!-- Box1 -->
                    <div class="box-edit-1 bd-c">
                        <div class="prev-img">
                            <img  class="prev-profile" src="../upload/<?php echo $legal["legal_entity_img"]  ?>" id="edit_previewImg">
                        </div>
                    </div>
                    <!-- box2 -->
                    <div class="box-edit-2 bd-c">
                        <!-- Form -->
                        <form action="ad_updateProfile.php" method="post"class="form-horizontal" enctype="multipart/form-data">
                            <input type="hidden" name="legal_id" value="<?php echo $legal["legal_entity_id"] ?>">
                            <input type="hidden"  value="<?php echo $legal["legal_entity_img"] ?>" name="img_profile2"  >

                            <div class="box-name-vlg d-flex">
                                <div class="form-group mb-3 i-wd-1">
                                    <label for="fname" class="form-label">first name</label>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $legal["legal_entity_fname"] ?>">
                                </div>
                                <div class="form-group mb-3 i-wd-1">
                                    <label for="lname" class="form-label">last name</label>
                                    <input type="text" class="form-control" name="lname" value="<?php echo $legal["legal_entity_lname"] ?>">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="telephone" class="form-label">เบอร์โทรศัพท์</label>
                                <input oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                type="number" class="form-control" name="telephone" value="<?php echo $legal["legal_entity_tel"] ?>" maxlength="10">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">username</label>
                                <input type="text" class="form-control" name="username" value="<?php echo $legal["legal_entity_username"] ?>" aria-describedby="username" readonly>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">password</label>
                                <input type="password" class="form-control" name="password" value="<?php echo $legal["legal_entity_password"] ?>" aria-describedby="password" readonly>
                            </div>
                            <div class="form-group  mb-3">
                                <label for="img_profile" class="form-label lb-ad">Image</label>
                                <input type="file" class="form-control i-form-ad" name="img" id="imgInput"  >
                            </div>
                            <div class="form-footer">
                                <button type="submit" name= "addUpdate" class="btn btn-primary mt-3">ยืนยันการแก้ไขข้อมูล</button>
                                <a class="btn btn-secondary mt-3" href="../views/ad_dashboard.php?title=dashboard">ย้อนกลับ</a>
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