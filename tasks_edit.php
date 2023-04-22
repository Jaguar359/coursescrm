<?php
require_once 'classes/classes.php';
require_once 'settings/settings.php';

$id           = htmlspecialchars($_GET['id']);
$current_task = (new Bd)->getOne('tasks', $id);

// если формат запроса = POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $u_time_start = Time::toUnix($_POST['date_start']);
    $u_time_end   = Time::toUnix($_POST['date_end']);
    $u_deadline   = Time::toUnix($_POST['deadline']);

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
    // id, user_id, to_user_id, project_id, title, description, date_start, date_end, deadline, status
    $mysql->query("UPDATE tasks SET title='" . $title . "' WHERE id={$id}");

    // редирект на index.php
    //header("Location: tasks.php");
    header("Location: tasks_edit.php?id={$id}");
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
    <a href="tasks_view.php?id=<?=$current_task['id']?>">Вернуться</a><br><br>
    <form action="tasks_edit.php?id=<?=$current_task['id']?>" method="POST">
        <label>Название задачи</label>
        <input type="text" name="title" value="<?php echo $current_task['title']; ?>"><br>

        <label>Описание задачи</label>
        <textarea name="description"><?=$current_task['description']?></textarea>

        <label>По проекту</label>
        <select name="project">
            <?php
            $bd             = new Bd;
            $bd->table_name = 'projects';
            $project_list   = $bd->getAll();

            foreach ($project_list as $project) {
                if ($project['id'] == $current_task['project_id']) {
                    echo "<option value='{$project['id']}' selected>{$project['name_project']}</option>";
                } else {
                    echo "<option value='{$project['id']}'>{$project['name_project']}</option>";
                }
            }
            ?>
        </select>

        <label>Статус</label>
        <select name="status">
            <option value="1" <?php if ($current_task['status'] == 1) {
                echo ' selected ';
            } ?>>Новая
            </option>
            <option value="2" <?php if ($current_task['status'] == 2) {
                echo ' selected ';
            } ?>>В работе
            </option>
            <option value="3" <?php if ($current_task['status'] == 3) {
                echo ' selected ';
            } ?>>Выполнена
            </option>
        </select>

        <label>Дата постановки</label>
        <input type="date" name="date_start" value="<?=date('Y-m-d', $current_task['date_start'])?>">

        <label>Дата завершения</label>
        <input type="date" name="date_end" value="<?=date('Y-m-d', $current_task['date_end'])?>">

        <label>Дедлайн</label>
        <input type="date" name="deadline" value="<?=date('Y-m-d', $current_task['deadline'])?>">

        <input type="submit" class="send-btn" value="Сохранить">
    </form>
</div>
</body>
</html>
