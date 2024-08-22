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
        <a href="{{ route('cartView') }}" class="cart-icon">
            <img src="https://cdn-icons-png.flaticon.com/128/34/34627.png" alt="Cart Icon">
            <span id="cart-count">0</span> <!-- Здесь будет отображаться количество товаров -->
        </a>
        <a href="{{ route('orders') }}" class="order-icon">
            <img src="data:image/png;base64,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" alt="Order Icon">
        </a>
    </div>
</header>
<main>
    <div class="card-container">
        <h2>Меню</h2>
        @foreach($products as $product)
            <div class="card">
                <!-- Содержимое карточки товара -->
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="card-content">
                    <h3>{{ $product->name }}</h3>
                    <p>{{ $product->description }}</p>
                    <p>{{ $product->price }} руб.</p>
                    <p>{{ $product->category }}</p>

                    <!-- Кнопка корзины и счётчик -->
                    <div class="cart-actions">
                        <button class="cart-button">
                            <!-- Иконка корзины -->
                            <img src="data:image/svg+xml;charset=utf-8,%3Csvg width='44' height='24' fill='%23c9c9c9' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='5' y='7' width='2' height='10' rx='1'/%3E%3Crect x='-6' y='8' width='2' height='10' rx='1' transform='rotate(-90 0 7)'/%3E%3Cg transform='translate(18)' clip-path='url(%23a)'%3E%3Cpath d='M14.32 6H20a2 2 0 0 1 2 2v2a2 2 0 0 1-1.165 1.818l-.67 7.363A2 2 0 0 1 18.174 21H5.826a2 2 0 0 1-1.991-1.819l-.67-7.363A2 2 0 0 1 2 10V8a2 2 0 0 1 2-2h4.002c.683 0 1.02.557 1.02 1.003A.996.996 0 0 1 8.002 8H4v2h16V8h-6c-.235.005-.47-.07-.663-.23L8.398 3.691a.909.909 0 0 1-.064-1.344l.064-.064a1 1 0 0 1 1.344-.064L14.32 6Zm4.49 6H5.19l.636 7h12.348l.636-7ZM8 14a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0v-1a1 1 0 0 1 1-1Zm4 0a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0v-1a1 1 0 0 1 1-1Zm4 0a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0v-1a1 1 0 0 1 1-1Z'/%3E%3C/g%3E%3Cdefs%3E%3CclipPath id='a'%3E%3Cpath transform='translate(2 2)' d='M0 0h20v19H0z'/%3E%3C/clipPath%3E%3C/defs%3E%3C/svg%3E" alt="Cart Icon">
                        </button>
                        <div class="quantity-selector hidden">
                            <button class="quantity-btn minus" type="button">
                                <!-- Иконка уменьшения количества -->
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <rect width="2" height="12" x="2" y="9" fill="currentColor" rx="1" transform="rotate(-90 2 9)"></rect>
                                </svg>
                            </button>
                            <label class="quantity-label">
                                <input class="quantity-input" type="number" value="1" min="1" readonly>
                            </label>
                            <button class="quantity-btn plus" type="button">
                                <!-- Иконка увеличения количества -->
                                <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                    <rect width="2" height="12" x="7" y="2" fill="currentColor" rx="1"></rect>
                                    <rect width="2" height="12" x="2" y="9" fill="currentColor" rx="1" transform="rotate(-90 2 9)"></rect>
                                </svg>
                            </button>
                        </div>
                        <form class="updateCart hidden" method="POST" action="{{ route('updateCart') }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" class="quantity-input-hidden" value="1">
                        </form>
                    </div>
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
</footer>
</body>
</html>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cartButtons = document.querySelectorAll('.cart-button');
        const quantitySelectors = document.querySelectorAll('.quantity-selector');

        cartButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                event.preventDefault();

                const card = event.currentTarget.closest('.card');
                const quantitySelector = card.querySelector('.quantity-selector');
                const updateCartForm = card.querySelector('.updateCart');
                const quantityInputHidden = updateCartForm.querySelector('.quantity-input-hidden');
                const quantityInput = quantitySelector.querySelector('.quantity-input');

                button.classList.add('hidden');
                quantitySelector.classList.remove('hidden');

                quantityInputHidden.value = quantityInput.value;
            });
        });

        quantitySelectors.forEach(selector => {
            const minusBtn = selector.querySelector('.quantity-btn.minus');
            const plusBtn = selector.querySelector('.quantity-btn.plus');
            const quantityInput = selector.querySelector('.quantity-input');
            const updateCartForm = selector.closest('.card').querySelector('.updateCart');
            const quantityInputHidden = updateCartForm.querySelector('.quantity-input-hidden');
            const cartButton = selector.closest('.card').querySelector('.cart-button');

            minusBtn.addEventListener('click', () => {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                    quantityInputHidden.value = quantityInput.value;
                    updateCart(updateCartForm, quantityInput.value);
                }
                if (currentValue === 1) {
                    selector.classList.add('hidden');
                    cartButton.classList.remove('hidden');
                }
            });

            plusBtn.addEventListener('click', () => {
                let currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
                quantityInputHidden.value = quantityInput.value;
                updateCart(updateCartForm, quantityInput.value);
            });
        });

        function updateCart(form, quantity) {
            fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': form.querySelector('input[name="_token"]').value
                },
                body: JSON.stringify({
                    product_id: form.querySelector('input[name="product_id"]').value,
                    quantity: quantity
                })
            })
                .then(response => response.json())
                .then(data => {
                    // Обновление количества товаров в корзине
                    const cartCount = document.getElementById('cart-count');
                    if (cartCount) {
                        cartCount.textContent = data.cartCount;
                    }
                })
                .catch(error => console.error('Error:', error));
        }
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

    .cart-icon {
        position: fixed;
        display: inline-block;
        right: 40px;
    }

    #cart-count {
        position: absolute;
        top: -10px;
        right: -10px;
        background-color: red;
        color: white;
        border-radius: 50%;
        padding: 5px 10px;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        width: 25px;
        height: 25px;
        line-height: 25px;
    }

    .cart-actions {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
    }

    .cart-button {
        background-color: transparent;
        border: none;
        cursor: pointer;
    }

    .cart-button img {
        width: 44px;
        height: 24px;
    }

    .quantity-selector {
        display: flex;
        align-items: center;
        gap: 10px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 5px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .hidden {
        display: none;
    }

    .quantity-btn {
        background-color: #f44336;
        border: 1px solid #c9c9c9;
        border-radius: 8px;
        color: #fff;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        height: 36px;
        width: 36px;
        transition: background-color 0.2s ease;
    }

    .quantity-btn svg {
        width: 16px;
        height: 16px;
    }

    .quantity-btn:hover {
        background-color: #d32f2f;
    }

    .quantity-label {
        margin: 0 10px;
    }

    .quantity-input {
        text-align: center;
        border: 1px solid #ddd;
        border-radius: 4px;
        padding: 8px;
        width: 60px;
        font-size: 16px;
        transition: transform 0.2s ease;
    }

    .quantity-input.animate {
        animation: bounce 0.3s;
    }

    @keyframes bounce {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.1);
        }
    }
    .order-icon img {
        position: relative;
        width: 40px;
        height: auto;
        right: 150px;
    }
</style>
