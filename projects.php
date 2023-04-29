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

        .p-link {
            float: left;
            width: 40px;
            border: 1px solid black;
            padding: 5px 3px;
            text-align: center;
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
        $projects = new Bd;
        $bd       = new Bd;

        $count_rows = (int)$bd->getCount('projects');
        $max_posts  = 25;
        $pages      = $count_rows / $max_posts;
        $pages      = round($pages);

        if (isset($_GET['page'])) {
            $current_page = $_GET['page'];
            $offset       = $max_posts * $current_page;
            $offset -= $max_posts;

            // формируем запрос в базу - выбрать все
            $request = "SELECT * FROM projects LIMIT {$max_posts} OFFSET {$offset} ";
            $result  = (new Bd())->mysql->query($request);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $projects_all[] = $row;
                }
            }
        } else {
            $projects->table_name = 'projects';
            $projects_all         = $projects->getAll();
        }

        foreach ($projects_all as $params) {
            echo "<tr>";
            echo "<td>{$params['id']}</td>";
            echo "<td><a href='projects_view.php?id={$params['id']}'>{$params['name_project']}</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>


<?php
$i = 1;

while ($i < $pages) {
    echo "<div class='p-link'><a href='projects.php?page={$i}'>{$i}</a></div>";
    $i++;
}
?>

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
