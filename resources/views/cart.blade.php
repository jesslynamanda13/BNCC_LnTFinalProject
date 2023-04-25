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
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="/css/cart.css">
</head>
<body>
<div class="container">
    <h1>Shopping Cart</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Product Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Remove</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cartItems as $item)
            <tr>
                <td><img width = "100px"src="{{asset('/storage/Products/'.$item->productimg)}}" alt=""></td>
                <td>{{ $item->product->productname }}</td>
                <td>Rp. {{ $item->productprice }}</td>
                <td> {{ $item->productqty }}</td>
                <td>Rp. {{ $item->productprice* $item->productqty}}</td>
                <td>
                <form method="POST" action="{{ route('destroycart', $item->id) }}">
                    @csrf
                    @method('delete')
                    <button style = "color:beige" type = "submit" class="btn btn-danger">Remove</button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total price: <b>Rp. {{ $floatval }}</b></p>
    <button class="btn btn-danger"><a href="/checkout">Check Out</a></button>
</div>


</body>
</html>