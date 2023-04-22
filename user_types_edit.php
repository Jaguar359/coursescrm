<?php
require_once 'classes/classes.php';
require_once 'settings/settings.php';

$id           = htmlspecialchars($_GET['id']);
$current_type = (new Bd)->getOne('user_types', $id);

// если формат запроса = POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST["title"]);

    // сохраняем в базу
    $mysql->query("UPDATE user_types SET title='" . $title . "' WHERE id={$id}");

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
    <form action="user_types_edit.php?id=<?=$current_type['id']?>" method="POST">
        <label>Должность / тип сотрудника</label>
        <input type="text" name="title" value="<?=$current_type['title']?>">

        <input type="submit" class="send-btn" value="Сохранить">
    </form>
</div>
</body>
</html>
