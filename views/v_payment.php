<?php 
    require_once"../components/session.php";
    require_once"../components/check_villager.php";
    require_once"../config/connect.php";

    $invoiceVlg = $controller->getInvoice($id); // id เอามาจาก check_villager
    $invoiceVlg_history = $controller->getInvoice_history($id); // id เอามาจาก check_villager
    $invoiceVlg_waiting = $controller->getInvoice_waiting($id); // id เอามาจาก check_villager


    // check date and time
    // $date1 = "2022-01-20";
    // $date2 = "2022-01-25";
    
    // $timestamp1 = strtotime($date1);
    // $timestamp2 = strtotime($date2);
    
    // if ($timestamp1 > $timestamp2) {
    //     echo "$date1 is greater than $date2";
    // } else if ($timestamp1 < $timestamp2) {
    //     echo "$date1 is less than $date2";
    // } else {
    //     echo "$date1 is equal to $date2";
    // }

foreach($invoiceVlg as $ice){
    date_default_timezone_set("Asia/Bangkok");
    $dateTimeNow = date("Y-m-d");

    $date2 = "2022-01-25";
    
    $timeNow = strtotime($dateTimeNow);
    $timeEnd = strtotime($ice['date_end']);
    
    if ($timeNow > $timeEnd) {
        $vlgOverPayment=$controller->checkOverPay('4', $ice['invoice_id'],$ice['invoice_cmf'] );
    } 
}

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

    <!-- Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <!-- .. -->
    <link rel="stylesheet" href="../css/vlg_payment.css?<?php echo time(); ?>">
    <title>Villager Payment</title>
