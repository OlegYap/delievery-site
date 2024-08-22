<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
</head>
<body>
<div class="container">
    <h1>Заказ № {{ $order->id }}</h1>
    <p><strong>Имя:</strong> {{ $order->name }}</p>
    <p><strong>Фамилия:</strong> {{ $order->surname }}</p>
    <p><strong>Телефон:</strong> {{ $order->phone }}</p>
    <p><strong>Адрес:</strong> {{ $order->address }}</p>
    <h2>Детали заказа</h2>
    <table>
        <thead>
        <tr>
            <th>Изображение</th>
            <th>Продукт</th>
            <th>Количество</th>
            <th>Цена</th>
            <th>Итого</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderProducts as $orderProduct)
            <tr>
                <td>
                    <img src="{{ asset('storage/' . $orderProduct->product->image) }}" alt="{{ $orderProduct->product->name }}" width="100">
                </td>
                <td>{{ $orderProduct->product->name }}</td>
                <td>{{ $orderProduct->quantity }}</td>
                <td>{{ number_format($orderProduct->price, 2, ',', ' ') }} ₽</td>
                <td>{{ number_format($orderProduct->price * $orderProduct->quantity, 2, ',', ' ') }} ₽</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p><strong>Общая стоимость:</strong> {{ number_format($totalPrice, 2, ',', ' ') }} ₽</p>

    <a href="/main" class="back-link">Вернуться на главную страницу</a>
    <a href="{{ route('orders') }}" class="back-order">Просмотреть заказы</a>
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
        max-width: 900px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        font-size: 28px;
        margin-bottom: 20px;
    }

    h2 {
        font-size: 22px;
        margin-top: 20px;
        margin-bottom: 10px;
        border-bottom: 2px solid #007bff;
        padding-bottom: 5px;
    }

    p {
        font-size: 16px;
        margin: 5px 0;
    }

    strong {
        font-weight: bold;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th, td {
        padding: 10px;
        border: 1px solid #ddd;
        text-align: left;
    }

    th {
        background-color: #007bff;
        color: #fff;
    }

    td img {
        border-radius: 4px;
    }

    .back-link {
        display: inline-block;
        margin-top: 20px;
        text-decoration: none;
        color: #28a745;
        font-size: 16px;
        transition: color 0.3s;
    }

    .back-link:hover {
        color: #218838;
    }
    .back-order {
        color: blue;
    }
</style>
