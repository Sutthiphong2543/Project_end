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

    <link rel="stylesheet" href="../css/news.css ?<?php echo time(); ?>">

    <title>News</title>
</head>
<body>
<?php require_once'../components/ad_template.php'?>
<!-- .......................... -->
    <div class="main-container ">
        <div class="main-news">
            <div class="header">
                <button type="button" class="btn btn-create " data-bs-toggle="modal" data-bs-target="#createNewsModal"><i class="bi bi-plus-lg mx-2"></i>สร้างประกาศข่าวสาร</button>
            </div>
            <hr>
            <div class="body-table-news">
                <div class="table-responsive-lg">
                    <table class="table">
                        <col style="width: 10%;"/>
                        <col style="width: 30%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 20%;"/>
                        <col style="width: 20%;"/>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">เรื่อง</th>
                                <th scope="col">วันที่ประกาศ</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $dataNews = $newsClass->getDataNews() ;
                            foreach($dataNews as $index => $data){
                        ?>
                            <tr class="">
                                <td scope="row"><?php echo $index+1 ?></td>
                                <td><?php echo $data['announce_topic'] ?></td>
                                <td><?php echo $data['announce_news_date'] ?></td>
                                <td class="text-center">

                                    <button class="btn btn-warning edit-btn" data-id="<?php echo $data["announce_news_id"] ?>">แก้ไขข้อมูล</button>
                                    <button class="btn btn-danger delete-btn" data-id="<?php echo $data["announce_news_id"] ?>">ลบข้อมูล</button>

                                    </td>
                                <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#newsModal<?php echo $data['announce_news_id'] ?>"><i class="bi bi-search px-2"></i>ดูรายละเอียด</button></td>
                            </tr>


                        <!-- start modal -->

                                <!-- Modal repair-->
                                <div class="modal fade" id="newsModal<?php echo $data['announce_news_id'] ?>" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <!-- formRepair -->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">รายละเอียดการร้องเรียน</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="" class="form-label">เรื่อง :</label>
                                                            <p class="form-control" ><?php echo $data['announce_topic'] ?></p>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label  class="form-label">รายละเอียด :</label>
                                                            <p class="form-control"><?php echo $data['announce_news_detail'] ?> </p>
                                                        </div>
                                                </div>
                                                <div class="modal-footer footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        <!-- end modal -->
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Modal Body -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="createNewsModal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable  modal-lg" role="document">
                    <div class="modal-content">
                        <form id="createNews" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">ประกาศข่าวสาร</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                                <div class="mb-3">
                                    <label for="" class="form-label">เรื่อง :</label>
                                    <input type="text" name="news_topic" id="topic" class="form-control" onkeyup="countTextTopic()" aria-describedby="area-topic" maxlength="100" required>
                                    <small id="area-topic" class="text-muted">0/100</small>
                                </div>
                                <div class="mb-3">
                                    <label  class="form-label">รายละเอียด :</label>
                                    <textarea class="form-control" name="news_detail" id="detail" rows="3" onkeyup="countTextDetail()" aria-describedby="area-detail" maxlength="1000" required></textarea>
                                    <small id="area-detail" class="text-muted">0/1000</small>
                                </div>
                            
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-primary">ประกาศข่าว</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal Edit News -->
            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
            <div class="modal fade" id="edit-modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable  modal-lg" role="document">
                    <div class="modal-content">
                        <form id="updateNews" >
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">ประกาศข่าวสาร</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div id="edit-news-content">
                                <!-- get data in ajax -->
                            </div>
                        </div>
                        <div class="modal-footer text-center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-primary">อัพเดตข่าว</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            
        </div>
    </div>


    
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
<script>
//form create News
$(document).ready(function() {
// create news
  $('#createNews').submit(function(event) {
    event.preventDefault();

    let data_news = $(this).serialize();

    $.ajax({
      url: '../components/News/ad_createNews.php',
      type: 'POST',
      data: data_news,
      success: function(response) {
        console.log(response);
        // console.log(response);
        $("#createNewsModal").modal('hide');

        $(document).ready(function() {
            Swal.fire({
                title: 'Create News Success ',
                text: ' ประกาศข่าวสารเรียบร้อย',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
            setTimeout(function() {
                location.reload();
            }, 2000);
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  });

// update news ..............................................................
  $('#updateNews').submit(function(event) {
    event.preventDefault();

    let update_news = $(this).serialize();

    $.ajax({
      url: '../components/News/ad_updateNews.php',
      type: 'POST',
      data: update_news,
      success: function(response) {
        console.log(response);
        // console.log(response);
        $("#edit-modal").modal('hide');

        $(document).ready(function() {
            Swal.fire({
                title: 'Update News Success ',
                text: ' อัพเดตประกาศข่าวสารเรียบร้อย',
                icon: 'success',
                timer: 2000,
                showConfirmButton: false
            });
            setTimeout(function() {
                location.reload();
            }, 2000);
        });
      },
      error: function(jqXHR, textStatus, errorThrown) {
        console.log(textStatus, errorThrown);
      }
    });
  });
});

//............................................................................
// modal edit news
$(document).ready(function() {
    $('.edit-btn').click(function() {
      // Get the ID of the row
      let id = $(this).data('id');
      console.log(id);

    //   Use AJAX to fetch the data of the row from the server
      $.ajax({
        url: '../components/News/ad_edit_news.php',
        type: 'POST',
        data: { id: id },
        success: function(data) {
          // Display the data in a modal form
          $('#edit-news-content').html(data);
          $('#edit-modal').modal('show');
        console.log(data);
        }
      });
    });
  });

// count characters
function countTextTopic(){//ฟังก์ชั่นนับจำนวนตัวอักษรรวมช่องว่าง
  var text=document.getElementById('topic').value;
  var countTxt=text.length;
    document.getElementById('area-topic').innerHTML=countTxt+'/'+'100';
 }
function countTextDetail(){//ฟังก์ชั่นนับจำนวนตัวอักษรรวมช่องว่าง
  var text=document.getElementById('detail').value;
  var countTxt=text.length;
    document.getElementById('area-detail').innerHTML=countTxt+'/'+'1000';
 }



// function countTextJs1(){//ฟังก์ชั่นนับจำนวนตัวอักษรรวมช่องว่าง
//   var txtForJs1=document.getElementById('txtForJs1').value;
//   var countTxt=txtForJs1.length;
//     document.getElementById('rs_txtForJs1').innerHTML=countTxt
//  }
//  function countTextJs2(){//ฟังก์ชั่นนับจำนวนตัวอักษรไม่รวมช่องว่าง
//   var txtForJs2=document.getElementById('txtForJs2').value;
//   var countTxtNull=0;
//   var countTxt=0;
//   try{
//    countTxtNull=txtForJs2.match(/\s/g).length;//นับจำนวนช่องว่าง
//   }catch(e){}
//   countTxt=txtForJs2.length-countTxtNull;//จำนวนตัวอักษรทั้งหมด-จำนวนช่องว่าง=จำนวนตัวอักษรไม่รวมช่องว่าง
//     document.getElementById('rs_txtForJs2').innerHTML=countTxt
//  }


        // function Delete
        // alert delete
        $('.delete-btn').click(function(e){
            let newsId = $(this).data('id');
            e.preventDefault();
            deleteConfirm(newsId);

        })

        function deleteConfirm(newsId) {
            Swal.fire({
                title: 'Are you sure you want to delete news?',
                text:'คุณต้องการลบจริงหรือไม่',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                cancelButtonText: 'ยกเลิก',
                confirmButtonText: 'ใช่ ฉันต้องการลบ',
                showLoaderOnConfirm: true,
                preConfirm: function() {
                    return new Promise(function(resolve){
                        $.ajax({
                            url:'../components/News/ad_delete_news.php',
                            type:'POST',
                            data:{id :newsId}
                        })
                        .done(function() {
                            Swal.fire({
                                title: 'Delete News Success',
                                text: 'ลบข่าวสารเรียบร้อยแล้ว',
                                icon:'success'
                            }).then(() =>{
                                window.location.reload();
                            })
                        })
                        .fail(function() {
                            Swal.fire('Oops..', ' Something went wrong with ajax!','error');
                            window.location.reload();
                        })
                })
                }

            })
        }

</script>

</body>
</html>