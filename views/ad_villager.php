<?php
require_once"../components/session.php";
require_once"../components/check_admin.php";
require_once"../config/connect.php";


$result=$controller->getVillagers();
$vlgStay=$controller->stayVillagers();
$vlgNotStay=$controller->notStayVillagers();

$roleVillager=$controller->getRole_users();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

    <!-- table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>

    <!-- sweet alert -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.3.js" ></script> -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    

    <link rel="stylesheet" href="../css/villager.css ?<?php echo time(); ?>">
    <title>Villager</title>
</head>
<body>
<?php require_once'../components/ad_template.php'?>
<!-- .......................... -->

<div class="main-container ">
        <div class="main-villager">
            <!-- <div class="search d-flex">
                <input class="form-control text-center" type="text" placeholder="ชื่อ ,บ้านเลขที่">
                <button class="btn d-flex"><i class="bi bi-search"></i>ค้นหา</button>
            </div> -->

            <div class="header-villager d-flex mt-4">
                <button class="btn tablink" onclick="openVillager('all-content', this, 'orange')" id="defaultOpen">รายการทั้งหมด</button>
                <button class="btn tablink" onclick="openVillager('stay-content', this, '#0dcaf0')" >ยังอยู่</button>
                <button class="btn tablink" onclick="openVillager('notStay-content', this, 'red')">ย้ายออก</button>
                <div class="add-villager">
                    <!-- <a href="../signup.php" class="btn btn-primary" ><i class="bi bi-person-plus"></i>เพิ่มสมาชิก</a> -->
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#villagerModal"><i class="bi bi-person-plus"></i>เพิ่มสมาชิก</a>
                </div>
            </div>

            <!-- Table -->

            <!-- Show all -->
            <div class="table-villager ">
                <div id="all-content"  class="tabContent">
                    <table id="villager_detail" class="table ">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center" >ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">เบอร์โทร</th>
                        <th scope="col" class="text-center">username</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){ ?>
                            <tr>
                                <td class="text-start px-4 ht-1"><?php echo $row["villager_fname"]."  ".$row["villager_lname"] ?></td>
                                <td class="text-center "><?php echo $row["villager_housenum"] ?></td>
                                <td class="text-center "><?php echo $row["villager_tel"] ?></td>
                                <td class="text-center "><?php echo $row["username"] ?></td>
                                <td class="text-center "><img width="50" src="../upload/<?php echo $row["img_profile"] ?>" alt=""></td>
                                <?php if($row["role_id"]==1){?>
                                    <td class="text-center "><p class="bg-info text-white"><?php echo $row["role_status"] ?></p></td>
                                <?php }else { ?>
                                    <td class="text-center"><p class="bg-danger text-white"><?php echo $row["role_status"] ?></p></td>
                                <?php }?>
                                <td class="text-center ">
                                    <a 
                                        href="../components/ad_editVillagers.php?id=<?php echo $row["villager_id"]?>&title=villagers" class="btn btn-warning">แก้ไข<i class="bi bi-pencil-square mx-2"></i>
                                    </a>
                                    <a data-id="<?php echo $row["villager_id"]?>" 
                                        href="../components/delete.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-danger delete-btn" >
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
                <!-- Show stay people -->
                <div id="stay-content" class="tabContent">
                    <table id="villager_detail_stay" class="table ">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">ชื่อ</th>
                            <th scope="col" class="text-center">บ้านเลขที่</th>
                            <th scope="col" class="text-center">เบอร์โทร</th>
                            <th scope="col" class="text-center">username</th>
                            <th scope="col" class="text-center">Image</th>
                            <th scope="col" class="text-center">สถานะ</th>
                            <th scope="col" class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row=$vlgStay->fetch(PDO::FETCH_ASSOC)){ ?>
                                <tr>
                                    <td class="text-start px-4"><?php echo $row["villager_fname"]."  ".$row["villager_lname"] ?></td>
                                    <td class="text-center"><?php echo $row["villager_housenum"] ?></td>
                                    <td class="text-center"><?php echo $row["villager_tel"] ?></td>
                                    <td class="text-center"><?php echo $row["username"] ?></td>
                                    <td class="text-center"><img width="50" src="../upload/<?php echo $row["img_profile"] ?>" alt=""></td>
                                    <?php if($row["role_id"]==1){?>
                                        <td class="text-center"><p class="bg-info text-white"><?php echo $row["role_status"] ?></p></td>
                                    <?php }else { ?>
                                        <td class="text-center"><p class="bg-danger text-white"><?php echo $row["role_status"] ?></p></td>
                                    <?php }?>
                                    <td class="text-center">
                                        <a 
                                            href="../components/ad_editVillagers.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-warning">แก้ไข<i class="bi bi-pencil-square mx-2"></i>
                                        </a>
                                        <a data-id="<?php echo $row["villager_id"]?>" 
                                            href="../components/delete.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-danger delete-btn" >
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        </table>
                </div>
                <!-- show Not stay people -->
                <div id="notStay-content" class="tabContent">
                    <table id="villager_detail_notStay" class="table ">
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">ชื่อ</th>
                                <th scope="col" class="text-center">บ้านเลขที่</th>
                                <th scope="col" class="text-center">เบอร์โทร</th>
                                <th scope="col" class="text-center">username</th>
                                <th scope="col" class="text-center">Image</th>
                                <th scope="col" class="text-center">สถานะ</th>
                                <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while($row=$vlgNotStay->fetch(PDO::FETCH_ASSOC)){ ?>
                                    <tr>
                                        <td class="text-start px-4"><?php echo $row["villager_fname"]."  ".$row["villager_lname"] ?></td>
                                        <td class="text-center"><?php echo $row["villager_housenum"] ?></td>
                                        <td class="text-center"><?php echo $row["villager_tel"] ?></td>
                                        <td class="text-center"><?php echo $row["username"] ?></td>
                                        <td class="text-center"><img width="50" src="../upload/<?php echo $row["img_profile"] ?>" alt=""></td>
                                        <?php if($row["role_id"]==1){?>
                                            <td class="text-center"><p class="bg-info text-white"><?php echo $row["role_status"] ?></p></td>
                                        <?php }else { ?>
                                            <td class="text-center"><p class="bg-danger text-white"><?php echo $row["role_status"] ?></p></td>
                                        <?php }?>
                                        <td class="text-center">
                                            <a 
                                                href="../components/editVillager.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-warning">แก้ไข<i class="bi bi-pencil-square mx-2"></i>
                                            </a>
                                            <a data-id="<?php echo $row["villager_id"]?>" 
                                                href="../components/delete.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-danger delete-btn" >
                                                Delete
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            </table>
                </div>
            
            </div>
        </div>
    </div>




    <!-- Modal AdVillagers-->
    
        <div class="modal fade" id="villagerModal" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <!-- Main -->
                <div class="modal-content main-modal">
                    <!-- Main box -->
                    <div class="box-modal-content">
                        <!-- Header -->
                        <div class="modal-header-vlg">
                            <h5 class="modal-title " id="villagerModalLabel">เพิ่มสมาชิก ลูกบ้าน</h5>
                            <hr>
                        </div>
                        <!-- Content -->
                        <div class="box-form mt-2">
                            <div class="prev-img">
                                    <img class="prev-profile" src="../upload/Defult.png" id="previewImg">
                            </div>
                                <!-- Form -->
                            <form action="../signup_v2.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                                <div class="modal-body">
                                        <div class="form-group singIn mb-3">
                                            <label for="fname" class="form-label lb-ad">first name</label>
                                            <input type="text" class="form-control i-form-ad " name="fname" aria-describedby="firstname" required>
                                        </div>
                                        <div class="form-group singIn mb-3">
                                            <label for="lname" class="form-label lb-ad">last name</label>
                                            <input type="text" class="form-control i-form-ad" name="lname" aria-describedby="lastname" required>
                                        </div>
                                        <div class="form-group singIn mb-3">
                                            <label for="telephone" class="form-label lb-ad">เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control i-form-ad" name="telephone" aria-describedby="telephone" maxlength="10" required>
                                        </div>
                                        <div class="form-group singIn mb-3">
                                            <label for="house_number" class="form-label lb-ad">บ้านเลขที่</label>
                                            <input type="text" class="form-control i-form-ad" name="house_number" aria-describedby="House_number" placeholder="000/000" maxlength="7" required>
                                        </div>
                                        <div class="form-group singIn mb-3">
                                            <label for="username" class="form-label lb-ad">username</label>
                                            <input type="text" class="form-control i-form-ad" name="username" aria-describedby="username" required>
                                        </div>
                                        <div class="form-group singIn mb-3">
                                            <label for="password" class="form-label lb-ad">password</label>
                                            <input type="text" class="form-control i-form-ad" name="password" aria-describedby="password" required>
                                        </div>
                                        <div class="form-group singIn mb-3">
                                            <label for="img_profile" class="form-label lb-ad">Image</label>
                                            <input type="file" class="form-control i-form-ad" name="img_profile" id="imgInput" aria-describedby="profile" required>
                                            <!-- <img width="250" id="previewImg" alt=""> -->
                                        </div>
                                        <div class="form-group singIn mb-3">
                                            <label for="role_id" class="form-label lb-ad">สถานะ</label>
                                            <select name="role_id" class="form-select mb-3 i-form-ad">
                                                <?php while ($row = $roleVillager->fetch(PDO::FETCH_ASSOC)) { ?>
                                                    <option value="<?php echo $row["role_id"]; ?>"><?php echo $row["role_status"]?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                        
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" name="submit_villager" class="btn btn-primary" value="insert">บันทึกข้อมูล</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>







        


    <!-- Script -->
    <!-- script function -->
    <script>
        // table
        $(document).ready(function() {
            $('#villager_detail').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#villager_detail_stay').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#villager_detail_notStay').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        
        

        // header tab

        function openVillager(villagerDetail, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabContent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(villagerDetail).style.display = "block";
            elmnt.style.backgroundColor = color;
        }
        document.getElementById("defaultOpen").click();



        // Preview img
        let imgInput = document.getElementById('imgInput');
        let previewImg = document.getElementById('previewImg');

        imgInput.onchange = evt => {
            const [file] = imgInput.files;
            if (file){
                previewImg.src = URL.createObjectURL(file);
            }
        }

        // alert delete
        $('.delete-btn').click(function(e){
            var userId = $(this).data('id');
            e.preventDefault();
            deleteConfirm(userId);

        })

        function deleteConfirm(userId) {
            Swal.fire({
                title: 'Are you sure you want to delete',
                text:'คุณต้องการลบจริงหรือไม่',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, dele it',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve){
                        $.ajax({
                            url:'../components/delete.php',
                            type:'GET',
                            data:'id='+ userId,
                        })
                        .done(function() {
                            Swal.fire({
                                title: 'Success',
                                text: 'Data deleted successfully',
                                icon:'success'
                            }).then(() =>{
                                document.location.href='../views/ad_villager.php?title=villagers';
                            })
                        })
                        .fail(function() {
                            Swal.fire('Oops..', ' Something went wrong with ajax!','error');
                            window.location.reload();
                        })
                })
                }

            })
        }

        
    </script>


</body>
</html>