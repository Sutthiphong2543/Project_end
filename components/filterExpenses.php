<?php 
require_once"../config/connect.php";

    if(isset($_POST['year'])){
        $year = $_POST['year'];

        $expenses = $fucIncome->getExpenses($year); 
    
?>
<table id="table-expenses" class="table table-striped " style="width:100%;">
    <thead>
        <tr class="text-center">
            <th scope="col" >#</th>
            <th scope="col">เดือน</th>
            <th scope="col">จำนวน (บาท)</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody class="text-center">
        <?php foreach($expenses as $index => $viewExpenses){ 
            $date = new DateTime($viewExpenses['expenses_date']); 
            $month = $date->format('m');
            ?>
        <tr>
            <td scope="row" ><label class="label"><?php echo $index+1 ?></label></td>
            <td class="text-center"><label class="label"><?php echo $controller->checkMonth($month)  ?></label></td>
            <td class="text-end" style="width:20%"><label class="label"><?php echo number_format($viewExpenses['expenses_total']) ?></label></i></td>
            <!-- <td class="text-center" style="width:30%"> <a type="button" class="btn btn-detail" data-bs-toggle="modal" data-bs-target="openExpensesModal<?php echo $viewExpenses['expenses_id'] ?>" ><i class="bi bi-zoom-in mx-2"></i> ดูรายละเอียดข้อมูล</a> </td> -->
            <td class="text-center" style="width:30%"> <a type="button" class="btn btn-detail" data-bs-toggle="modal" data-bs-target="#ExpensesModal<?php echo $viewExpenses['expenses_id'] ?>">
                <i class="bi bi-zoom-in mx-2"></i> ดูรายละเอียดข้อมูล
            </a> </td>
        </tr>

        <!-- Modal Expenses-->
        <div class="modal fade" id="ExpensesModal<?php echo $viewExpenses['expenses_id'] ?>"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg"  >
            <div class="modal-content " style="background: #ffffff">
                <div class="modal-header">
                    <label data-bs-dismiss="modal" class="btn-close" aria-label="Close"></label>
                </div>
                <div class="grid-form-createExpenses">
                    <div class="select-month text-center ">
                        <h3>รายละเอียดบันทึกรายจ่ายเดือน <?php echo $controller->checkMonth($month)  ?></h3>
                    </div>
                    <div class="form-createExpenses mt-1">
                        <div class="expensesLeft pd-l">
                                <div class="mb-3"><h5>รายการ</h5></div>
                                <div class="mb-3"><label class="form-label mt-2" >ค่าเก็บขยะ</label></div>
                                <div class="mb-3"><label class="form-label mt-2" >ค่าไฟ</label></div>
                                <div class="mb-3"><label class="form-label mt-2" >ค่าคนดูแลค่าส่วนกลาง</label></div>
                                <div class="mb-3"><label class="form-label mt-2" >ค่าคนดูแลโรงขยะ</label></div>
                                <div class="mb-3"><label class="form-label mt-2" >ค่าจ้างช่าง</label></div>
                                <div class="mb-3"><label class="form-label mt-2" >อื่นๆ</label></div>
                                <div class="mb-3"><h5>รวม</h5></div>
                        </div>
                        <div class="expensesRight pd-r">
                            <div class="mb-3 pl-2 text-end"><h5>จำนวน (บาท)</h5></div>
                            <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['waste_collection_fee'])  ?></label></div>
                            <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['electric_fee'])  ?></label></div>
                            <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['central_caretaker_fee'])  ?></label></div>
                            <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['garbage_maintenance_fee'])  ?></label></div>
                            <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['mechanic_wages'])  ?></label></div>
                            <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['another'])  ?></label></div>
                            <div class="mb-3 pl-2 text-end"><label class="form-label mt-2"><?php echo number_format($viewExpenses['expenses_total']).' '.'บาท'  ?></label></div>
                            

                        </div>
                    
                    </div>
                    <div class="footer-form text-center">
                        <hr>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <?php } ?>
    </tbody>
    </table>
<?php } ?>