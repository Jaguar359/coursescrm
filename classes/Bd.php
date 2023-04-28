<?php

/**
 * Класс для работы с БД
 */
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

    /**
     * Получить все
     *
     * @return array
     */
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
     * Получить одну
     *
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

    /**
     * @param $table_name
     * @param $where
     *
     * @return array
     */
    public function specialQuery($table_name, $where)
    {
        $result_where = '';

        foreach ($where as $where_key => $where_value){
            $result_where .= "{$where_key} = {$where_value} AND ";
        }

        $result_where = mb_substr($result_where, 0, -5);

        $request = "SELECT * FROM {$table_name} WHERE {$result_where}";

        $result  = $this->mysql->query($request);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }

        return $data;
    }
}