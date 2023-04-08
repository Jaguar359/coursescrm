<?php
require_once 'classes/classes.php';
require_once 'settings/settings.php';

// если формат запроса = POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // подготавливаем переменные
    $login = htmlspecialchars($_POST["login"]);
    $pass = htmlspecialchars($_POST["pass"]);
    $type = htmlspecialchars($_POST["type"]);
    $status = 1;

    // сохраняем в базу
    $mysql->query("INSERT INTO users (id, login, password, type, status)
    VALUES (null, '{$login}', '{$pass}', '{$type}', '{$status}')");

    // редирект на index.php
    header("Location: index.php");
}
?>
<html>
<head>
    <title>CRM</title>
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
        }

        input {
            width: 100%;
            height: 40px;
            padding: 5px;
            border-radius: 10px;
            border: 1px solid #6f6f6f;
            margin-bottom: 15px;
        }

        .send-btn {
            background-color: #96c680;
            margin-top: 15px;
        }
        select{
            width: 100%;
            height: 40px;
            padding: 5px;
            border-radius: 10px;
            border: 1px solid #6f6f6f;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <a href="index.php">Вернуться</a><br><br>
    <form action="users_add.php" method="POST">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">

        <select name="type">
            <option value="backender">Backend-разработчик</option>
            <option value="frontender">Frontend-разработчик</option>
            <option value="client">Клиент</option>
        </select>

        <input type="submit" class="send-btn" value="Сохранить">
    </form>
</div>
</body>
</html>
