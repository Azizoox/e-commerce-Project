<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <center>
        <h3>{{$order->name}}</h3>
        <h3>{{$order->address}}</h3>
        <h3>{{$order->phone}}</h3>
        <h3>{{$order->product->title}}</h3>
        <h3>{{$order->product->price}}</h3>
        <img src="/images/{{$order->product->image}} " width="200px">
    </center>
</body>
</html>
