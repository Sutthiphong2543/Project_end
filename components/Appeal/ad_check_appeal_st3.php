<script src="https://code.jquery.com/jquery-3.6.3.js" ></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php 
require_once"../../config/connect.php";

if(isset($_GET["id"])){
  $id=$_GET["id"];
  $update_status3 = $repairClass->appeal_status3($id);
  if($update_status3){
    echo "<script>$(document).ready(function() {
            Swal.fire({
                title: 'Success ',
                text: ' ยืนยันการร้องเรียนเรียบร้อยแล้ว',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false,
                didClose: () => {
                  window.location.href = '../../views/ad_repair.php?title=notify';
                }
            });
        });
        </script>";
  }
}
?>