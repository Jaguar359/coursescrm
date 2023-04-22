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

<h3>Сотрудники</h3>

<?php
//$bd = new Bd;
//$bd->login = 'admin';
//
//echo '<pre>';
//print_r($bd->getUserData());
?>
<?php
echo '<pre>';
var_dump($_SESSION);
?>
<a href="users_add.php">Добавить</a><br>
<table>
    <tr>
        <td>id</td>
        <td>Логин</td>
        <td>Роль</td>
    </tr>
    <?php
    // формируем и отправляем запрос: выбрать все данные из таблицы users
    $result = $mysql->query("SELECT * FROM users");

    // если кол-во записей > 0 - выводим их
    if ($result->num_rows > 0) {
        // output data of each row

        // пока в переменной $row есть данные
        while ($row = $result->fetch_assoc()) {
            // выводим что-то на экран
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['login']}</td>";

            if ($row['type'] == 'backender'){
                echo "<td>Бэкнэд разработчик</td>";
            }

            if ($row['type'] == 'client'){
                echo "<td>Клиент</td>";
            }

            echo "</tr>";
        }
    } else { // или
        // пишем, что пусто
        echo "Нет данных в базе";
    }
    $mysql->close();
    ?>
</table>
</body>
</html>
