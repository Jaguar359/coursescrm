<?php
session_start();

// отключение отображение всех (кроме фатальных) ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// подключаемся к бд todo: удалить
$mysql = new mysqli('localhost',
    'root', 'Bacs1906', 'lab5');
$mysql->set_charset("utf8mb4");