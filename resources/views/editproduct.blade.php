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
    <title>Edit Product</title>
    <link rel="stylesheet" href="/css/add.css">
</head>
<body>

    <div class="header">
        <p>Edit Product</p>
    </div>

    <form action="{{route('update', $product->id)}}" method = "POST" enctype = "multipart/form-data">
        @csrf
        @method('patch')
        <div class="anggota">
            <div class="item">
                <p>Name</p>
                <input type="text" id="name" name = "productname" value = "{{old('productname', $product->productname)}}">
                @error('productname')
                    <div class = "alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="item">
                <p>Price</p>
                <input type="integer" id="price" name="productprice" value = "{{old('productprice', $product->productprice)}}">
                @error('productprice')
                    <div class = "alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="item">
                <p>Quantity</p>
                <input type="integer" name = "productqty" id="qty" value = "{{old('productqty', $product->productqty)}}">
                {{-- <textarea name="Address" id="address" cols="10" rows="5" minlength=10 placeholder="Type in your address" maxlength=40 required></textarea> --}}
                @error('productqty')
                    <div class = "alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="item">
                <p>Image</p>
                <input type="file" id="image" class = "form-control form-control-sm" name = "productimg" value = "{{old('productimg', $product->productimg)}}">
                @error('productimg')
                    <div class = "alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="item">
                <p>Category</p>
                <select class="form-select" aria-label="Default select example" name = "ctg_id">
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->categoryname}}</option>
                    @endforeach
                  </select>
            </div>
          
        </div>

        <div class="button">
            <button class="button-17" role="button">Confirm and Save Data</button>
        </div>
    </form>
    
    
    <br>
    <br>
    <br>

    

    



    
</body>
</html>