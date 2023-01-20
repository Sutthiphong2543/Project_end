<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Generate QRCode</title>
</head>
<body>
    <div class="container">
        
        <input class="form-control" type="text" id="amount" placeholder="amount">
        <button class="btn btn-success mt-2" onclick="genQR()">Generate</button>
        
        <img id="imgqr" src="" style="width: 500px; object-fit: contain;">
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
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
        }
    </script>
    
</body>
</html>