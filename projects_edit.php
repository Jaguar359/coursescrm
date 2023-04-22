<?php
require_once 'classes/classes.php';
require_once 'settings/settings.php';

$id           = htmlspecialchars($_GET['id']);
$current_task = (new Bd)->getOne('projects', $id);

// если формат запроса = POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name_project = htmlspecialchars($_POST["name_project"]);
    $link         = htmlspecialchars($_POST["link"]);
    $user_id      = 1;

    // сохраняем в базу
    $mysql->query("UPDATE projects SET name_project='" . $name_project . "' WHERE id={$id}");

    // редирект на index.php
    header("Location: projects_view.php?id={$id}");
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
    <a href="tasks.php">Вернуться</a><br><br>
    <form action="projects_edit.php?id=<?=$current_task['id']?>" method="POST">
        <label>Название проекта</label>
        <input type="text" name="name_project" value="<?=$current_task['name_project']?>">

        <label>Ссылка</label>
        <input type="text" name="link" value="<?=$current_task['link']?>">

        <input type="submit" class="send-btn" value="Сохранить">
    </form>
</div>
</body>
</html>
