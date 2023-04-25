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
    <title>Checkout</title>
    <link rel="stylesheet" href="/css/checkout.css">
</head>
<body>
    <h1>Check out</h1>
    
    <form action="/createInvoice" method = "POST" enctype = "multipart/form-data">
        @csrf
        <div class="anggota">
            <div class="item">
                <p>Address</p>
                <input type="text" id="address" placeholder = "Kebaya Street" name = "address" value = "{{old('address')}}">
                @error('address')
                    <div class = "alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="item">
                <p>Kode pos</p>
                <input type="text" id="kodepos" placeholder = "10450" name="kodepos" value = "{{old('kodepos')}}">
                @error('kodepos')
                    <div class = "alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="item">
        <div class="button">
            <button class="button-17" role="button">Confirm and Save Data</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td>{{ $item->product->productname }}</td>
                <td>Rp. {{ $item->productprice }}</td>
                <td> {{ $item->productqty }}</td>
                <td>Rp. {{ $item->productprice* $item->productqty}}</td>
                <td>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>

   
</body>
</html>