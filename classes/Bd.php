<?php

class Bd
{
    public $mysql;
    public $login;
    public $table_name;

    public function __construct()
    {
        $this->mysql = mysqli_connect('localhost', 'root', 'Bacs1906', 'lab5');
        $this->mysql->set_charset("utf8mb4");
    }

    /**
     * Получение данных юзера по id
     *
     * @return array|null
     */
    public function getUserData()
    {
        // указываем, с какой таблицей будем работать
        $this->table_name = 'users';
        // формируем запрос в базу - выбрать все
        $request = "SELECT * FROM {$this->table_name} WHERE login = '{$this->login}'";
        $result  = $this->mysql->query($request);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
        }

        return $data;
    }

    public function getAll()
    {
        $request = "SELECT * FROM {$this->table_name}";
        $result  = $this->mysql->query($request);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }

    /**
     * @param $table_name
     * @param $id
     *
     * @return array|null
     */
    public function getOne($table_name, $id)
    {
        // формируем запрос в базу - выбрать все
        $request = "SELECT * FROM {$table_name} WHERE id = '{$id}'";
        $result  = $this->mysql->query($request);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data = $row;
            }
        }

        return $data;
    }
}