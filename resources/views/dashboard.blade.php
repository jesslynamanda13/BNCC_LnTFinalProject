<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@300;400;700&family=Poppins:ital,wght@0,300;0,400;0,600;0,700;1,300;1,600;1,700&family=Questrial&display=swap" rel="stylesheet">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/css/dashboard.css">
</head>
<body>

  <nav>
    <div class="navbar">
        <p id = "logo">PT Meksiko</p>
        <ul>
            <li><a id ="nonselected" href= "/addProduct">Add Product</a></li>
            <li><a id ="nonselected" href="/admincategory">Add Category</a></li>
            <li><a id ="nonselected" href = "/shop">Go to shop</a></li>
            <li><a href="/logout" class="btn btn-primary">Logout</a></li>

        </ul>
    </div>
  </nav>
   
    <div class="header">
        <p>Dashboard: Products</p>
    </div>
    <br><br>
    <div class="row">
      @foreach ($products as $product)
        <div class="card" style="width: 18rem;">
          <img src="{{asset('/storage/Products/'.$product->productimg)}}" alt="">
          <div class="card-body">
            <h5 class="card-title">{{$product->productname}}</h5>
            <p class="card-text">{{$product->categories->categoryname}}</p>
            <p class="card-text">Rp. {{$product->productprice}}</p>
            <p class="card-text">Stock: {{$product->productqty}}</p>
            <button type="button" class="btn btn-success"><a href="{{route('edit', $product->id)}}" class = "btn-btn-sucess">Edit</a></button>
            <form method="POST" action="{{ route('destroy', $product->id) }}">
              @csrf
              @method('delete')
              <button type="submit" class="btn btn-danger">Delete</button>
          </form>
          </div>
        </div>
        <br>
        @endforeach
    </div>
        
</body>
</html>