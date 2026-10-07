<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
</head>
<body>
    <form action="{{ route('order.post') }}" method="POST">
        <div style="text-align: center">
            @csrf
            <input type="hidden" value="2" name="user_id">
            <label for="product_name">Product Name: </label>
            <input type="text" name="product_name"><br>
            <label for="total_amount">Total Amount: </label>
            <input type="number" name="total_amount"><br>
            <button type="submit">Submit</button>
        </div>
    </form>
</body>
</html>
