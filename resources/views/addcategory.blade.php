<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;700&family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,300;1,600;1,700&family=Questrial&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Frame 2.png">
    <title>Add Category</title>
    <link rel="stylesheet" href="/css/add.css">

</head>
<body>
    <form action="/store-Category" method = "POST" enctype = "multipart/form-data">
        @csrf
        <div class="anggota">
            <div class="item">
                <p>Category</p>
                <input type="text" id="ctg_id" placeholder = "Type in your category" name = "categoryname">
            </div>
        </div>
        
        <div class="button">
            <button class="button-17" role="button">Confirm and Save Data</button>
        </div>
    </form>
</body>
</html>

