<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Details</title>
</head>
<body>
<div class="container">
    <h1>Заказ № {{ $order->id }}</h1>
    <p><strong>Имя:</strong> {{ $order->user_name }}</p>
    <p><strong>Телефон:</strong> {{ $order->phone }}</p>
    <p><strong>Адрес:</strong> {{ $order->address }}</p>
    <p><strong>Комментарий:</strong> {{ $order->comment }}</p>

    <h2>Детали заказа</h2>
    <table>
        <thead>
        <tr>
            <th>Продукт</th>
            <th>Количество</th>
            <th>Цена за единицу</th>
            <th>Итого</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderProducts as $orderProduct)
            <tr>
                <td>{{ $orderProduct->product->name }}</td>
                <td>{{ $orderProduct->quantity }}</td>
                <td>{{ $orderProduct->price }}</td>
                <td>{{ $orderProduct->price * $orderProduct->quantity }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p><strong>Общая стоимость:</strong> {{ $totalPrice }}</p>

    <a href="/main" class="back-link">Вернуться на главную страницу</a>
</div>
</body>
</html>
