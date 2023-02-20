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
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">#</th>
                                <th scope="col" class="text-center">ชื่อ</th>
                                <th scope="col" class="text-center">บริเวณ</th>
                                <th scope="col" class="text-center">เรื่อง</th>
                                <th scope="col" class="text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th class="text-center">1</th>
                                <th class="text-nowrap">นางสาวฐา วันดี</th>
                                <td class="text-center">241/1</td>
                                <td class="text-center">ไฟหน้าบ้านเสีย</td>
                                <td class="text-center">รอดำเนินการ</td>
                                </tr>
                                <tr>
                                <th class="text-center">2</th>
                                <th class="text-nowrap">นางสาวฐา วันดี</th>
                                <td class="text-center">241/1</td>
                                <td class="text-center">ไฟหน้าบ้านเสีย</td>
                                <td class="text-center">รอดำเนินการ</td>
                                </tr>
                                <tr>
                                <th class="text-center">3</th>
                                <th class="text-nowrap">นางสาวฐา วันดี</th>
                                <td class="text-center">241/1</td>
                                <td class="text-center">ไฟหน้าบ้านเสีย</td>
                                <td class="text-center">รอดำเนินการ</td>
                                </tr>
                            
                                
                            </tbody>
                            </table>
                    </div>
                    <!-- ร้องเรียน -->
                    <div id="table-appeal" class="tabContent table-appeals">
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">ชื่อ</th>
                                <th scope="col" class="text-center">บริเวณ</th>
                                <th scope="col" class="text-center">เรื่อง</th>
                                <th scope="col" class="text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <th class="text-nowrap">นางสาวฐา วันดี</th>
                                <td class="text-center">241/1</td>
                                <td class="text-center">ไฟหน้าบ้านเสีย</td>
                                <td class="text-center">รอดำเนินการ</td>
                                </tr>
                                <tr>
                                <th class="text-nowrap">นางสาวฐา วันดี</th>
                                <td class="text-center">241/1</td>
                                <td class="text-center">ไฟหน้าบ้านเสีย</td>
                                <td class="text-center">รอดำเนินการ</td>
                                </tr>
                                
                            
                                
                            </tbody>
                        </table>
                    </div>
            </div>
    
        
    </div>


    <!-- Script -->
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
    </script>


</body>
</html>