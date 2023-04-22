<?php

class User
{
    public $login;      // логин
    public $password;   // пароль
    public $status;     // статус - вкл/выкл
    public $type;       // тип пользователя - клиент/разработчик и тд
    public $token;      // токен пользователя для авторизации

    /**
     * Проверка, является ли пользователь гостем
     *
     * @return bool
     */
    public static function isGuest(): bool
    {
        session_start();

        if (isset($_SESSION['login'])) {
            return false;
        }

        return true;
    }
}