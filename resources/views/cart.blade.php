<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>
</head>
<body>
<header>
    <h1>Your Cart</h1>
</header>
<main>
    <table class="table cart">
        <thead class="cart-header">
        <tr>
            <th>Название</th>
            <th>Кол-во</th>
            <th colspan="2" class="has-text-right pl-0">Всего</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cartProducts as $cartProduct)
            <tr class="cart-row">
                <td class="cart-product-media cart-product-row">
                    <a class="nowrap m-0" href="#">
                        <div class="media">
                            <figure class="media-left my-0 ml-0 mr-3">
                                <p class="image is-64x64">
                                    <img src="{{ asset('storage/' . $cartProduct->product->image) }}" alt="{{ $cartProduct->product->name }}">
                                </p>
                            </figure>
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        <strong class="title is-6">{{ $cartProduct->product->name }}</strong><br>
                                        <span class="nowrap tag block is-info is-light">{{ $cartProduct->product->price }} руб.</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </td>
                <td class="cart-product-row cart-qnt">
                    <form action="{{ route('editQuantity') }}" method="POST" class="quantity-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $cartProduct->product_id }}">
                        <div class="quantity-input">
                            <button type="button" class="quantity-btn minus" onclick="decrementQuantity(this)">-</button>
                            <input type="number" name="quantity" value="{{ $cartProduct->quantity }}" min="1" class="quantity">
                            <button type="button" class="quantity-btn plus" onclick="incrementQuantity(this)">+</button>
                        </div>
                        <button type="submit" class="cart-product-button button">
                            <span class="btn">
                                Обновить
                            </span>
                        </button>
                    </form>
                <td class="cart-product-subtotal has-text-right nowrap">
                    <div class="is-relative"><span>{{ $cartProduct->product->price * $cartProduct->quantity }} руб.</span></div>
                </td>
            </tr>
        @endforeach
        </tbody>
        <tfoot>
        <tr class="cart-price-row is-size-5 has-text-weight-bold">
            <td colspan="2">ИТОГО:</td>
            <td class="nowrap cart-price-cell has-text-right pl-0">{{ $totalPrice }} руб.</td>
        </tr>
        </tfoot>
    </table>
    <div>
        <p>
            <span class="btn btn-secondary">Очистить корзину</span>
            <a href="{{ route('orderView') }}" class="btn btn-primary">Оформить заказ</a>
        </p>
    </div>
    <a href="/main">Продолжить покупки</a>
</main>
</body>
</html>

<script>
    function incrementQuantity(button) {
        var form = button.closest('form');
        var quantityInput = form.querySelector('input[name="quantity"]');
        quantityInput.value = parseInt(quantityInput.value) + 1;
    }

    function decrementQuantity(button) {
        var form = button.closest('form');
        var quantityInput = form.querySelector('input[name="quantity"]');
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > 1) {
            quantityInput.value = currentValue - 1;
        }
    }
</script>

<style>
    .table.cart {
        width: 100%;
        border-collapse: collapse;
    }
    .table.cart th, .table.cart td {
        border: 1px solid #ddd;
        padding: 8px;
    }
    .table.cart th {
        background-color: #f2f2f2;
    }
    .table.cart .cart-product-media img {
        width: 64px;
        height: 64px;
    }
    .table.cart .cart-product-subtotal {
        text-align: right;
    }
    .table.cart .cart-price-row {
        font-weight: bold;
    }
    .table.cart .cart-price-cell {
        text-align: right;
    }
    .btn {
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
    }
    .btn-secondary {
        background-color: #f44336;
        color: white;
    }
    .btn-primary {
        background-color: #4CAF50;
        color: white;
    }
</style>
