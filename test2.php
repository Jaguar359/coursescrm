<?php
require_once 'settings/settings.php';
require_once 'classes/classes.php';

function say(){}
function sayHello(){}
function sayGoodbye(){}
function sayGoodbyeForGuest(){}
function sayHelloForGuest(){}
function sayGoodbyeForUser(){}
function sayHelloForUser(){}

class Say
{
    public string $user_name = 'Гость';

    public function hello(): string
    {
        return "Привет, {$this->user_name}";
    }

    public function goodbye(): string
    {
        return "Привет, {$this->user_name}";
    }

    public static function alert(): string
    {
        return "Вы уверены?";
    }
}