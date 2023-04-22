<?php

class Login
{
    public $login;
    public $password;

    public function validate()
    {
        // создаем новый экземпляр класса bd
        $bd = new Bd;
        // передаем классу bd логин, который ввел пользователь (для поиска
        // нужного пользователя)
        $bd->login = $this->login;
        // вызываем метод получения всех данных конкретного пользователя
        $user = $bd->getUserData();

        // если введенный пароль равен паролю в базе - возвращаем true
        if ($this->password == $user['password']){
            return true;
        }

        // если нет - возвращаем false
        return false;
    }

    /**
     * Авторизация
     *
     * @return string
     */
    public function auth()
    {
        if (isset($this->login) && mb_strlen($this->login) > 3 &&
            isset($this->password) && mb_strlen($this->password) > 3){
            if ($this->validate()){
                // шифрование
                $token = md5($this->login);

                // добавление сессий
                $_SESSION['login'] = $this->login;
                $_SESSION['token'] = $token;

                return 'access';
            } else {
                return 'err-validate';
            }
        } else {
            return 'err-data';
        }
    }

    public static function calc_pass($string){
        return md5($string);
    }
}