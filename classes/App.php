<?php

class App
{
    public array  $app_data;    // данные приложения
    public object $user;        // данные пользователя
    public int    $status;      // статус (1 - включен, 0 - тех обслуживание, выключен)

    public function __construct()
    {
        $this->status = 1;

        $this->user        = new User;
        $this->user->login = '';
        $this->user->token = '';
        $this->user->type  = '';

        $this->app_data = [
            'status'      => $this->status,
            'projectName' => 'CRM',
        ];
    }

    /**
     * @return bool
     */
    public static function isGuest(): bool
    {
        return User::isGuest();
    }
}