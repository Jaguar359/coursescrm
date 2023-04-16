<?php
require_once 'settings/settings.php';
require_once 'classes/classes.php';
?>
<html>
<head>
    <title>CRM</title>
    <style>
        table{
            width: 100%;
        }
        td{
            border: 1px solid #747474;
            padding: 5px;
        }
    </style>
</head>
<body>
<?php require_once 'includes/nav.php'; ?>

<h3>Задачи</h3>

<?php
//$bd = new Bd;
//$bd->login = 'admin';
//
//echo '<pre>';
//print_r($bd->getUserData());
?>

<a href="tasks_add.php">Добавить</a><br>
<table>
    <tr>
        <td>id</td>
        <td>Название</td>
        <td>Создана</td>
        <td>Дедлайн</td>
    </tr>
    <?php
    $tasks = new Bd;
    $tasks->table_name = 'tasks';
    $tasks_all = $tasks->getAll();

//    echo '<pre>';
//    var_dump($tasks_all);

    foreach ($tasks_all as $params){
        $params['deadline'] = (int)$params['deadline'];
        $params['date_start'] = (int)$params['date_start'];
        $deadline = Time::toHuman($params['deadline']);
        $date_start = Time::toHuman($params['date_start']);

        echo "<tr>";
        echo "<td>{$params['id']}</td>";
        echo "<td><a href='tasks_view.php?id={$params['id']}'>{$params['title']}</a></td>";
        echo "<td>{$date_start}</td>";
        echo "<td>{$deadline}</td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
