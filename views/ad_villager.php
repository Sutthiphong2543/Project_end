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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    

    <link rel="stylesheet" href="../css/villager.css ?<?php echo time(); ?>">
    <title>Villager</title>
</head>
<body>


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
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col" class="text-center"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){ ?>
                            <tr>
                                <td class="text-start px-4"><?php echo $row["villager_fname"]."  ".$row["villager_lname"] ?></td>
                                <td class="text-center"><?php echo $row["villager_housenum"] ?></td>
                                <td class="text-center"><?php echo $row["villager_tel"] ?></td>
                                <td class="text-center"><?php echo $row["username"] ?></td>
                                <?php if($row["role_id"]==1){?>
                                    <td class="text-center"><p class="bg-info text-white"><?php echo $row["role_status"] ?></p></td>
                                <?php }else { ?>
                                    <td class="text-center"><p class="bg-danger text-white"><?php echo $row["role_status"] ?></p></td>
                                <?php }?>
                                <td class="text-center">
                                    <a 
                                        href="../components/editVillager.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-warning">แก้ไข<i class="bi bi-pencil-square mx-2"></i>
                                    </a>
                                    <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')"
                                        href="../components/delete.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-danger" >
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
                                    <?php if($row["role_id"]==1){?>
                                        <td class="text-center"><p class="bg-info text-white"><?php echo $row["role_status"] ?></p></td>
                                    <?php }else { ?>
                                        <td class="text-center"><p class="bg-danger text-white"><?php echo $row["role_status"] ?></p></td>
                                    <?php }?>
                                    <td class="text-center">
                                        <a 
                                            href="../components/editVillager.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-warning">แก้ไข<i class="bi bi-pencil-square mx-2"></i>
                                        </a>
                                        <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')"
                                            href="../components/delete.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-danger" >
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
                                        <?php if($row["role_id"]==1){?>
                                            <td class="text-center"><p class="bg-info text-white"><?php echo $row["role_status"] ?></p></td>
                                        <?php }else { ?>
                                            <td class="text-center"><p class="bg-danger text-white"><?php echo $row["role_status"] ?></p></td>
                                        <?php }?>
                                        <td class="text-center">
                                            <a 
                                                href="../components/editVillager.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-warning">แก้ไข<i class="bi bi-pencil-square mx-2"></i>
                                            </a>
                                            <a onclick="return confirm('ต้องการลบข้อมูลหรือไม่ ?')"
                                                href="../components/delete.php?id=<?php echo $row["villager_id"] ?>" class="btn btn-danger" >
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




    <!-- Modal -->
    
        <div class="modal fade" id="villagerModal" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="villagerModalLabel">เพิ่มสมาชิก ลูกบ้าน</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Form -->
                    <form action="../signup_v2.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        <div class="modal-body">
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
                                    <label for="username" class="form-label">username</label>
                                    <input type="text" class="form-control" name="username" aria-describedby="username" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password" class="form-label">password</label>
                                    <input type="text" class="form-control" name="password" aria-describedby="password" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="profile" class="form-label">password</label>
                                    <input type="file" class="form-control" name="profile" aria-describedby="profile" >
                                </div>
                                <div class="form-group mb-3">
                                    <label for="role_id" class="form-label">สถานะ</label>
                                    <select name="role_id" class="form-select mb-3">
                                        <?php while ($row = $roleVillager->fetch(PDO::FETCH_ASSOC)) { ?>
                                            <option value="<?php echo $row["role_id"]; ?>"><?php echo $row["role_status"]?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="submit_villager" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- alert -->
        <?php
        if(isset($_SESSION['adVillager']) && $_SESSION['adVillager'] != ''){
            ?>
            <h5><?php echo $_SESSION["adVillager"]; ?></h5>
            <?php
            unset($_SESSION['adVillager']);
        } 
        ?>


    <!-- Script -->
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
        // Hide all elements with class="tabcontent" by default */
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabContent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Remove the background color of all tablinks/buttons
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }

            // Show the specific tab content
            document.getElementById(villagerDetail).style.display = "block";

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

    
        <!-- include template -->
        <?php require_once '../components/sidebar.php';?>
</body>
</html>