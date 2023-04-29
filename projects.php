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

<a href="projects_add.php">Добавить</a><br>

<input type="text" class="filter f-title">

<div class="result">
<table>
    <tr>
        <td>id</td>
        <td>Название</td>
    </tr>
    <?php
    $tasks = new Bd;
    $tasks->table_name = 'projects';
    $tasks_all = $tasks->getAll();

    foreach ($tasks_all as $params){
        echo "<tr>";
        echo "<td>{$params['id']}</td>";
        echo "<td><a href='projects_view.php?id={$params['id']}'>{$params['name_project']}</a></td>";
        echo "</tr>";
    }
    ?>
</table>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).on("keyup", ".f-title", function () {
        var title = $(this).val();

        $.get("ajax.php", {title}, function (res) {
            $('.result').html(res);
        });
    });
</script>

</body>
</html>
