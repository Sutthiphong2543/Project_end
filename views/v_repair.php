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
    <title>Villager Payment</title>
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
                        <button class="btn tablink" onclick="openRepair_v('ap_table', this, 'orange')"">รายการร้องเรียน</button>
                    </div>
                    <div class="re_right">
                        <button class="btn "><i class="bi bi-file-earmark-plus mx-1" ></i>แจ้งซ่อม</button>
                    </div>
                
                </div>
            </div>
            <!-- content -->
            <div class="re_content">
                <hr>
                <!-- Table -->
                <div id="re_table" class="tabContent">
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
</script>
</body>
</html>