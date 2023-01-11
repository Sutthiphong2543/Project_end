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
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/payment.css ?<?php echo time(); ?>">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    

    <title>Document</title>
</head>
<body>
    <div class="main-container ">
        <div class="main-dash">
            <div class="header-dash d-flex mt-2">
                <button class="btn tablink" onclick="openVillagerPay('pay-1', this, 'orange')" id="defaultOpen">รายการทั้งหมด</button>
                <button class="btn tablink" onclick="openVillagerPay('pay-2', this, '#F1C40F')">รอดำเนินการ</button>
                <button class="btn tablink" onclick="openVillagerPay('pay-3', this, '#48C9B0')">ชำระแล้ว</button>
                <button class="btn tablink" onclick="openVillagerPay('pay-4', this, '#E74C3C')">ค้างชำระ</button>
                <button class="btn tablink" onclick="openVillagerPay('pay-5', this, '#3498DB')">ชำระล่วงหน้า</button>
                <div class="noti-pay">
                    <button class="btn" data-bs-toggle="modal" data-bs-target="#paymentModal">ใบแจ้งชำระ</button>
                </div>
            </div>
            <!-- Table -->
            <div class="box-table-pay">
                <!-- รายการทั้งหมด -->
                <div id="pay-1" class="table-pay tabContent">
                <table id="table-pay-1" class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้ง</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                        
                    </tbody>
                    </table>
                </div>
                <!-- รอดำเนินการ -->
                <div id="pay-2" class="table-pay tabContent">
                <table id="table-pay-2" class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้ง</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <!-- ชำระแล้ว -->
                <div id="pay-3" class="table-pay tabContent">
                <table id="table-pay-3" class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้ง</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                        
                    </tbody>
                    </table>
                </div>
                <!-- ค้างชำระ -->
                <div id="pay-4" class="table-pay tabContent">
                <table id="table-pay-4" class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้ง</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                       
                        
                    </tbody>
                    </table>
                </div>
                <!-- ชำระล่วงหน้า -->
                <div id="pay-5" class="table-pay tabContent">
                <table id="table-pay-5" class="table">
                    <thead>
                        <tr>
                        <th scope="col" class="text-center">ชื่อ</th>
                        <th scope="col" class="text-center">บ้านเลขที่</th>
                        <th scope="col" class="text-center">วันที่แจ้ง</th>
                        <th scope="col" class="text-center">สถานะ</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                        <tr>
                        <th class="text-nowrap">นางสาวฐา วันดี</th>
                        <td class="text-center">241/1</td>
                        <td class="text-center">1 ม.ค 65</td>
                        <td class="text-center">ชำระแล้ว</td>
                        <td class="text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                        <td class="text-center">ส่งใบเสร็จ<i class="bi bi-send mx-2"></i></td>
                        </tr>
                    </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

     <!-- Modal -->
    
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-payment">
                        <!-- payment1 -->
                        <div class="payment-1">
                            <!-- title head -->
                            <div class="head-pay">
                                <h2 class="text-center">ใบเสร็จรับเงินค่าส่วนกลาง</h2>
                            </div>
                            <hr>
                            <!-- Detail vlg  -->
                            <div class="detail-vlg-pay">
                                <div class="d-vlg-p">
                                    <div class="form-group">
                                        <label>บ้านเลขที่ : </label>
                                        <label>241/1</label>
                                    </div>
                                    <div class="form-group">
                                        <label>ชื่อ : </label>
                                        <label>นางสาวฐา วันดี</label>
                                    </div>
                                    <div class="form-group">
                                        <label>วันที่แจ้งชำระ :</label>
                                        <label>16 มกราคม 2566</label>
                                    </div>
                                    <div class="form-group">
                                        <label>ชำระล่วงหน้า :</label>
                                        <label>มกราคม กุมพาพันธ์</label>
                                    </div>
                                </div>
                                <div class="form-group text-end">
                                        <label>ชำระก่อนวันที่ :</label>
                                        <label>5 มกราคม 2565</label>
                                    </div>
                            </div>


                        </div>
                        <div class="payment-2">
                                <!-- table content -->
                            <div class="pay-table-box">
                                <div class="pay_table">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                            <th scope="col">รายการ</th>
                                            <th scope="col" class="text-end">จำนวน (บาท)</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="prg">ค่าส่วนกลาง</td>
                                                <td class="text-end prg">100</td>
                                            </tr>
                                            <tr>
                                                <td class="prg">ค่าไฟ</td>
                                                <td class="text-end prg">-</td>
                                            </tr>
                                            <tr>
                                                <td class="prg">ค่าน้ำ</td>
                                                <td class="text-end prg">-</td>
                                            </tr>
                                            <tr>
                                                <td class="prg">อื่นๆ</td>
                                                <td class="text-end prg">-</td>
                                            </tr>
                                            <tr>
                                                <td class="prg">ค้างชำระ</td>
                                                <td class="text-end prg">100</td>
                                            </tr>
                                            <tr>
                                                <td scope="col">รวม</td>
                                                <td scope="col" class="text-end ">200</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- btn  -->
                        <div class="payment-3">
                            <div class="btn-pay-vlg">
                                <button class="btn btn-vlg-success">ส่ง</button>
                                <button class="btn btn-vlg-close"data-bs-dismiss="modal" >ยกเลิก</button>
                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
        </div>

<script>
    // table
        $(document).ready(function() {
            $('#table-pay-1').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#table-pay-2').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#table-pay-3').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#table-pay-4').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#table-pay-5').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
    // tab
    function openVillagerPay(villagerDetail, elmnt, color) {
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
    <?php include_once '../components/sidebar.php' ?>
</body>
</html>