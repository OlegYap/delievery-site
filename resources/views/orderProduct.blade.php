<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<body>
<div class="container">
    <h1>Заказ № {{ $order->id }}</h1>
    <p><strong>Имя:</strong> {{ $order->name }}</p>
    <p><strong>Фамилия:</strong> {{ $order->surname }}</p>
    <p><strong>Номер телефона:</strong> {{ $order->phone }}</p>
    <p><strong>Адрес:</strong> {{ $order->address }}</p>

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
        @foreach($order->products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->pivot->quantity }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->price * $product->pivot->quantity }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <p><strong>Общая стоимость:</strong> {{ $totalPrice }}</p>

    <a href="/main" class="back-link">
        Вернуться на главную страницу
    </a>
</div>
</body>
</html>
