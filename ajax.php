<?php
require_once 'settings/settings.php';
require_once 'classes/classes.php';
?>
<table>
    <tr>
        <td>id</td>
        <td>Название</td>
    </tr>

    <?php
    $title = $_GET['title'];
    $db = new Bd;
    $result = $db->getAllByLike('projects', 'name_project', $title);

    foreach ($result as $res){
        echo "<tr>";
        echo "<td>{$res['id']}</td>";
        echo "<td>{$res['name_project']}</td>";
        echo "</tr>";
    }
    ?>

</table>