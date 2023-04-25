<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;700&family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,300;1,600;1,700&family=Questrial&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="Frame 2.png">
    <title>Login</title>
    <link rel="stylesheet" href="/css/add.css">
</head>
<body>
    
    <nav>
        <div class="navbar">
            <p id = "logo">PT Meksiko</p>
            <ul>
                <li><a id ="nonselected" href="/register">Register</a></li>
                <li><p id ="select">Login</p></li>
            </ul>
        </div>
    </nav>

    <div class="header">
        <p>Masuk disini</p>
    </div>

    <form action="/loginData" method = "POST">
        @csrf
        <div class="anggota">
            <div class="item">
                <p>Email</p>
                <input type="email" id="email"  name="Email" value = "{{ Session::get('Email') }}">
            </div>
            <div class="item">
                <p>Password</p>
                <input type="password" id="password" placeholder = "" name="password">
            </div>
          
        </div>
        
        <div class="button">
            <button class="button-17" role="button" type="submit" onclick="">Masuk</button>
        </div>
    </form>
    
    
    <br>
    <br>
    <br>

    

    



    
</body>
</html>
