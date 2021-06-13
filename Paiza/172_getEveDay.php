<?php
    // 自分の得意な言語で
    // Let's チャレンジ！！
    $input_line = fgets(STDIN);
    echo getEveDay($input_line);

    function getEveDay(int $day): ?int
    {
        if ($day < 2 || $day >= 32) {
            return null;
        }
        $eve_day = $day - 1;
        return $eve_day;
    }
