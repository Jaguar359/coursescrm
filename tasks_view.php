<?php
require_once 'settings/settings.php';
require_once 'classes/classes.php';
?>
<html>
<head>
    <title>CRM</title>
    <style>
        table {
            width: 100%;
        }

        td {
            border: 1px solid #747474;
            padding: 5px;
        }

        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #cdcdcd;
            padding: 15px;
            border-radius: 15px;
        }
    </style>
</head>
<body>
<?php require_once 'includes/nav.php'; ?>
<h3>Задачи</h3>
<a href="tasks.php">Назад</a><br>
<?php
$id           = htmlspecialchars($_GET['id']);
$current_task = (new Bd)->getOne('tasks', $id);
?>
<div class="container">
    <table>
        <tr>
            <td>Номер задачи</td>
            <td><?=$current_task['id']?></td>
        </tr>
        <tr>
            <td>Автор</td>
            <td><?=$current_task['user_id']?></td>
        </tr>
        <tr>
            <td>Для сотрудника</td>
            <td><?=$current_task['to_user_id']?></td>
        </tr>
        <tr>
            <td>По проекту</td>
            <td><?=$current_task['project_id']?></td>
        </tr>
        <tr>
            <td>Название задачи</td>
            <td><?=$current_task['title']?></td>
        </tr>
        <tr>
            <td>Описание задачи</td>
            <td><?=$current_task['description']?></td>
        </tr>
        <tr>
            <td>Дата постановки</td>
            <td><?=$current_task['date_start']?></td>
        </tr>
        <tr>
            <td>Дата завершения</td>
            <td><?=$current_task['date_end']?></td>
        </tr>
        <tr>
            <td>Дедлайн</td>
            <td><?=$current_task['deadline']?></td>
        </tr>
        <tr>
            <td>Статус</td>
            <td><?=$current_task['status']?></td>
        </tr>
    </table>
</div>
</body>
</html>
