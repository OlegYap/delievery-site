<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
</head>
<body>
<div class="container">
    <h1>Введите свои данные</h1>
    <form action="{{ route('orderCreate') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Имя:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Фамилия:</label>
            <input type="text" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="phone">Номер телефона:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="address">Адрес:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <button type="submit" class="submit-btn">Подтвердить заказ</button>
    </form>
    <a href="/main" class="back-link">
        Вернуться на главную страницу
    </a>
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
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
        text-align: center;
        color: #ffc72c;
        font-size: 36px;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 15px;
    }
    .form-group label {
        display: block;
        margin-bottom: 5px;
        color: #333;
    }
    .form-group input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
    .form-group input:focus {
        border-color: #ffc72c;
        outline: none;
    }
    .submit-btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: #ffc72c;
        border: none;
        border-radius: 4px;
        color: #333;
        font-size: 16px;
        cursor: pointer;
    }
    .submit-btn:hover {
        background-color: #ffdb58;
    }
    .back-link {
        display: block;
        text-align: center;
        margin-top: 20px;
        color: #333;
        text-decoration: none;
    }
    .back-link:hover {
        text-decoration: underline;
    }
</style>
