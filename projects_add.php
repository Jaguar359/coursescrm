<?php
require_once 'classes/classes.php';
require_once 'settings/settings.php';

// если формат запроса = POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // подготавливаем переменные
    $name_project = htmlspecialchars($_POST["name_project"]);
    $link         = htmlspecialchars($_POST["link"]);
    $user_id      = 1;
    $date_start = time();
    $date_end = time() + 3600 * 24 * 30;

    // сохраняем в базу
    $mysql->query("INSERT INTO projects (id, name_project, user_id, link, date_start, date_end)
    VALUES (null, '{$name_project}', '{$user_id}', '{$link}', '{$date_start}', '{$date_end}')");

    // редирект на index.php
    header("Location: projects.php");
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
    <a href="index.php">Вернуться</a><br><br>
    <form action="projects_add.php" method="POST">
        <label>Название проекта</label>
        <input type="text" name="name_project">

        <label>Ссылка</label>
        <input type="text" name="link">

        <input type="submit" class="send-btn" value="Сохранить">
    </form>
</div>
</body>
</html>
