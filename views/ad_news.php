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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../css/news.css ?<?php echo time(); ?>">

    <title>News</title>
</head>
<body>
    <div class="main-container ">
        <div class="main-news1">
            <div class="head-name1 mx-2">
                <label>เรื่อง :</label>
                <input type="text" class="form-control input-news1 mt-2">
            </div>
            <div class="head-name2 mx-2 mt-3">
                <label>รายละเอียด :</label>
            </div>
            <div class="head-area mt-2">
                <textarea class="area-news mx-2 form-control" name="detail_news" id="detail_news" cols="30" rows="10"></textarea>
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

    <!-- include template -->
    <?php include_once '../components/sidebar.php' ?>
</body>
</html>