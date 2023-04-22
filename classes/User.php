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

    /**
     * Сгенерировать токен
     *
     * @param $string
     *
     * @return string
     */
    public static function generateToken($string)
    {
        return md5($string);
    }

    public static function getUserToken($user_login)
    {
        $user = new Bd();
        $user->login = $user_login;
        $user = $user->getUserData();

        return $user["token"];
    }

    public static function setUserToken($user_login)
    {
        // генерируем токен
        $token = self::generateToken($user_login);

        // ищем user_id
        $user = new Bd;
        $user->login = $user_login;
        $user->getUserData();
        $user_id = $user['id'];

        // обновляем токен в базе
        $bd = new Bd;
        $bd->mysql->query("UPDATE users SET token='" . $token . "' WHERE id={$user_id}");

        return true;
    }
}