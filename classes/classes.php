<?php
$dir   = 'classes';
$files = scandir($dir);

foreach ($files as $file) {
    if ($file != '.' and $file != '..' and $file != 'classes.php') {
        require_once "{$dir}/{$file}";
    }
}