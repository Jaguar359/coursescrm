<?php

class Time
{
    /**
     * @param $time
     *
     * @return false|string
     */
    public static function toHuman($time)
    {
        $time += 3600 * 4;

        return date('d.m.Y', $time);
    }

    /**
     * @param $time
     *
     * @return false|int
     */
    public static function toUnix($time)
    {
        return strtotime($time);
    }
}