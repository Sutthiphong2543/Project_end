<?php 
require_once"../../config/connect.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $id = $_POST['id'];

    $dataNews = $newsClass->dataNewsUpdate($id);
?>  
<!-- loop foreach -->
    <?php foreach($dataNews as $data){ ?>
                <div class="mb-3">
                    <label for="" class="form-label">เรื่อง :</label>
                    <input type="text" name="news_topic" id="topic" class="form-control" value="<?php echo $data['announce_topic'] ?>" maxlength="100" required>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    
                </div>
                <div class="mb-3">
                    <label  class="form-label">รายละเอียด :</label>
                    <textarea class="form-control" name="news_detail" id="detail" rows="3" aria-describedby="area-detail" maxlength="1000" required><?php echo $data['announce_news_detail'] ?></textarea>
                    
                </div>
    <?php } ?>

<?php } ?>