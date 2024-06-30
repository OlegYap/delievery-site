<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Cafe</title>
</head>
<body>
<header>
    <h1>Добро пожаловать!</h1>
</header>
<main>
    <div class="card-container">
{{--               <form action="{{ route('addProduct') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="name" placeholder="Название продукта">
            <textarea name="description" placeholder="Описание продукта"></textarea>
            <input type="number" name="price" placeholder="Цена продукта">
            <input type="text" name="category" placeholder="Категория продукта">
            <input type="file" name="image" accept="image/*">
            <button type="submit">Добавить продукт</button>
        </form>--}}
        <h2>Меню</h2>
        @foreach($products as $product)
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="card-content">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>{{ $product->price }}</p>
                    <p>{{ $product->category }}</p>
                    <form action="{{ route('addCart') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <button type="button" onclick="decrementQuantity(this)">-</button>
                        <input type="number" name="quantity" id="quantity_{{ $product->id }}" value="1" readonly>
                        <button type="button" onclick="incrementQuantity(this)">+</button>
                        <button type="submit">Добавить в корзину</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ route('cart.show') }}" class="cart-icon">
        <img src="https://cdn-icons-png.flaticon.com/128/34/34627.png" alt="Cart Icon">
    </a>
</main>
<footer>

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
    $("document").ready(function() {
        $('.addCart').submit(function() {
            $.ajax({
                type: "POST",
                url: "/main",
                data: $(this).serialize(),
                success: function() {
                    console.log('done');
                    $('input.quantity').val('');
                }
            })
        });
    });
</script>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
        display: flex;
        flex-direction: column;
        min-height: 100vh;
    }

    header {
        background-color: #ff6347;
        color: white;
        text-align: center;
        padding: 1rem 0;
        position: relative;
        background-image: url('https://kidpassage.com/images/publications/chto-v-ispanii-tsenyi-na-edu-k-kafe-i/cover_original.jpg');
        background-size: cover; /* Это заставит изображение заполнять всё пространство, масштабируя его при необходимости */
        background-position: center; /* Центрирует изображение */
        background-repeat: no-repeat; /* Предотвращает повторение изображения */
        height: 65vh; /* Высота заголовка будет равна высоте видимой части экрана */
        width: 100%;
    }

    .cart-icon {
        position: absolute;
        top: 1%;
        right: 100px;
        width: 30px;
        height: 30px;
    }

    main {
        flex: 1;
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
        font-size: 1.5rem;
    }

    .card-content p {
        color: #555;
    }

    footer {
        text-align: center;
        padding: 1rem 0;
        background-color: gray;
        color: white;
        margin-top: 2rem;
    }
</style>
