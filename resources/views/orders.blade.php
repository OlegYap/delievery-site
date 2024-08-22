<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Orders</title>
</head>
<body>
<div class="container">
    <h1>Ваши заказы</h1>
    <ul>
        @foreach($orders as $order)
            <li>
                <a href="{{ route('viewOrderProduct', ['id' => $order->id]) }}">Заказ № {{ $order->id }}</a>
            </li>
        @endforeach
    </ul>
    <a href="/main" class="back-link">Вернуться на главную страницу</a>
</div>
</body>
</html>

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    h1 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    li {
        margin: 10px 0;
    }

    a {
        text-decoration: none;
        color: #007bff;
        font-size: 18px;
        transition: color 0.3s;
    }

    a:hover {
        color: #0056b3;
    }

    .back-link {
        display: inline-block;
        margin-top: 20px;
        text-decoration: none;
        color: #28a745;
        font-size: 16px;
    }

    .back-link:hover {
        color: #218838;
    }
</style>
