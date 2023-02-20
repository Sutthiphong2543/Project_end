<?php 
    require_once"../components/session.php";
    require_once"../components/check_villager.php";

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
                        <button class="btn tablink" onclick="openRepair_v('re_table', this, 'orange')" id="defaultOpen">รายการแจ้งซ่อม</button>
                        <button class="btn tablink" onclick="openRepair_v('ap_table', this, 'orange')">รายการร้องเรียน</button>
                    </div>
                    <div class="re_right">
                        <button class="btn "  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-file-earmark-plus mx-1" ></i>แจ้งซ่อม</button>
                    </div>
                
                </div>
            </div>
            <!-- content -->
            <div class="re_content">
                <hr>
                <!-- Table -->
                <div id="re_table" class="tabContent">
                    <table class="table">
                        <col style="width: 10%;"/>
                        <col style="width: 40%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%"/>
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">เรื่อง</th>
                            <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                            <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>1</td>
                            <td>ซ่อมไฟหน้าบ้าน</td>
                            <td class="text-center">241/1 - 241/5</td>
                            <td ><p id="re_btn_status" class=" bg-warning text-white text-center">รอดำเนินการ</p></td>
                            </tr>
                            <tr>
                            <td>1</td>
                            <td>ซ่อมไฟหน้าบ้าน</td>
                            <td class="text-center">241/1 - 241/5</td>
                            <td ><p id="re_btn_status" class=" bg-warning text-white text-center">รอดำเนินการ</p></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                <!-- Table -->
                <div id="ap_table" class="tabContent">
                    <table class="table">
                        <col style="width: 40%;"/>
                        <col style="width: 40%;"/>
                        <col style="width: 20%"/>
                        <thead>
                            <tr>
                            <th scope="col" class="text-center">เรื่อง</th>
                            <th scope="col" class="text-center">บริเวณบ้านเลขที่</th>
                            <th scope="col" class="th-sm-2 text-center">สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>ซ่อมไฟหน้าบ้าน</td>
                            <td class="text-center">241/1 - 241/5</td>
                            <td ><p id="re_btn_status" class=" bg-warning text-white text-center">รอดำเนินการ</p></td>
                            </tr>
                            <tr>
                            <td>ซ่อมไฟหน้าบ้าน</td>
                            <td class="text-center">241/1 - 241/5</td>
                            <td ><p id="re_btn_status" class=" bg-warning text-white text-center">รอดำเนินการ</p></td>
                            </tr>
                            <tr>
                            <td>ซ่อมไฟหน้าบ้าน</td>
                            <td class="text-center">241/1 - 241/5</td>
                            <td ><p id="re_btn_status" class=" bg-warning text-white text-center">รอดำเนินการ</p></td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        

    </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แจ้งซ่อม</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">ชื่อผู้แจ้ง:</label>
                        <input type="text" class="form-control" id="recipient-name" required>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">เรื่อง:</label>
                        <select class="form-select" aria-label="select topic" required>
                            <option selected>เลือกหัวข้อที่แจ้ง</option>
                        <?php foreach($topic as $index => $viewsTopic){ ?>
                            <option value="<?php echo $index+1 ?>"><?php echo $viewsTopic ?></option>
                        <?php } ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">บริเวณ:</label>
                        <input type="text" class="form-control" id="recipient-name" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary">บันทึกแจ้งซ่อม</button>
            </div>
            </div>
        </div>
        </div>




<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
  function openRepair_v(villagerDetail, elmnt, color) {
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


// function
    $(document).ready(function ()  {

    });

</script>
</body>
</html>