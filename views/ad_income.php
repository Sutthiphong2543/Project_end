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
    
    <link rel="stylesheet" href="../css/income.css ?<?php echo time(); ?>">
    <title>income</title>
</head>
<body>
<?php require_once'../components/ad_template.php'?>
<!-- .......................... -->
    <div class="main-container ">
        <div class="main-income">
            <div class="head-income d-flex">
                <button class="btn tablink" onclick="tabIOcome('table-income', this, '#00ECBC')" id="defaultOpen">รายรับ</button>
                <button class="btn tablink" onclick="tabIOcome('table-outcome', this, '#FFCAA6')">รานจ่าย</button>
                <button class="btn tablink" onclick="tabIOcome('table-report', this, '#F86594')">สรุป</button>
                <div class="filter">
                    <button class="btn btn-filer"><i class="bi bi-sliders mx-2" ></i>2022</button>
                </div>
                <div class="printer">
                    <button class="btn btn-printer"><i class="bi bi-printer mx-2" ></i>พิมพ์</button>
                </div>

            </div>

            <div id="table-income" class="tabContent">
            <table class="table">
                <thead>
                    <tr class="text-center">
                    <th scope="col" >บ้านเลขที่</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">Jan.</th>
                    <th scope="col">Feb.</th>
                    <th scope="col">Mar.</th>
                    <th scope="col">Apr.</th>
                    <th scope="col">May.</th>
                    <th scope="col">Jun.</th>
                    <th scope="col">Jul.</th>
                    <th scope="col">Aug.</th>
                    <th scope="col">Sep.</th>
                    <th scope="col">Oct.</th>
                    <th scope="col">Nov.</th>
                    <th scope="col">Dec.</th>
                    <th scope="col">รวม</th>
                    
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr >
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td>600</td>
                    </tr>
                    <tr>
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td>600</td>
                    </tr>
                    
                </tbody>
                </table>
            </div>
            <!-- table tab outcome -->
            <div id="table-outcome" class="tabContent">
            <table class="table">
                <thead>
                    <tr class="text-center">
                    <th scope="col" >บ้านเลขที่</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">Jan.</th>
                    <th scope="col">Feb.</th>
                    <th scope="col">Mar.</th>
                    <th scope="col">Apr.</th>
                    <th scope="col">May.</th>
                    <th scope="col">Jun.</th>
                    <th scope="col">Jul.</th>
                    <th scope="col">Aug.</th>
                    <th scope="col">Sep.</th>
                    <th scope="col">Oct.</th>
                    <th scope="col">Nov.</th>
                    <th scope="col">Dec.</th>
                    <th scope="col">รวม</th>
                    
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr >
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td>600</td>
                    </tr>
                    <tr>
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td>600</td>
                    </tr>
                    <tr>
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td>600</td>
                    </tr>
                    
                </tbody>
                </table>
            </div>
            <!-- table  สรุป -->
            <div id="table-report" class="tabContent">
            <table class="table">
                <thead>
                    <tr class="text-center">
                    <th scope="col" >บ้านเลขที่</th>
                    <th scope="col">ชื่อ</th>
                    <th scope="col">Jan.</th>
                    <th scope="col">Feb.</th>
                    <th scope="col">Mar.</th>
                    <th scope="col">Apr.</th>
                    <th scope="col">May.</th>
                    <th scope="col">Jun.</th>
                    <th scope="col">Jul.</th>
                    <th scope="col">Aug.</th>
                    <th scope="col">Sep.</th>
                    <th scope="col">Oct.</th>
                    <th scope="col">Nov.</th>
                    <th scope="col">Dec.</th>
                    <th scope="col">รวม</th>
                    
                    </tr>
                </thead>
                <tbody class="text-center">
                    <tr >
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td>600</td>
                    </tr>
                    <tr>
                    <th>241/2</th>
                    <td>นางสาวฐา วันดี</td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-check-circle-fill"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td><i class="bi bi-x-circle"></i></td>
                    <td>600</td>
                    </tr>
                    
                </tbody>
                </table>
            </div>
        </div>
    </div>


<script>


     // header tab

     function tabIOcome(villagerDetail, elmnt, color) {
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