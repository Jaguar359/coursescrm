<?php
require_once 'settings/settings.php';
require_once 'classes/classes.php';

// TODO: продемонстрировать (UNION SELECT * FROM users)

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    //$token = $_POST['token'];
    //$mysql->query("UPDATE users SET token='" . $token . "' WHERE id=1");

    $id = $_POST['userid'];
    $request = "SELECT * FROM users WHERE id = {$id} ";
    $result  = $mysql->query($request);

} else {
    $request = "SELECT * FROM users WHERE id = 1";
    $result  = $mysql->query($request);
}

//$request = $_POST['request'];
//$request = "SHOW DATABASES";
//$request = "SHOW TABLES";
//$request = "SHOW TABLES FROM users";
// UNION SELECT * FROM users



echo '<pre>';

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        var_dump($row);
    }
}

?>

<form action="test.php" method="POST">
    <select name="userid">
        <option value="1">User 1</option>
        <option value="2">User 2</option>
    </select>
    <input type="submit" value="Показать">
</form>