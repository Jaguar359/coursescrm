<style>
    *{
        padding: 0;
        margin: 0;
    }
    nav{
        background-color: #ababab;
        padding: 17px;
        text-align: center;
    }
    nav a{
        color: black;
        margin-right: 25px;
    }
</style>
<nav>
    <a href="index.php">Сотрудники</a>
    <a href="projects.php">Проекты</a>
    <a href="tasks.php">Задачи</a>
    <a href="user_types.php">Должности</a>


    <?php if (App::isGuest()){ ?>
        <a href="login.php">Авторизация</a>
    <?php } else { ?>
        <a href="logout.php">Выход</a>
    <?php } ?>


</nav>
<br><br>