<?php
require_once 'settings/settings.php';
require_once 'classes/classes.php';

$generator = new GeneratorModel;

echo '<pre>';
var_dump($generator->projects());