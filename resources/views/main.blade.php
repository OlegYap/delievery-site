<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<header>
    <div class="header-content">
        <h1>Быстро и качественно</h1>
    </div>
    <div class="header-icons">
        <div class="logo">
            <img src="https://png.pngtree.com/png-clipart/20200225/original/pngtree-ninja-logo-design-icon-vector-png-image_5290326.jpg" alt="logo">
        </div>
        <a href="{{ route('cart.show') }}" class="cart-icon">
            <img src="https://cdn-icons-png.flaticon.com/128/34/34627.png" alt="Cart Icon">
        </a>
    </div>
</header>
<main>
    <div class="card-container">
        <h2>Меню</h2>
        @foreach($products as $product)
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="card-content">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>{{ $product->price }}</p>
                    <p>{{ $product->category }}</p>
                    <form action="{{ route('addCart') }}" method="POST" class="addCart">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="button" onclick="decrementQuantity(this)">-</button>
                        <input type="number" name="quantity" class="quantity" value="1" readonly>
                        <button type="button" onclick="incrementQuantity(this)">+</button>
                        <button type="submit">Добавить в корзину</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</main>
<footer>
    <div class="row">
        <div class="col">
            <img src="https://png.pngtree.com/png-clipart/20200225/original/pngtree-ninja-logo-design-icon-vector-png-image_5290326.jpg" alt="logo-footer" class="logo-footer">
            <p>Молодая компания готовая</p>
        </div>
        <div class="col">
            <h3>Наши точки</h3>
            <p>Ул.Пушкина, г.Улан-Удэ</p>
            <p class="email-id">food@mail.ru</p>
            <h4>+79995552211</h4>
        </div>
        <div class="col">
            <h3>Ссылки</h3>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Contacts</a></li>
            </ul>
        </div>
        <div class="col">
            <div class="social-icons">
                <i class="fab fa-telegram"></i>
                <i class="fab fa-vk"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
    </div>
    <hr>
    <p class="copyright">Сделано Олегом @ 2024 - Все права зарегистрированы</p>
</footer>
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

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
        $('.addCart').submit(function(event) {
            event.preventDefault();
            var form = this;
            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: $(form).serialize(),
                success: function(response) {
                    console.log('done');
                    $(form).find('input[name="quantity"]').val(1);
                }
            });
        });
    });
</script>

