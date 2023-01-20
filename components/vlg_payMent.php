<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require_once "../components/session.php";
require_once "../config/connect.php";
require_once "../components/check_villager.php";




if (isset($_POST['sendToPay'])) {
    $invoice_id = $_POST["invoice_id"];
    $status_pay = '2';
    $amount = $_POST["amount"];

    date_default_timezone_set("Asia/Bangkok");
    $currentDateTime = date("Y-m-d H:i:s");
    $date_pay = $currentDateTime;

    $img = $_FILES['img_slip'];

    $allow = array('jpg', 'jpeg', 'png');
    $extension = explode(".", $img['name']);
    $fileActExt = strtolower(end($extension));
    $fileNew = rand() . "." . $fileActExt;
    $filePath = "../upload/Slip/" . $fileNew;

if(in_array($fileActExt, $allow)){
        if($img['size'] > 0 && $img['error'] ==0){
            if(move_uploaded_file($img['tmp_name'],$filePath)){
                $vlgPayment=$controller->vlgPayment($status_pay,$fileNew, $amount, $date_pay, $invoice_id );

                if($vlgPayment){
                    $_SESSION['success'] = " Data has been inserted successfully.";
                    echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'Payment Success ',
                                text: ' แจ้งชำระเรียบร้อยแล้ว',
                                icon: 'success',
                                timer: 2500,
                                showConfirmButton: false
                            });
                        });
                    </script>";
                    // header('Location:/project_end/views/ad_villager.php?title=ข้อมูลลูกบ้าน');
                    header('refresh:2;/project_end/views/v_payment.php?title=payment');
                }else {
                    $_SESSION['error'] = " Data has been inserted fails.";
                    echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'Failed to Payment',
                                text: ' แจ้งชำระไม่สำเร็จ',
                                icon: 'error',
                                timer: 5000,
                                showConfirmButton: false
                            });
                        });
                    </script>";
                    header('refresh:1;/project_end/views/v_dashboard.php?title=dashboard');
                }
            }else{
                // header('refresh:1;/project_end/views/ad_villager.php?title=villagers');
            }
        }else{
            // header('refresh:1;/project_end/views/ad_villager.php?title=villagers');
        }
    }else{
        // header('refresh:1;/project_end/views/ad_villager.php?title=villagers');
    }
}





?>