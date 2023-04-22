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
<a href="projects.php">Назад</a><br>
<?php
$id           = htmlspecialchars($_GET['id']);
$current_projects = (new Bd)->getOne('projects', $id);
?>
<div class="container">
    <table>
        <tr>
            <td>Название проекта</td>
            <td><?=$current_projects['name_project']?></td>
        </tr>
        <tr>
            <td>Пользователь</td>
            <td>
                <?php
                $bd = new Bd;
                $user = $bd->getOne('users', $current_projects['user_id']);

                echo $user['login'];
                ?>
            </td>
        </tr>
        <tr>
            <td>Ссылка</td>
            <td><?=$current_projects['link']?></td>
        </tr>
    </table>

    <br>
    <a href="projects_edit.php?id=<?=$id?>">Редактирование</a>
</div>
</body>
</html>