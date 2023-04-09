<?php

class Bd
{
    public $mysql;
    public $login;
    public $table_name;

    public function __construct()
    {
        $this->mysql = mysqli_connect('localhost', 'root', 'Bacs1906', 'lab5');
    }

    public function getUserData()
    {
        // указываем, с какой таблицей будем работать
        $this->table_name = 'users';
        // формируем запрос в базу - выбрать все
        $request          = "SELECT * FROM {$this->table_name}";
        $result           = $this->mysql->query($request);
        $data = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }
}