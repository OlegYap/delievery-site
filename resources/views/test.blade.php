<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Button with Counter and Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="button-container">
    <button id="icon-button" class="icon-button">
        <img src="icon.png" alt="Icon">
    </button>
    <div id="counter-container" class="counter-container">
        <button id="decrement-button" class="counter-button">-</button>
        <span id="counter-value" class="counter-value">0</span>
        <button id="increment-button" class="counter-button">+</button>
        <button id="add-to-cart-button" class="add-to-cart-button">Добавить в корзину</button>
    </div>
</div>
<script src="script.js"></script>
</body>
</html>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const iconButton = document.getElementById('icon-button');
        const counterContainer = document.getElementById('counter-container');
        const decrementButton = document.getElementById('decrement-button');
        const incrementButton = document.getElementById('increment-button');
        const counterValue = document.getElementById('counter-value');
        const addToCartButton = document.getElementById('add-to-cart-button');

        let count = 0;

        iconButton.addEventListener('click', function() {
            counterContainer.style.display = counterContainer.style.display === 'none' ? 'block' : 'none';
        });

        decrementButton.addEventListener('click', function() {
            if (count > 0) {
                count--;
                counterValue.textContent = count;
            }
        });

        incrementButton.addEventListener('click', function() {
            count++;
            counterValue.textContent = count;
        });

        addToCartButton.addEventListener('click', function() {
            if (count > 0) {
                alert(`Добавлено в корзину: ${count} шт.`);
                // Здесь можно добавить логику для добавления товара в корзину
            } else {
                alert('Количество должно быть больше 0.');
            }
        });
    });
</script>

<style>
    .button-container {
        position: relative;
        display: inline-block;
    }

    .icon-button {
        width: 50px;
        height: 50px;
        border: none;
        background-color: transparent;
        cursor: pointer;
    }

    .icon-button img {
        width: 100%;
        height: 100%;
    }

    .counter-container {
        display: none;
        position: absolute;
        top: 50px;
        left: 0;
        background-color: white;
        border: 1px solid #ccc;
        padding: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .counter-button {
        width: 30px;
        height: 30px;
        border: 1px solid #ccc;
        background-color: white;
        cursor: pointer;
    }

    .counter-value {
        display: inline-block;
        width: 40px;
        text-align: center;
        font-size: 16px;
    }

    .add-to-cart-button {
        margin-left: 10px;
        padding: 5px 10px;
        border: 1px solid #ccc;
        background-color: #f0f0f0;
        cursor: pointer;
    }

    .add-to-cart-button:hover {
        background-color: #e0e0e0;
    }
</style>
