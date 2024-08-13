<body>
<div class="cart-container">
    <button id="cart-button" class="cart-button">
        <img src="data:image/svg+xml;charset=utf-8,%3Csvg width='44' height='24' fill='%23c9c9c9' xmlns='http://www.w3.org/2000/svg'%3E%3Crect x='5' y='7' width='2' height='10' rx='1'/%3E%3Crect x='-6' y='8' width='2' height='10' rx='1' transform='rotate(-90 0 7)'/%3E%3Cg transform='translate(18)' clip-path='url(%23a)'%3E%3Cpath d='M14.32 6H20a2 2 0 0 1 2 2v2a2 2 0 0 1-1.165 1.818l-.67 7.363A2 2 0 0 1 18.174 21H5.826a2 2 0 0 1-1.991-1.819l-.67-7.363A2 2 0 0 1 2 10V8a2 2 0 0 1 2-2h4.002c.683 0 1.02.557 1.02 1.003A.996.996 0 0 1 8.002 8H4v2h16V8h-6c-.235.005-.47-.07-.663-.23L8.398 3.691a.909.909 0 0 1-.064-1.344l.064-.064a1 1 0 0 1 1.344-.064L14.32 6Zm4.49 6H5.19l.636 7h12.348l.636-7ZM8 14a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0v-1a1 1 0 0 1 1-1Zm4 0a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0v-1a1 1 0 0 1 1-1Zm4 0a1 1 0 0 1 1 1v1a1 1 0 1 1-2 0v-1a1 1 0 0 1 1-1Z'/%3E%3C/g%3E%3Cdefs%3E%3CclipPath id='a'%3E%3Cpath transform='translate(2 2)' d='M0 0h20v19H0z'/%3E%3C/clipPath%3E%3C/defs%3E%3C/svg%3E" alt="Cart Icon">
    </button>
    <div id="quantity-selector" class="quantity-selector hidden">
        <button class="quantity-btn minus" type="button">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <rect width="2" height="12" x="2" y="9" fill="currentColor" rx="1" transform="rotate(-90 2 9)"></rect>
            </svg>
        </button>
        <label class="quantity-label">
            <input class="quantity-input" type="number" value="1" min="1" readonly>
        </label>
        <button class="quantity-btn plus" type="button">
            <svg width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                <rect width="2" height="12" x="7" y="2" fill="currentColor" rx="1"></rect>
                <rect width="2" height="12" x="2" y="9" fill="currentColor" rx="1" transform="rotate(-90 2 9)"></rect>
            </svg>
        </button>
    </div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cartButton = document.getElementById('cart-button');
        const quantitySelector = document.getElementById('quantity-selector');
        const minusBtn = document.querySelector('.quantity-btn.minus');
        const plusBtn = document.querySelector('.quantity-btn.plus');
        const quantityInput = document.querySelector('.quantity-input');

        function showQuantitySelector() {
            cartButton.classList.add('hidden');
            quantitySelector.classList.remove('hidden');
        }

        function showCartButton() {
            quantitySelector.classList.add('hidden');
            cartButton.classList.remove('hidden');
        }

        cartButton.addEventListener('click', showQuantitySelector);

        minusBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
                quantityInput.classList.add('animate');
                setTimeout(() => {
                    quantityInput.classList.remove('animate');
                }, 300);
            }
            if (currentValue === 1) {
                showCartButton();
            }
        });

        plusBtn.addEventListener('click', () => {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
            quantityInput.classList.add('animate');
            setTimeout(() => {
                quantityInput.classList.remove('animate');
            }, 300);
        });
    });
</script>

<style>
    .cart-container {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
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
        position: absolute;
        top: 50px;
        background-color: #fff;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 10px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: opacity 0.3s ease, transform 0.3s ease;
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
</style>