</head>
<body>
    <?php 
        require_once '../components/template_vlg.php';
    ?>
    <div class="main-container">
        <div class="vlg_payment">
            <!-- Header -->
            <div class="pay_header">
                <!-- BTN -->
                <div class="pay_btn">
                    <div class="pay_left">
                        <button class="btn tablink" onclick="openPayment_v('re_pay', this, 'orange')" id="defaultOpen">ใบแจ้งชำระ</button>
                        <button class="btn tablink" onclick="openPayment_v('table-waiting', this, 'orange')">รอดำเนินการ</button>
                        <button class="btn tablink" onclick="openPayment_v('table-history', this, 'orange')">ประวัติการชำระ</button>
                    </div>
                    <div class="pay_right">
                        <button class="btn "><i class="bi bi-sliders mx-1" ></i>เดือน</button>
                    </div>
                </div>
            </div>
            <!-- content -->
            <div id="re_pay" class="tabContent">
                <hr>
                <!-- box -->
                <div class="pay_content">
                    <!-- content inside -->
                    <?php foreach($invoiceVlg as $key){  ?>
                    <div class="pay_box">
                        <div class="p_box pay_box1">
                            <h4 class="text-center">ใบแจ้งชำระค่าส่วนกลางประจำเดือน<?php echo $controller->checkMonth($key['month']);?></h4>
                            <p class="text-center">**** กรุณาชำระก่อนวันที่ <?php echo $key['date_end']  ?>****</p>
                        </div>
                        <!-- table content -->
                        <div class="p_box pay_box2">
                            <!--  -->
                            <!-- <div class="container">
                                <div>
                                    <input class="form-control" type="text" id="amount" placeholder="amount">
                                    <button class="btn btn-success mt-2" onclick="genQR()">Generate</button>
                                </div>
                                <img id="imgqr" src="" style="width: 500px; object-fit: contain;">
                            </div> -->

                        <!--  -->
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
                                            <td class="text-end prg"><?php echo $key['invoice_cmf'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="prg">ค่าไฟ</td>
                                            <td class="text-end prg"><?php echo $key['elect_bill'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="prg">ค่าน้ำ</td>
                                            <td class="text-end prg"><?php echo $key['water_bill'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="prg">อื่นๆ</td>
                                            <td class="text-end prg"><?php echo $key['another_bill'] ?></td>
                                        </tr>
                                        <tr>
                                            <td class="prg">ค้างชำระ</td>
                                            <td class="text-end prg"><?php echo $key['invoice_overdue'] ?></td>
                                        </tr>
                                        <tr>
                                            <td scope="col">รวม</td>
                                            <td scope="col" class="text-end "><?php echo $key['total_amount'] ?></td>
                                        </tr>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- button click -->
                        <div class="p_box pay_box3">
                            <button class="btn btn-sendTP btn-success" data-bs-toggle="modal" data-bs-target="#vlg_pay_step1_modal">แจ้งชำระ</button>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- end payment -->

            <div class="history_pay_v">
                <div id="table-waiting" class="table-history tabContent">
                <table id="waiting_pay_vlg" class="table">
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">เดือน</th>
                                <th scope="col" class="text-center">สถานะ</th>
                                <th scope="col" class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($invoiceVlg_waiting as $ice_waiting){ ?>
                                <tr>
                                <th class="text-nowrap"><?php echo $controller->checkMonth($ice_waiting['month']) ?></th>
                                <td class="text-center"><?php echo $controller->checkStatusPay($ice_waiting['status_pay']) ?></td>
                                <td class="text-center"><button class="btn bg-info text-white" data-bs-toggle="modal" data-bs-target="#getPaymentModal<?php echo $ice_waiting['invoice_id'] ?>"><i class="bi bi-eye-fill mx-2"></i>ดูข้อมูล</button></td>
                                </tr>

                                 <!-- Modal ใบเสร็จรับเงิน -->
    
                                <div class="modal fade" id="getPaymentModal<?php echo $ice_waiting['invoice_id'] ?>" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="main-detail-payment">
                                                <div class="container">
                                                    <div class="header">
                                                        <h4 class="text-center">รายละเอียดการแจ้งชำระ</h4>
                                                    </div>
                                                    <hr>
                                                    <div class="content-detail-payment">
                                                        <div class="detail-left">
                                                            <div class="pre-img-slip">
                                                                <img id="img-slip" src="../upload/Slip/<?php echo $ice_waiting['img_slip'] ?>" >
                                                            </div>
                                                        </div>
                                                        <div class="detail-right">
                                                            <div class="detail-right-content">
                                                                <div class="form-detail">
                                                                    <label class="form-label">บ้านเลขที่ : <?php echo $ice_waiting['villager_housenum'] ?></label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">ชื่อ : <?php echo $ice_waiting['villager_fname'].' '.$ice_waiting['villager_lname'] ?></label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">ค่าส่วนกลาง : <?php echo $ice_waiting['invoice_cmf'] ?> บาท</label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">ค้างชำระ : <?php echo $ice_waiting['invoice_overdue'] ?> บาท</label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">ชำระล่วงหน้า : <?php echo (($ice_waiting['pay_amount'])-($ice_waiting['total_amount']))/100 ?> เดือน </label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">รวม : <?php echo $ice_waiting['pay_amount'] ?> บาท</label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">วันที่แจ้งชำระ : <?php echo $ice_waiting['date_pay'] ?></label>
                                                                </div>
                                                                <div class="btn-detail-payment">
                                                                    <button class="btn btn-vlg-close"data-bs-dismiss="modal" >ปิด</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                            </tbody>
                            </table>
                </div>
                <div id="table-history" class="table-history tabContent">
                <table id="history_pay_vlg" class="table">
                            <thead>
                                <tr>
                                <th scope="col" class="text-center">เดือน</th>
                                <th scope="col" class="text-center">ใบเสร็จ</th>
                                <th scope="col" class="text-center">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($invoiceVlg_history as $ice_history){ ?>
                                <tr>
                                <th class="text-nowrap"><?php echo $controller->checkMonth($ice_history['month']) ?></th>
                                <td class="text-center"><button class="btn bg-info text-white" data-bs-toggle="modal" data-bs-target="#getPaymentModal<?php echo $ice_history['invoice_id'] ?>"><i class="bi bi-eye-fill mx-2"></i>ดูข้อมูล</button></td>
                                <td class="text-center"><?php echo $controller->checkStatusPay($ice_history['status_pay']) ?></td>
                                </tr>
                                 <!-- Modal ใบเสร็จรับเงิน -->
    
                                 <div class="modal fade" id="getPaymentModal<?php echo $ice_history['invoice_id'] ?>" tabindex="-1" aria-labelledby="villagerModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="main-detail-payment">
                                                <div class="container">
                                                    <div class="header">
                                                        <h4 class="text-center">รายละเอียดการแจ้งชำระ</h4>
                                                    </div>
                                                    <hr>
                                                    <div class="content-detail-payment">
                                                        <div class="detail-left">
                                                            <div class="pre-img-slip">
                                                                <img id="img-slip" src="../upload/Slip/<?php echo $ice_history['img_slip'] ?>" >
                                                            </div>
                                                        </div>
                                                        <div class="detail-right">
                                                            <div class="detail-right-content">
                                                                <div class="form-detail">
                                                                    <label class="form-label">บ้านเลขที่ : <?php echo $ice_history['villager_housenum'] ?></label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">ชื่อ : <?php echo $ice_history['villager_fname'].' '.$ice_history['villager_lname'] ?></label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">ค่าส่วนกลาง : <?php echo $ice_history['invoice_cmf'] ?> บาท</label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">ค้างชำระ : <?php echo $ice_history['invoice_overdue'] ?> บาท</label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">ชำระล่วงหน้า : <?php echo (($ice_history['pay_amount'])-($ice_history['total_amount']))/100 ?> เดือน </label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">รวม : <?php echo $ice_history['pay_amount'] ?> บาท</label>
                                                                </div>
                                                                <div class="form-detail">
                                                                    <label class="form-label">วันที่แจ้งชำระ : <?php echo $ice_history['date_pay'] ?></label>
                                                                </div>
                                                                <div class="btn-detail-payment">
                                                                    <button class="btn btn-vlg-close"data-bs-dismiss="modal" >ปิด</button>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php }?>
                            </tbody>
                            </table>
                </div>
            </div>
        </div>
        
        
    </div>

    <!-- Modal payment vlg -->

<!-- Modal -->
<div class="modal fade" id="vlg_pay_step1_modal" tabindex="-1" aria-labelledby="modalStep1" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
        <!-- Content -->
        <div class="modal-header">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form id="formMonth" action="../components/vlg_payMent.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <div class="contentFormPayVlg">
                    <div class="form-group " >
                        <label class="form-label" for="selectMonth">เลือกจำนวนเดือนที่ต้องชำระ</label>
                        <select class="form-select" name="payMonth" id="payMonth" aria-label="Select month to pay" onclick="month(this.value)" required>
                            <option selected value="0">เลือก</option>
                            <option value="1">1 เดือน</option>
                            <option value="2">2 เดือน</option>
                            <option value="3">3 เดือน</option>
                            <option value="4">4 เดือน</option>
                            <option value="5">5 เดือน</option>
                            <option value="6">6 เดือน</option>
                            <option value="7">7 เดือน</option>
                            <option value="8">8 เดือน</option>
                            <option value="9">9 เดือน</option>
                            <option value="10">10 เดือน</option>
                            <option value="11">11 เดือน</option>
                            <option value="12">12 เดือน</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="selectMonth">รวมยอด(บาท)</label>
                        <input class="form-control" type="text" id="showSum" name="sumMonth" readonly>
                        <input class="form-control" type="hidden" id="total" value="<?php echo $key['total_amount'] ?>" readonly>

                    </div>
                    <div class="form-group">
                        <button class="btn btn-sendTP form-control mt-3" type="submit" onclick="genQR()" >ยืนยัน</button>
                    </div>
                </div>
            </form>
        </div>
        <!-- End Content -->

    </div>
  </div>
</div>
        
<div class="modal fade" id="vlg_pay_step2_modal" tabindex="-1" aria-labelledby="modalStep1" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
        <!-- Content -->
        <div class="modal-header">
            <button class="btn back" onclick="backSelectMonth()">&lsaquo; Go Back</button>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="container text-center">
                <h3 class="form-label text-center" for="upload">SCAN HERE TO PAY</h3>
                <img id="imgqr" src="" style="width:400px; object-fit: contain;">
                <center><h4>Sutthiphong Singkham</h4></center>
            </div>
            <div class="container">
                <!-- Form -->
            <?php foreach ($invoiceVlg as $invoice) { ?>
            <form action="../components/vlg_payMent.php" method="POST" class="form-horizontal" enctype="multipart/form-data">
                <input class="form-control" type="hidden" id="amount" name="amount" placeholder="amount" readonly>
                <input class="form-control" type="hidden"  name="invoice_id" value="<?php echo $invoice['invoice_id']; ?>"  readonly>
                <label class="form-label" for="upload">แนบหลักฐานการโอน</label>
                <input type="file" class="form-control" name="img_slip" required>
                <div class="form-group mt-2">
                    <button class="btn form-control btn-sendTP" type="submit" name="sendToPay"  >แจ้งชำระ</button>
                </div>

            </form>
            <?php }?>
            </div>
        </div>
        <!-- End Content -->

    </div>
  </div>
</div>



<!-- <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script> -->
    <script>
        function genQR() {
            $.ajax({
                method: 'post',
                url: 'http://localhost:3000/generateQR',
                data: {
                    amount: parseFloat($("#amount").val())
                },
                success: function(response) {
                    console.log('good', response)
                    $("#imgqr").attr('src', response.Result)
                }, error: function(err) {
                    console.log('bad', err)
                }
            })
        };
    // Open Modal
    $("#formMonth").submit(function(e){
        e.preventDefault();
        $("#vlg_pay_step1_modal").modal("hide");
        $("#vlg_pay_step2_modal").modal("show");
    });

    function backSelectMonth(){
        $("#vlg_pay_step1_modal").modal("show");
        $("#vlg_pay_step2_modal").modal("hide");
    };

//   calculate Month
    function month(e){
    var select = document.getElementById('payMonth');
    var total = document.getElementById('total');
    if(select.value == 0){
        document.getElementById('showSum').value = (Number(select.value)*100);
    }else {
        document.getElementById('showSum').value = (Number(select.value)*100)+ Number(total.value)-100 ;
        document.getElementById('amount').value =  (Number(select.value)*100)+ Number(total.value)-100;  
    }
    
    };
    select = document.getElementById('payMonth');
    document.getElementById('showSum').value = (Number(select.value)*100) ;  
    

//  end calculate Month

// Function tab bar
    function openPayment_v(villagerDetail, elmnt, color) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabContent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].style.backgroundColor = "";
            }
            document.getElementById(villagerDetail).style.display = "block";
            elmnt.style.backgroundColor = color;
        }
        document.getElementById("defaultOpen").click();

        // ................................................................
        // .........>> Table <<............................................
        $(document).ready(function() {
            $('#history_pay_vlg').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );
        $(document).ready(function() {
            $('#waiting_pay_vlg').DataTable( {
                responsive: true,
                "pageLength": 10
            } );
        } );

        // calculator
       
        var payMonth = document.getElementById("payMonth");
        var outputPayMonth = document.getElementById("outputPayMonth");

        input.addEventListener( "payMonth", function() {
            var value = payMonth.value;
            outputPayMonth.innerHTML=value;
        })
        
    </script>
</body>
</html>