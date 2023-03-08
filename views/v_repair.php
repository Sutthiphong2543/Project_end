<?php 
    require_once"../components/session.php";
    require_once"../components/check_villager.php";
    require_once"../config/connect.php";

    // list topic
    $topic = ['ไฟถนนหน้าบ้าน','ถนนชำรุด','ท่อน้ำชำรุด'];
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/vlg_repair.css?<?php echo time(); ?>">
    <title>Villager Repair</title>
</head>
<body>
    <?php 
        require_once '../components/template_vlg.php';
    ?>
    <div class="main-container">
        <div class="vlg_repair">
            <!-- Header -->
            <div class="re_header">
                <div class="re_btn">
                    <div class="re_left">
                        <button class="btn headerLink head-border" onclick="openHeader('header1', this, 'orange')" id="defaultOpen1">รายการแจ้งซ่อม</button>
                        <button class="btn headerLink head-border" onclick="openHeader('header2', this, 'orange')" >รายการร้องเรียน</button>
                    </div>
                    <div class="re_right">
                        <button id="repair" class="btn "  data-bs-toggle="modal" data-bs-target="#repairModal"><i class="bi bi-file-earmark-plus mx-1" ></i>แจ้งซ่อม</button>
                        <button id="appeals" class="btn "  data-bs-toggle="modal" data-bs-target="#appealModal"><i class="bi bi-file-earmark-plus mx-1" ></i>ร้องเรียน</button>
                    </div>
                </div>
                <hr class="mx-3">
            </div>
            
            <!-- content -->
            <div id="header1" class="header-tab mt-2 mx-3">
                <div class="secondTab d-flex mt-2 ">
                        <button class="btn repairLink second-border" onclick="openTableRepair('table-repair-status1', this, 'orange')" id="defaultOpen2">รายการแจ้งซ่อม</button>
                        <button class="btn repairLink second-border" onclick="openTableRepair('table-repair-status2', this, 'orange')" >รอดำเนินการ</button>
                        <button class="btn repairLink second-border" onclick="openTableRepair('table-repair-status3', this, 'orange')" >ประวัติการแจ้งซ่อม</button>
                </div>
                <div id="table-repair-status1" class="repairContent table-repair">
                        <!-- Table -->
                        <div id="re_table" class="tabContent">
                            <table class="table">
                                <col style="width: 10%;"/>
                                <col style="width: 40%;"/>
                                <col style="width: 30%;"/>
                                <col style="width: 20%;"/>
                                <thead>
                                    <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">เรื่อง</th>
                                    <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                                    <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $dataRepair = $repairClass->getDataRepair($id);
                                    foreach ($dataRepair as $index => $data){
                                ?>
                                    <tr >
                                        <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                        <td class="p-3" ><?php echo $data['noti_repair_subject'] ?></td>
                                        <td class="text-center p-3"><?php echo $data['noti_repair_detail'] ?></td>
                                        <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusRepair($data['status_repair']) ?></p></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
                <!-- end table1 -->
                <div id="table-repair-status2" class="repairContent table-repair">
                    <!-- Table -->
                    <div id="re_table" class="tabContent">
                            <table class="table">
                                <col style="width: 10%;"/>            
                                <col style="width: 40%;"/>
                                <col style="width: 30%;"/>
                                <col style="width: 20%;"/>
                                <thead>
                                    <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">เรื่อง</th>
                                    <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                                    <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $dataRepair = $repairClass->getDataRepair_vlg_st2($id);
                                    foreach ($dataRepair as $index => $data){
                                ?>
                                    <tr >
                                        <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                        <td class="p-3" ><?php echo $data['noti_repair_subject'] ?></td>
                                        <td class="text-center p-3"><?php echo $data['noti_repair_detail'] ?></td>
                                        <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusRepair($data['status_repair']) ?></p></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
                <div id="table-repair-status3" class="repairContent table-repair">
                    <!-- Table -->
                    <div id="re_table" class="tabContent">
                            <table class="table">
                                <col style="width: 10%;"/>
                                <col style="width: 40%;"/>
                                <col style="width: 30%;"/>
                                <col style="width: 20%;"/>
                                <thead>
                                    <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">เรื่อง</th>
                                    <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                                    <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $dataRepair = $repairClass->getDataRepair_vlg_st3($id);
                                    foreach ($dataRepair as $index => $data){
                                ?>
                                    <tr >
                                        <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                        <td class="p-3" ><?php echo $data['noti_repair_subject'] ?></td>
                                        <td class="text-center p-3"><?php echo $data['noti_repair_detail'] ?></td>
                                        <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusRepair($data['status_repair']) ?></p></td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>

            <!------------------------------------------------ Appeal table -->
            <div id="header2" class="header-tab  mt-2 mx-3">
                <div class="secondTab d-flex mt-2 ">
                        <button class="btn appealLink second-border" onclick="openTableAppeal('table-appeal-status1', this, 'orange')" id="defaultOpen3">รายการร้องเรียน</button>
                        <button class="btn appealLink second-border" onclick="openTableAppeal('table-appeal-status2', this, 'orange')" >รอดำเนินการ</button>
                        <button class="btn appealLink second-border" onclick="openTableAppeal('table-appeal-status3', this, 'orange')" >ประวัติการร้องเรียน</button>
                </div>
                <div id="table-appeal-status1" class="appealContent table-repair">
                    <!-- Table -->
                    <div id="ap_table" class="tabContent">
                        <table class="table">
                            <col style="width: 10%;"/>
                            <col style="width: 40%;"/>
                            <col style="width: 30%;"/>
                            <col style="width: 30%"/>
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">รายละเอียดการร้องเรียน</th>
                                <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                                <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $dataAppeals = $repairClass->getDataAppeals($id);
                                foreach ($dataAppeals as $index => $data){
                                    $houseNum =$data['appeal_area'];
                                    $viewHouseNum = $repairClass->checkHouseNumber($houseNum); // check house number
                            ?>
                                <tr >
                                    <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                    <td class="p-3" ><?php echo $data['appeal_detail'] ?></td>
                                    <td class="text-center p-3"><?php echo $viewHouseNum['house_num'] ?></td>
                                    <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusAppeal($data['appeal_status']) ?></p></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="table-appeal-status2" class="appealContent table-repair">
                    <!-- Table -->
                    <div id="ap_table" class="tabContent">
                        <table class="table">
                            <col style="width: 10%;"/>
                            <col style="width: 40%;"/>
                            <col style="width: 30%;"/>
                            <col style="width: 30%"/>
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">รายละเอียดการร้องเรียน</th>
                                <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                                <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $dataAppeals = $repairClass->getDataAppeals2($id);
                                foreach ($dataAppeals as $index => $data){
                                    $houseNum =$data['appeal_area'];
                                    $viewHouseNum = $repairClass->checkHouseNumber($houseNum); // check house number
                            ?>
                                <tr >
                                    <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                    <td class="p-3" ><?php echo $data['appeal_detail'] ?></td>
                                    <td class="text-center p-3"><?php echo $viewHouseNum['house_num'] ?></td>
                                    <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusAppeal($data['appeal_status']) ?></p></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="table-appeal-status3" class="appealContent table-repair">
                    <!-- Table -->
                    <div id="ap_table" class="tabContent">
                        <table class="table">
                            <col style="width: 10%;"/>
                            <col style="width: 40%;"/>
                            <col style="width: 30%;"/>
                            <col style="width: 30%"/>
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">รายละเอียดการร้องเรียน</th>
                                <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                                <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $dataAppeals = $repairClass->getDataAppeals3($id);
                                foreach ($dataAppeals as $index => $data){
                                    $houseNum =$data['appeal_area'];
                                    $viewHouseNum = $repairClass->checkHouseNumber($houseNum); // check house number
                            ?>
                                <tr >
                                    <td class="text-center p-3" ><?php echo $index+1 ?></td>
                                    <td class="p-3" ><?php echo $data['appeal_detail'] ?></td>
                                    <td class="text-center p-3"><?php echo $viewHouseNum['house_num'] ?></td>
                                    <td class="p-3"><p id="re_btn_status" class=" bg-warning text-white text-center"><?php echo $repairClass->statusAppeal($data['appeal_status']) ?></p></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
            
        </div>
        

    </div>

<!--------------------------------------------------------- Modal repair-->

<div class="modal fade" id="repairModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <!-- formRepair -->
        <form id="form-repair" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">แจ้งซ่อม</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ชื่อผู้แจ้ง:</label>
                            <input type="hidden" class="form-control" id="recipient-name" name="id" value="<?php echo $vlg['villager_id']?>" >
                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $vlg['villager_fname'].' '.$vlg['villager_lname'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">เรื่อง:</label>
                            <select class="form-select" name="topic_repair" aria-label="select topic" required>
                                <option selected>เลือกหัวข้อที่แจ้ง</option>
                            <?php foreach($topic as $viewsTopic){ ?>
                                <option value="<?php echo $viewsTopic ?>"><?php echo $viewsTopic ?></option>
                            <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">บริเวณ:</label>
                            <input type="text" class="form-control" name="area" id="recipient-name" required>
                        </div>
                        <div class="mb-3">
                            <label for="img-area" class="col-form-label">แนบรูปภาพ:</label>
                            <input type="file" class="form-control" name="img_area" id="img-area" required>
                        </div>
                    
                </div>
                <div class="modal-footer footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" name="create_repair" value="Submit" class="btn btn-primary">บันทึกแจ้งซ่อม</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal  appeals-->
<div class="modal fade" id="appealModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <!-- formAppeal -->
        <form id="form-appeal" method="POST" >
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">ร้องเรียน  </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ชื่อผู้แจ้ง:</label>
                            <input type="hidden" class="form-control" id="recipient-name" name="id" value="<?php echo $vlg['villager_id']?>" >
                            <input type="text" class="form-control" id="recipient-name" name="name" value="<?php echo $vlg['villager_fname'].' '.$vlg['villager_lname'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">รายละเอียด:</label>
                            <textarea class="form-control" name="detailAppeals" id="detailAppeals" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">บ้านเลขที่ :</label>
                            <select class="form-select" name="num_home" aria-label="select topic" required>
                                <option selected>เลือกบ้านเลขที่จะแจ้ง</option>
                            <?php
                            $houseArea = $repairClass->getSelectHouse();
                            foreach($houseArea as $viewsHouse){ ?>
                                <option value="<?php echo $viewsHouse['villager_id'] ?>"><?php echo $viewsHouse['villager_housenum'] ?></option>
                            <?php } ?>
                            </select>
                        </div>
                </div>
                <div class="modal-footer footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                    <button type="submit" value="submitAppeal" class="btn btn-primary">บันทึกร้องเรียน</button>
                </div>
            </div>
        </form>
    </div>
</div>



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

            // show button trimas
            if(header =='header1'){
                $('#appeals').hide();
                $('#repair').show();
            }else{
                $('#repair').hide();
                $('#appeals').show();
            }

            // Show the specific tab content
            document.getElementById(header).style.display = "block";

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen1").click();  
// second header
function openTableRepair(tab, elmnt, color) {
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
            document.getElementById(tab).style.display = "block";

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen2").click();

// second header
function openTableAppeal(tab, elmnt, color) {
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
            document.getElementById(tab).style.display = "block";

            // Add the specific color to the button used to open the tab content
            elmnt.style.backgroundColor = color;
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen3").click();

//end second tab repair

// function

//form repair
$(document).ready(function() {
  $('#form-repair').submit(function(event) {
    event.preventDefault();

    let data_repair = new FormData(this);

    $.ajax({
      url: '../components/Repair/vlg_createRepair.php',
      type: 'POST',
      data: data_repair,
      processData: false,
      contentType: false,
      success: function(response) {
        // console.log(response);
        $("#repairModal").modal('hide');

        $(document).ready(function() {
            Swal.fire({
                title: 'Success ',
                text: ' แจ้งซ่อมเรียบร้อย',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
            setTimeout(function() {
                location.reload();
            }, 2000);
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  });
});


//form appeals
$(document).ready(function() {
  $('#form-appeal').submit(function(event) {
    event.preventDefault();

    let data_appeal = $(this).serialize();

    $.ajax({
      url: '../components/Repair/vlg_createAppeal.php',
      type: 'POST',
      data: data_appeal,
      success: function(response) {
        console.log(response);
        $("#appealModal").modal('hide');

        $(document).ready(function() {
            Swal.fire({
                title: 'Success ',
                text: ' ร้องเรียนเรียบร้อย',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
            setTimeout(function() {
                location.reload();
            }, 2000);
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  });
});

</script>
</body>
</html>