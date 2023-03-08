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
                        <button class="btn tablink" onclick="openRepair('table-repair', this, 'orange')" id="defaultOpen">แจ้งซ่อม</button>
                        <button class="btn tablink" onclick="openRepair('table-appeal', this, '#4B749F')" >ร้องเรียน</button>
            </div>

                    <div id="table-repair" class="tabContent table-repair">
                        <table class="table">
                            <col style="width: 10%;"/>
                            <col style="width: 30%;"/>
                            <col style="width: 20%;"/>
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
                                    <td class="text-center p-3"><a class="btn btn-primary pl-pr" data-bs-toggle="modal" data-bs-target="#repairModal<?php echo $data['noti_repair_id'] ?>"><i class="bi bi-search px-2"></i>ดูรายละเอียด</a></td>
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
                                                        <button type="submit" value="Submit"  class="btn btn-primary">ยืนยันการรับเรื่อง</button>
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
                    <!-- ร้องเรียน -->
                    <div id="table-appeal" class="tabContent table-appeals">
                    <table class="table">
                        <col style="width: 10%;"/>
                        <col style="width: 40%;"/>
                        <col style="width: 40%;"/>
                        <col style="width: 20%"/>
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
                            $dataAppeals = $repairClass->getDataAppealsAll();
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


    <!-- Script -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
    <script>
         function openRepair(villagerDetail, elmnt, color) {
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





        // CreateExpenses
        $(document).ready(function() {

            $("form").submit(function(e) {
                e.preventDefault();
                let data_repair_st2 = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "../components/Repair/ad_check_repair_st2.php",
                    data: data_repair_st2,
                    success: function(response) {
                        // console.log(response);
                        // $("#expensesModal").modal("hide");
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'Success ',
                                text: ' ยืนยันการรับเรื่องเรียบร้อยแล้ว',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 2000);
                        });
                        
                    }
                });
            });
        });


    </script>


</body>
</html>