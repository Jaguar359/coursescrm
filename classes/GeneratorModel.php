<?php

/**
 * Class GeneratorModel
 */
class GeneratorModel
{
    public function tasks()
    {
        $i   = 0;               // счетчик
        $max = 1000;            // максимальная позиция

        while ($i < $max) {
            $user_id     = rand(1, 6);
            $to_user_id  = rand(1, 6);
            $project     = rand(1, 6);
            $title       = "Задача №{$i}";
            $description = "Текстовое описание задачи №{$i}";
            $date_start  = rand(1682100000, 1682999999);
            $date_end    = $date_start + 3600 * 24 * 30;
            $deadline    = $date_end - 3600 * 24;
            $status      = rand(0, 1);

            $bd = new Bd;

            $bd->mysql->query("INSERT INTO tasks (id, user_id, to_user_id, project_id, title, description, date_start, date_end, deadline, status)
    VALUES (null, '{$user_id}', '{$to_user_id}', '{$project}', '{$title}', '{$description}', '{$date_start}', '{$date_end}', '{$deadline}', '{$status}')");

            $i++;
        }
    }

    public function projects()
    {
        $i   = 0;               // счетчик
        $max = 1000;            // максимальная позиция

        while ($i < $max) {
            $user_id      = rand(1, 6);
            $name_project = "Проект №{$i}";
            $link         = "localhost";
            $date_start   = rand(1682100000, 1682999999);
            $date_end     = $date_start + 3600 * 24 * 30;

            $bd = new Bd;
            $bd->mysql->query("INSERT INTO projects (id, name_project, user_id, link, date_start, date_end)
    VALUES (null, '{$name_project}', '{$user_id}', '{$link}', '{$date_start}', '{$date_end}')");

            $i++;
        }
    }
}