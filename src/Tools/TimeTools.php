<?php


namespace Drizzle\phpTools\Tools;


class TimeTools
{

    /**
     * 获取当前毫秒数
     *
     * @return int
     */
    public static function getMillisecond(): int
    {
        list($t1, $t2) = explode(" ", microtime());
        list($s1, $s2) = explode('.', $t1);
        $m = $t2 . substr($s2, 0, 3);
        return (int)$m;
    }
}