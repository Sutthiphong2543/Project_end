<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
require_once '../config/connect.php';

$Villager_id= $_GET['villager_id'];
$Invoice= $_GET['invoiceID'];
$getInvoice = $controller->getReplaceOverdue($Villager_id);
foreach($getInvoice as $dataInvoice){
    $updateSuccess = $controller->replaceOverdue($dataInvoice['invoice_id']);
}
$updateSuccess = $controller->replaceOverdue($Invoice);
if($updateSuccess){
    $_SESSION['success'] = " Data has been inserted successfully.";
                    echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'success',
                                text: 'ยืนยันการชำระเสร็จสิ้น',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        });
                    </script>";
                    header('refresh:1;/project_end/views/ad_payment.php?title=payment');
                }else {
                    $_SESSION['error'] = " Data has been inserted fails.";
                    echo "<script>
                        $(document).ready(function() {
                            Swal.fire({
                                title: 'Failed to insert',
                                text: ' Data has been inserted Notsuccessfully',
                                icon: 'error',
                                timer: 2500,
                                showConfirmButton: false
                            });
                        });
                    </script>";
            header("location:../views/ad_payment.php?title=payment");
}


?>