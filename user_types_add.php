<?php
require_once 'classes/classes.php';
require_once 'settings/settings.php';

// если формат запроса = POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // подготавливаем переменные
    $title = htmlspecialchars($_POST["title"]);

    // сохраняем в базу
    $mysql->query("INSERT INTO user_types (id, title)
    VALUES (null, '{$title}')");

    // редирект на index.php
    header("Location: user_types.php");
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
            padding: 5px 15px;
            border-radius: 10px;
            border: 1px solid #6f6f6f;
            margin-bottom: 15px;
        }

        .send-btn {
            background-color: #96c680;
            margin-top: 15px;
        }

        select {
            width: 100%;
            height: 40px;
            padding: 5px;
            border-radius: 10px;
            border: 1px solid #6f6f6f;
            margin-bottom: 15px;
        }

        textarea {
            width: 100%;
            height: 100px;
            padding: 5px;
            border-radius: 10px;
            border: 1px solid #6f6f6f;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<?php require_once 'includes/nav.php'; ?>
<div class="container">
    <a href="user_types.php">Вернуться</a><br><br>
    <form action="user_types_add.php" method="POST">
        <label>Должность / тип сотрудника</label>
        <input type="text" name="title">
        <input type="submit" class="send-btn" value="Сохранить">
    </form>
</div>
</body>
</html>
