<?php 
    require_once"../components/session.php";
    require_once"../components/check_admin.php";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/repair.css ?<?php echo time(); ?>">
    <title>Repair</title>
</head>
<body>
<?php require_once'../components/ad_template.php'?>
<!-- .......................... -->
    <div class="main-container ">
        <div  class="main-repair">
            <div class="header-repair d-flex mt-2">
                        <button class="btn headerLink head-border" onclick="openHeader('header1', this, 'orange')" id="defaultOpen1">แจ้งซ่อม</button>
                        <button class="btn headerLink head-border" onclick="openHeader('header2', this, 'orange')" >ร้องเรียน</button>
            </div>
            <hr>
            <!-- SecondTab -->
            <div id="header1" class="header-tab">
                <div class="secondTab d-flex mt-2">
                        <button class="btn repairLink second-border" onclick="openTableRepair('table-repair-status1', this, 'orange')" id="defaultOpen2">รายการแจ้งซ่อม</button>
                        <button class="btn repairLink second-border" onclick="openTableRepair('table-repair-status2', this, 'orange')" >กำลังดำเนินการ</button>
                        <button class="btn repairLink second-border" onclick="openTableRepair('table-repair-status3', this, 'orange')" >ซ่อมสำเร็จ</button>
                </div>
                <div id="table-repair-status1" class="repairContent table-repair">
                    <table class="table">
                        <col style="width: 10%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 20%;"/>
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">เรื่อง</th>
                            <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                            <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                            <th scope="col" class="th-sm-2 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $dataRepair = $repairClass->getDataRepairAll();
                            foreach ($dataRepair as $index => $data){
                        ?>
                            <tr >
                                <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                <td class="p-3" ><?php echo $data['noti_repair_subject'] ?></td>
                                <td class="text-center p-3"><?php echo $data['noti_repair_detail'] ?></td>
                                <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusRepair($data['status_repair']) ?></p></td>
                                <td class="text-center p-2"><a class="btn btn-primary pl-pr" data-bs-toggle="modal" data-bs-target="#repairModal<?php echo $data['noti_repair_id'] ?>"><i class="bi bi-search px-2"></i>รับเรื่องและดูรายละเอียด</a></td>
                            </tr>

                                <!-- start modal -->

                                <!-- Modal repair-->
                                <div class="modal fade" id="repairModal<?php echo $data['noti_repair_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <!-- formRepair -->
                                        <form id="check_repair_st2_<?php echo $data['noti_repair_id'] ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการแจ้งซ่อม</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">ชื่อผู้แจ้ง:</label>
                                                            <input type="hidden" class="form-control" id="repair_id" name="id" value="<?php echo $data['noti_repair_id']?>" >
                                                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $data['noti_repair_name']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">เรื่อง:</label>
                                                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $data['noti_repair_subject']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">บริเวณ:</label>
                                                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $data['noti_repair_detail']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <img class="rounded card-img-top" src="../upload/Image_repair/<?php echo $data['img_repair']; ?>" >
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                    <a href="../components/Repair/ad_check_repair_st2.php?id=<?php echo $data['noti_repair_id']?>"  class="btn btn-primary">ยืนยันการรับเรื่อง</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        <!-- end modal -->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- repair status 2 -->
                <div id="table-repair-status2" class="repairContent table-repair">
                    <table class="table">
                        <col style="width: 10%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 20%;"/>
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">เรื่อง</th>
                            <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                            <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                            <th scope="col" class="th-sm-2 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $dataRepair = $repairClass->getDataRepair_st2();
                            foreach ($dataRepair as $index => $data){
                        ?>
                            <tr >
                                <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                <td class="p-3" ><?php echo $data['noti_repair_subject'] ?></td>
                                <td class="text-center p-3"><?php echo $data['noti_repair_detail'] ?></td>
                                <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusRepair($data['status_repair']) ?></p></td>
                                <td class="text-center p-2"><a class="btn btn-primary pl-pr" data-bs-toggle="modal" data-bs-target="#repairModal2<?php echo $data['noti_repair_id'] ?>"><i class="bi bi-search px-2"></i>ดูรายละเอียด</a></td>
                            </tr>

                                <!-- start modal -->

                                <!-- Modal repair-->
                                <div class="modal fade" id="repairModal2<?php echo $data['noti_repair_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <!-- formRepair -->
                                        <!-- <form id="check_repair_st2_<?php echo $data['noti_repair_id'] ?>" method="POST" enctype="multipart/form-data"> -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการแจ้งซ่อม</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">ชื่อผู้แจ้ง:</label>
                                                            <input type="hidden" class="form-control" id="repair_id" name="id" value="<?php echo $data['noti_repair_id']?>" >
                                                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $data['noti_repair_name']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">เรื่อง:</label>
                                                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $data['noti_repair_subject']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">บริเวณ:</label>
                                                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $data['noti_repair_detail']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <img class="rounded card-img-top" src="../upload/Image_repair/<?php echo $data['img_repair']; ?>" >
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                    <a href="../components/Repair/ad_check_repair_st3.php?id=<?php echo $data['noti_repair_id']?>"  class="btn btn-primary">ยืนยันการซ่อม</a>
                                                </div>
                                            </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                        <!-- end modal -->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- repair status 3 -->
                <div id="table-repair-status3" class="repairContent table-repair">
                    <table class="table">
                        <col style="width: 10%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 20%;"/>
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">เรื่อง</th>
                            <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                            <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                            <th scope="col" class="th-sm-2 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $dataRepair = $repairClass->getDataRepair_st3();
                            foreach ($dataRepair as $index => $data){
                        ?>
                            <tr >
                                <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                <td class="p-3" ><?php echo $data['noti_repair_subject'] ?></td>
                                <td class="text-center p-3"><?php echo $data['noti_repair_detail'] ?></td>
                                <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusRepair($data['status_repair']) ?></p></td>
                                <td class="text-center p-2"><a class="btn btn-primary pl-pr" data-bs-toggle="modal" data-bs-target="#repairModal<?php echo $data['noti_repair_id'] ?>"><i class="bi bi-search px-2"></i>ดูรายละเอียด</a></td>
                            </tr>

                                <!-- start modal -->

                                <!-- Modal repair-->
                                <div class="modal fade" id="repairModal<?php echo $data['noti_repair_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <!-- formRepair -->
                                        <form id="check_repair_st2_<?php echo $data['noti_repair_id'] ?>" method="POST" enctype="multipart/form-data">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการแจ้งซ่อม</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">ชื่อผู้แจ้ง:</label>
                                                            <input type="hidden" class="form-control" id="repair_id" name="id" value="<?php echo $data['noti_repair_id']?>" >
                                                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $data['noti_repair_name']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">เรื่อง:</label>
                                                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $data['noti_repair_subject']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">บริเวณ:</label>
                                                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $data['noti_repair_detail']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <img class="rounded card-img-top" src="../upload/Image_repair/<?php echo $data['img_repair']; ?>" >
                                                        </div>
                                                    
                                                </div>
                                                <div class="modal-footer footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                        <!-- end modal -->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

               
            </div>
            <div id="header2" class="header-tab ">
                <div class="secondTab d-flex mt-2">
                        <button class="btn appealLink second-border" onclick="openTableAppeal('table-appeal-status1', this, 'orange')" id="defaultOpen3">รายการร้องเรียน</button>
                        <button class="btn appealLink second-border" onclick="openTableAppeal('table-appeal-status2', this, 'orange')" >กำลังดำเนินการ</button>
                        <button class="btn appealLink second-border" onclick="openTableAppeal('table-appeal-status3', this, 'orange')" >ร้องเรียนสำเร็จ</button>
                </div>
                <div id="table-appeal-status1" class="appealContent table-repair">
                    <table class="table">
                        <col style="width: 10%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 20%;"/>
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">เรื่อง</th>
                            <th scope="col" class="text-center">ร้องเรียนไปบ้านเลขที่</th>
                            <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                            <th scope="col" class="th-sm-2 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $dataAppeal = $repairClass->getDataAppealAll();
                            foreach ($dataAppeal as $index => $data){
                                $houseNum =$data['appeal_area'];
                                $viewHouseNum = $repairClass->checkHouseNumber($houseNum); // check house number
                        ?>
                            <tr >
                                <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                <td class="p-3 " ><?php echo $data['appeal_detail'] ?></td>
                                <td class="text-center p-3"><?php echo $viewHouseNum['house_num'] ?></td>
                                <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusAppeal($data['appeal_status']) ?></p></td>
                                <td class="text-center p-2"><a class="btn btn-primary pl-pr" data-bs-toggle="modal" data-bs-target="#appealModal<?php echo $data['appeal_id'] ?>"><i class="bi bi-search px-2"></i>รับเรื่องและดูรายละเอียด</a></td>
                            </tr>
                             <!-- start modal -->

                                <!-- Modal repair-->
                                <div class="modal fade" id="appealModal<?php echo $data['appeal_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <!-- formRepair -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการร้องเรียน</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">ชื่อผู้แจ้ง:</label>
                                                            <input type="hidden" class="form-control"  value="<?php echo $data['appeal_id']?>" >
                                                            <input type="text" class="form-control"  value="<?php echo $data['appeal_name']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">รายละเอียด:</label>
                                                            <p class="form-control"><?php echo $data['appeal_detail'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">ร้องเรียนไปบ้านเลขที่ :</label>
                                                            <input type="text" class="form-control"  value="<?php echo $viewHouseNum['house_num'] ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="modal-footer footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                    <a href="../components/Appeal/ad_check_appeal_st2.php?id=<?php echo $data['appeal_id']?>"  class="btn btn-primary">ยืนยันการรับเรื่อง</a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        <!-- end modal -->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- Appeal status 2 -->
                <div id="table-appeal-status2" class="appealContent table-repair">
                    <table class="table">
                        <col style="width: 10%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 20%;"/>
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">เรื่อง</th>
                            <th scope="col" class="text-center">ร้องเรียนไปบ้านเลขที่</th>
                            <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                            <th scope="col" class="th-sm-2 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $dataAppeal = $repairClass->getDataAppeal_st2();
                            foreach ($dataAppeal as $index => $data){
                                $houseNum =$data['appeal_area'];
                                $viewHouseNum = $repairClass->checkHouseNumber($houseNum); // check house number
                        ?>
                            <tr >
                                <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                <td class="p-3 " ><?php echo $data['appeal_detail'] ?></td>
                                <td class="text-center p-3"><?php echo $viewHouseNum['house_num'] ?></td>
                                <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusAppeal($data['appeal_status']) ?></p></td>
                                <td class="text-center p-2"><a class="btn btn-primary pl-pr" data-bs-toggle="modal" data-bs-target="#appealModal<?php echo $data['appeal_id'] ?>"><i class="bi bi-search px-2"></i>ยืนยันการร้องเรียน</a></td>
                            </tr>
                            <!-- start modal -->

                                <!-- Modal repair-->
                                <div class="modal fade" id="appealModal<?php echo $data['appeal_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <!-- formRepair -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการร้องเรียน</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">ชื่อผู้แจ้ง:</label>
                                                            <input type="hidden" class="form-control"  value="<?php echo $data['appeal_id']?>" >
                                                            <input type="text" class="form-control"  value="<?php echo $data['appeal_name']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">รายละเอียด:</label>
                                                            <p class="form-control"><?php echo $data['appeal_detail'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">ร้องเรียนไปบ้านเลขที่ :</label>
                                                            <input type="text" class="form-control"  value="<?php echo $viewHouseNum['house_num'] ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="modal-footer footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                    <a href="../components/Appeal/ad_check_appeal_st3.php?id=<?php echo $data['appeal_id']?>"  class="btn btn-primary">ร้องเรียนเรียบร้อย</a>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        <!-- end modal -->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <!-- Appeal status 3 -->
                <div id="table-appeal-status3" class="appealContent table-repair">
                <table class="table">
                        <col style="width: 10%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 20%;"/>
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">เรื่อง</th>
                            <th scope="col" class="text-center">ร้องเรียนไปบ้านเลขที่</th>
                            <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                            <th scope="col" class="th-sm-2 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $dataAppeal = $repairClass->getDataAppeal_st3();
                            foreach ($dataAppeal as $index => $data){
                                $houseNum =$data['appeal_area'];
                                $viewHouseNum = $repairClass->checkHouseNumber($houseNum); // check house number
                        ?>
                            <tr >
                                <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                <td class="p-3 " ><?php echo $data['appeal_detail'] ?></td>
                                <td class="text-center p-3"><?php echo $viewHouseNum['house_num'] ?></td>
                                <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusAppeal($data['appeal_status']) ?></p></td>
                                <td class="text-center p-2"><a class="btn btn-primary pl-pr" data-bs-toggle="modal" data-bs-target="#appealModal<?php echo $data['appeal_id'] ?>"><i class="bi bi-search px-2"></i>ดูรายละเอียด</a></td>
                            </tr>
                            <!-- start modal -->

                                <!-- Modal repair-->
                                <div class="modal fade" id="appealModal<?php echo $data['appeal_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <!-- formRepair -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการร้องเรียน</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">ชื่อผู้แจ้ง:</label>
                                                            <input type="hidden" class="form-control"  value="<?php echo $data['appeal_id']?>" >
                                                            <input type="text" class="form-control"  value="<?php echo $data['appeal_name']?>" readonly>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">รายละเอียด:</label>
                                                            <p class="form-control"><?php echo $data['appeal_detail'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="recipient-name" class="col-form-label">ร้องเรียนไปบ้านเลขที่ :</label>
                                                            <input type="text" class="form-control"  value="<?php echo $viewHouseNum['house_num'] ?>" readonly>
                                                        </div>
                                                </div>
                                                <div class="modal-footer footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        <!-- end modal -->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            

                    
                    
            </div>
    </div>


    <!-- Script -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
         function openHeader(header, elmnt, color) {
        // Hide all elements with class="tabcontent" by default */
            var i, headerTab, headerLink;
            headerTab = document.getElementsByClassName("header-tab");
            for (i = 0; i < headerTab.length; i++) {
                headerTab[i].style.display = "none";
            }
            

            // Remove the background color of all tablinks/buttons
            headerLink = document.getElementsByClassName("headerLink");
            for (i = 0; i < headerLink.length; i++) {
                headerLink[i].style.backgroundColor = "";
            }
            

            // Show the specific tab content
            document.getElementById(header).style.display = "block";

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen1").click();

// second tab repair
function openTableRepair(villagerDetail, elmnt, color) {
        // Hide all elements with class="tabcontent" by default */
            var i, repairContent, repairLink;
            repairContent = document.getElementsByClassName("repairContent");
            for (i = 0; i < repairContent.length; i++) {
                repairContent[i].style.display = "none";
            }

            // Remove the background color of all tablinks/buttons
            repairLink = document.getElementsByClassName("repairLink");
            for (i = 0; i < repairLink.length; i++) {
                repairLink[i].style.backgroundColor = "";
            }

            // Show the specific tab content
            document.getElementById(villagerDetail).style.display = "block";

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen2").click();

//end second tab repair

// second tab appeal
function openTableAppeal(appeal, elmnt, color) {
        // Hide all elements with class="tabcontent" by default */
            var i, appealContent, appealLink;
            appealContent = document.getElementsByClassName("appealContent");
            for (i = 0; i < appealContent.length; i++) {
                appealContent[i].style.display = "none";
            }

            // Remove the background color of all tablinks/buttons
            appealLink = document.getElementsByClassName("appealLink");
            for (i = 0; i < appealLink.length; i++) {
                appealLink[i].style.backgroundColor = "";
            }

            // Show the specific tab content
            document.getElementById(appeal).style.display = "block";

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen3").click();

//end second tab repair



        // CreateExpenses
        // $(document).ready(function() {

        //     $("form").submit(function(e) {
        //         e.preventDefault();
        //         let data_repair_st2 = $(this).serialize();
        //         $.ajax({
        //             type: "POST",
        //             url: "../components/Repair/ad_check_repair_st2.php",
        //             data: data_repair_st2,
        //             success: function(response) {
        //                 // console.log(response);
        //                 // $("#expensesModal").modal("hide");
        //                 $(document).ready(function() {
        //                     Swal.fire({
        //                         title: 'Success ',
        //                         text: ' ยืนยันการรับเรื่องเรียบร้อยแล้ว',
        //                         icon: 'success',
        //                         timer: 2000,
        //                         showConfirmButton: false
        //                     });
        //                     setTimeout(function() {
        //                         location.reload();
        //                     }, 2000);
        //                 });
                        
        //             }
        //         });
        //     });


        //     // form st2
        //     $("form").submit(function(e) {
        //         e.preventDefault();
        //         let data_repair_st3 = $(this).serialize();
        //         $.ajax({
        //             type: "POST",
        //             url: "../components/Repair/ad_check_repair_st3.php",
        //             data: data_repair_st2,
        //             success: function(response) {
        //                 // console.log(response);
        //                 // $("#expensesModal").modal("hide");
        //                 $(document).ready(function() {
        //                     Swal.fire({
        //                         title: 'Success ',
        //                         text: ' เรียบร้อยแล้ว',
        //                         icon: 'success',
        //                         timer: 2000,
        //                         showConfirmButton: false
        //                     });
        //                     setTimeout(function() {
        //                         location.reload();
        //                     }, 2000);
        //                 });
                        
        //             }
        //         });
        //     });

        // });


    </script>


</body>
</html>