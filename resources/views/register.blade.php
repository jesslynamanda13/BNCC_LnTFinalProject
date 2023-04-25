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
    <title>Register</title>
    <link rel="stylesheet" href="/css/add.css">
</head>
<body>
    
    <nav>
        <div class="navbar">
            <p id = "logo">PT Meksiko</p>
            <ul>
                <li><p id ="select" >Register</p></li>
                <li><a id ="nonselected" href="/login">Login</a></li>
            </ul>
        </div>
    </nav>

    <div class="header">
        <p>Buat akun</p>
    </div>

    <form action="/create" method = "POST">
        @csrf
        <div class="anggota">
            <div class="item">
                <p>Full Name</p>
                <input type="text" id="name" placeholder = "John Doe" name="name" value = "{{old('name')}}" required>
                @error('name')
                    <div class = "alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="item">
                <p>Phone Number</p>
                <input type="text" id="phonenum" placeholder = "08123456789" name="phonenum" pattern="08\d{8,10}" value = "{{old('phonenum')}}" required>
                @error('phonenum')
                    <div class = "alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="item">
                <p>Email</p>
                <input type="email" id="email" placeholder = "johndoe@gmail.com" name="Email" value = "{{old('Email')}}" required>
                @error('Email')
                    <div class = "alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="item">
                <p>Password</p>
                <input type="password" id="password" placeholder = "" name="password" required>
                @error('password')
                    <div class = "alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
          
        </div>
        
        <div class="button">
            <button class="button-17" role="button" type="submit" onclick="readData()">Confirm and Save Data</button>
        </div>
    </form>
    
    
    <br>
    <br>
    <br>

    

    



    
</body>
</html>
