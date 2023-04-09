<?php
require_once 'settings/settings.php';
require_once 'classes/classes.php';

if ($_SERVER['REQUEST_METHOD'] == "POST"){
    $login = new Login;
    $login->login = htmlspecialchars($_POST['login']);
    $login->password = htmlspecialchars($_POST['password']);

    echo '<pre>';
    var_dump($login->auth());
    var_dump($_SESSION);
    echo '</pre>';
}
?>
<html>
<head>
    <title>Авторизация</title>
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
        }

        input {
            width: 100%;
            height: 40px;
            border: 1px solid #6c6c6c;
            border-radius: 10px;
            padding: 10px;
            margin-bottom: 25px;
        }

        .send-btn{
            background-color: #bddba0;
        }
    </style>
</head>
<body>
<div class="container">
    <form action="login.php" method="POST">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit" class="send-btn" value="Войти">
    </form>
</div>
</body>
</html>