<style>
    body, html {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        font-family: 'Noto Sans JP', sans-serif;
    }
    header {
        position: relative;
        height: 200px;
        overflow: hidden;
        background: linear-gradient(90deg, white 0%, gray 100%);
        animation: slideDown 1s ease-in-out forwards;
    }
    @keyframes slideDown {
        0% {
            transform: translateY(-100%);
        }
        100% {
            transform: translateY(0);
        }
    }
    .header-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
    }
    .header-content h1 {
        font-size: 3rem;
        color: #333;
        text-shadow: 2px 2px 4px #000;
    }
    @keyframes fadeInSlide {
        0% {
            opacity: 0;
            transform: translateY(-50px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .header-icons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
    }
    .logo img, .cart-icon img {
        width: 100px;
        height: auto;
    }
    main {
        padding: 2rem;
    }
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
    }
    .card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 300px;
        margin: 1rem;
        transition: transform 0.2s;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .card-content {
        padding: 1rem;
    }
    .card-content h2 {
        margin-top: 0;
        text-align: center;
        font-size: 1.5rem;
    }
    .card-content p {
        color: #555;
    }
    footer {
        width: 100%;
        position: relative;
        bottom: 0;
        background: linear-gradient(to right, gray, white);
        color: #fff;
        padding: 50px 0 30px;
        border-top-left-radius: 125px;
        font-size: 13px;
        line-height: 20px;
        animation: slideUp 1s ease-in-out forwards;
    }
    @keyframes slideUp {
        0% {
            transform: translateY(100%);
        }
        100% {
            transform: translateY(0%);
        }
    }
    .row {
        width: 85%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
    }
    .col {
        flex-basis: 25%;
        padding: 10px;
    }
    .col:nth-child(2), .col:nth-child(3) {
        flex-basis: 15%;
    }
    .logo-footer {
        width: 80px;
        margin-bottom: 30px;
    }
    .col h3 {
        width: fit-content;
        margin-bottom: 40px;
        position: relative;
    }
    .email-id {
        width: fit-content;
        border-bottom: 1px solid #ccc;
        margin: 20px 0;
    }
    ul li {
        list-style: none;
        margin-bottom: 12px;
    }
    ul li a {
        text-decoration: none;
        color: white;
    }
    .social-icons .fab {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        font-size: 20px;
        color: #000;
        background: white;
        margin-right: 15px;
        cursor: pointer;
    }
    hr {
        width: 90%;
        border: 0;
        border-bottom: 1px solid #ccc;
        margin: 20px auto;
    }
    .copyright {
        text-align: center;
    }
</style>


{{--    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Cafe</title>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<header>
    <div class="header-content">
        <h1>Быстро и качественно</h1>
    </div>
    <div class="header-icons">
        <div class="logo">
            <img src="https://png.pngtree.com/png-clipart/20200225/original/pngtree-ninja-logo-design-icon-vector-png-image_5290326.jpg" alt="logo">
        </div>
        <a href="{{ route('cart.show') }}" class="cart-icon">
            <img src="https://cdn-icons-png.flaticon.com/128/34/34627.png" alt="Cart Icon">
            <span id="cart-count" class="badge">0</span>
            <span id="cart-total" class="cart-total">0 ₽</span>
        </a>
    </div>
</header>
<main>
    <div class="card-container">
        <h2>Меню</h2>
        @foreach($products as $product)
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="card-content">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>{{ $product->price }}</p>
                    <p>{{ $product->category }}</p>
                    <form action="{{ route('addCart') }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="button" class="decrement-quantity" data-product-id="{{ $product->id }}">-</button>
                        <input type="number" name="quantity" class="quantity" id="quantity_{{ $product->id }}" value="1" readonly>
                        <button type="button" class="increment-quantity" data-product-id="{{ $product->id }}">+</button>
                        <button type="submit" class="add-to-cart" data-product-id="{{ $product->id }}" data-price="{{ $product->price }}">Добавить в корзину</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</main>
<footer>
    <div class="row">
        <div class="col">
            <img src="https://png.pngtree.com/png-clipart/20200225/original/pngtree-ninja-logo-design-icon-vector-png-image_5290326.jpg" alt="logo-footer" class="logo-footer">
            <p>Молодая компания готовая</p>
        </div>
        <div class="col">
            <h3>Наши точки</h3>
            <p>Ул.Пушкина, г.Улан-Удэ</p>
            <p class="email-id">food@mail.ru</p>
            <h4>+79995552211</h4>
        </div>
        <div class="col">
            <h3>Ссылки</h3>
            <ul>
                <li><a href="">Home</a></li>
                <li><a href="">Services</a></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Contacts</a></li>
            </ul>
        </div>
        <div class="col">
            <div class="social-icons">
                <i class="fab fa-telegram"></i>
                <i class="fab fa-vk"></i>
                <i class="fab fa-instagram"></i>
            </div>
        </div>
    </div>
    <hr>
    <p class="copyright">Сделано Олегом @ 2024 - Все права зарегистрированы</p>
</footer>
</body>

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

<script>
    $(document).ready(function() {
        const cart = JSON.parse(localStorage.getItem('cart')) || {};
        let cartCount = 0;
        let totalAmount = 0;

        function updateCartDisplay() {
            cartCount = 0;
            totalAmount = 0;
            for (const id in cart) {
                cartCount += cart[id].quantity;
                totalAmount += cart[id].quantity * cart[id].price;
            }

            $('#cart-count').text(cartCount);
            $('#cart-total').text(`Сумма: ${totalAmount} ₽`);
            localStorage.setItem('cart', JSON.stringify(cart));
        }

        updateCartDisplay();

        $('.add-to-cart-form').submit(function(event) {
            event.preventDefault();
            const form = $(this);
            const url = form.attr('action');
            const formData = form.serialize();

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                success: function(response) {
                    if (response.success) {
                        const productId = form.find('input[name="product_id"]').val();
                        const quantityInput = form.find('input[name="quantity"]');
                        const quantityValue = parseInt(quantityInput.val());
                        const price = parseFloat(form.find('.add-to-cart').data('price'));

                        if (cart[productId]) {
                            cart[productId].quantity += quantityValue;
                        } else {
                            cart[productId] = {
                                quantity: quantityValue,
                                price: price
                            };
                        }

                        quantityInput.val(1);
                        updateCartDisplay();
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        });

        $('.increment-quantity').click(function() {
            const productId = $(this).data('product-id');
            const quantityInput = $(`#quantity_${productId}`);
            quantityInput.val(parseInt(quantityInput.val()) + 1);
        });

        $('.decrement-quantity').click(function() {
            const productId = $(this).data('product-id');
            const quantityInput = $(`#quantity_${productId}`);
            const currentValue = parseInt(quantityInput.val());
            if (currentValue > 1) {
                quantityInput.val(currentValue - 1);
            }
        });
    });
</script>

<style>
    body, html {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        font-family: 'Noto Sans JP', sans-serif;
    }
    header {
        position: relative;
        height: 200px;
        overflow: hidden;
        background: linear-gradient(90deg, white 0%, gray 100%);
        animation: slideDown 1s ease-in-out forwards;
    }
    @keyframes slideDown {
        0% {
            transform: translateY(-100%);
        }
        100% {
            transform: translateY(0);
        }
    }
    .header-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        width: 100%;
    }
    .header-content h1 {
        font-size: 3rem;
        color: #333;
        text-shadow: 2px 2px 4px #000;
    }
    @keyframes fadeInSlide {
        0% {
            opacity: 0;
            transform: translateY(-50px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .header-icons {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: absolute;
        top: 10px;
        left: 10px;
        right: 10px;
    }
    .logo img, .cart-icon img {
        width: 100px;
        height: auto;
    }
    .cart-icon {
        position: relative;
        display: inline-block;
    }
    .badge {
        position: absolute;
        top: -5px;
        right: -15px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 4px 8px;
        font-size: 12px;
    }
    .cart-total {
        position: absolute;
        top: 20px;
        right: -15px;
        background-color: #333;
        color: white;
        border-radius: 5px;
        padding: 5px;
        font-size: 12px;
    }
    main {
        padding: 2rem;
    }
    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 1rem;
    }
    .card {
        background-color: white;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 300px;
        margin: 1rem;
        transition: transform 0.2s;
    }
    .card:hover {
        transform: scale(1.05);
    }
    .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .card-content {
        padding: 1rem;
    }
    .card-content h2 {
        margin-top: 0;
        text-align: center;
        font-size: 1.5rem;
    }
    .card-content p {
        color: #555;
    }
    footer {
        width: 100%;
        position: relative;
        bottom: 0;
        background: linear-gradient(to right, gray, white);
        color: #fff;
        padding: 50px 0 30px;
        border-top-left-radius: 125px;
        font-size: 13px;
        line-height: 20px;
        animation: slideUp 1s ease-in-out forwards;
    }
    @keyframes slideUp {
        0% {
            transform: translateY(100%);
        }
        100% {
            transform: translateY(0%);
        }
    }
    .row {
        width: 85%;
        margin: auto;
        display: flex;
        flex-wrap: wrap;
        align-items: flex-start;
        justify-content: space-between;
    }
    .col {
        flex-basis: 25%;
        padding: 10px;
    }
    .col:nth-child(2), .col:nth-child(3) {
        flex-basis: 15%;
    }
    .logo-footer {
        width: 80px;
        margin-bottom: 30px;
    }
    .col h3 {
        width: fit-content;
        margin-bottom: 40px;
        position: relative;
    }
    .email-id {
        width: fit-content;
        border-bottom: 1px solid #ccc;
        margin: 20px 0;
    }
    ul li {
        list-style: none;
        margin-bottom: 12px;
    }
    ul li a {
        text-decoration: none;
        color: white;
    }
    .social-icons .fab {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        text-align: center;
        line-height: 40px;
        font-size: 20px;
        color: #000;
        background: white;
        margin-right: 15px;
        cursor: pointer;
    }
    hr {
        width: 90%;
        border: 0;
        border-bottom: 1px solid #ccc;
        margin: 20px auto;
    }
    .copyright {
        text-align: center;
    }
</style>
</html>--}}

