<?php
session_start();

// подключаемся к бд todo: удалить
$mysql = new mysqli('localhost',
    'root', 'Bacs1906', 'lab5');
$mysql->set_charset("utf8mb4");