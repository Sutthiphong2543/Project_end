<?php 
require_once"../components/session.php";
require_once"../components/check_admin.php";
require_once "../config/connect.php";
$result=$controller->getVillagers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="search d-flex">
                <input class="form-control text-center" type="text" placeholder="ชื่อ ,บ้านเลขที่">
                <button class="btn d-flex"><i class="bi bi-search"></i>ค้นหา</button>
            </div>

            <div class="header-villager d-flex mt-2">
                <button class="btn">รายการทั้งหมด</button>
                <button class="btn">ยังอยู่</button>
                <button class="btn">ย้ายออก</button>
                <div class="add-villager">
                    <a href="../signup.php" class="btn btn-primary"><i class="bi bi-person-plus"></i>เพิ่มสมาชิก</a>
                </div>
            </div>
            <div class="table-villager">
            <table id="villager_detail" class="table ">
                <thead>
                    <tr>
                    <th scope="col" class="text-center">ชื่อ</th>
                    <th scope="col" class="text-center">บ้านเลขที่</th>
                    <th scope="col" class="text-center">เบอร์โทร</th>
                    <th scope="col" class="text-center">สถานะ</th>
                    <th scope="col" class="text-center"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row=$result->fetch(PDO::FETCH_ASSOC)){ ?>
                        <tr>
                            <td class="text-nowrap"><?php echo $row["villager_fname"]."  ".$row["villager_lname"] ?></td>
                            <td class="text-center"><?php echo $row["villager_housenum"] ?></td>
                            <td ><?php echo $row["villager_tel"] ?></td>
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

    <!-- include template -->
    <?php include_once '../components/sidebar.php' ?>
    <script src="../javaScript/villager.js"></script>
</body>
</html>