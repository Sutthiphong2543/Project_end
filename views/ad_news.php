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
        <div class="main-news1">
            <div class="head-name1 ">
                <label>เรื่อง :</label>
                <input type="text" class="form-control input-news1">
                <hr>
            </div>
            <div class="head-name2 ">
                <label>รายละเอียด :</label>
                <div class="head-area">
                    <textarea class="area-news form-control" name="detail_news" id="detail_news" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="create-news">
                <hr>
                <button class="btn cre-new">สร้างข่าวสาร</button>
            </div>
            
        </div>
        <div class="main-news2">
            <div class="table-news">
            <table class="table">
                <thead class="head-th">
                    <tr>
                    <th scope="col">รายการ</th>
                    <th scope="col">วันที่ประกาศ</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <td>ประกาศหยุดจ่ายน้ำประปาล่วงหน้า </td>
                    <td>18 ม.ค 2565</td>
                    <td class="D-more text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                    </tr>
                    <tr>
                    <td>ประกาศหยุดจ่ายน้ำประปาล่วงหน้า </td>
                    <td>18 ม.ค 2565</td>
                    <td class="D-more text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                    </tr>
                    <tr>
                    <td>ประกาศหยุดจ่ายน้ำประปาล่วงหน้า </td>
                    <td>18 ม.ค 2565</td>
                    <td class="D-more text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                    </tr>
                    <tr>
                    <td>ประกาศหยุดจ่ายน้ำประปาล่วงหน้า </td>
                    <td>18 ม.ค 2565</td>
                    <td class="D-more text-center">รายละเอียดเพิ่มเติม<i class="bi bi-zoom-in mx-2"></i></td>
                    </tr>
                    
                    </tbody>
                </table>
            </div>

        </div>
    </div>


</body>
</html>