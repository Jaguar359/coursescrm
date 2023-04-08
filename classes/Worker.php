<?php

/**
 * Класс Worker, наследуем от модели User
 */
class Worker extends User
{
    public $access;
    public $home_dir;

    /**
     * Сканирование домашний директории
     *
     * @return array|false
     */
    public function scan()
    {
        // scandir - сканирование указанной директории
        // '.' - точка означает текущую директорию

        return scandir('.');
    }
}