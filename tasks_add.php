<?php
require_once 'classes/classes.php';
require_once 'settings/settings.php';

// если формат запроса = POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u_time_start = Time::toUnix($_POST['date_start']);
    $u_time_end = Time::toUnix($_POST['date_end']);
    $u_deadline = Time::toUnix($_POST['deadline']);

    // подготавливаем переменные
    $title       = htmlspecialchars($_POST["title"]);
    $description = htmlspecialchars($_POST["description"]);
    $project     = htmlspecialchars($_POST["project"]);
    $status      = htmlspecialchars($_POST["status"]);
    $date_start  = $u_time_start;
    $date_end    = $u_time_end;
    $deadline    = $u_deadline;
    $user_id     = 1;
    $to_user_id  = 1;

    // сохраняем в базу
    $mysql->query("INSERT INTO tasks (id, user_id, to_user_id, project_id, title, description, date_start, date_end, deadline, status)
    VALUES (null, '{$user_id}', '{$to_user_id}', '{$project}', '{$title}', '{$description}', '{$date_start}', '{$date_end}', '{$deadline}', '{$status}')");

    // редирект на index.php
    header("Location: tasks.php");
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
    <form action="tasks_add.php" method="POST">
        <label>Название задачи</label>
        <input type="text" name="title"><br>

        <label>Описание задачи</label>
        <textarea name="description"></textarea>

        <label>По проекту</label>
        <select name="project">
            <?php
            $bd             = new Bd;
            $bd->table_name = 'projects';
            $project_list   = $bd->getAll();

            foreach ($project_list as $project) {
                echo "<option value='{$project['id']}'>{$project['name_project']}</option>";
            }
            ?>
        </select>

        <label>Статус</label>
        <select name="status">
            <option value="1">Новая</option>
            <option value="2">В работе</option>
            <option value="3">Выполнена</option>
        </select>

        <label>Дата постановки</label>
        <input type="date" name="date_start">

        <label>Дата завершения</label>
        <input type="date" name="date_end">

        <label>Дедлайн</label>
        <input type="date" name="deadline">

        <input type="submit" class="send-btn" value="Сохранить">
    </form>
</div>
</body>
</html>
