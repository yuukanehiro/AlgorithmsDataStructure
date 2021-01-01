<?php

// 1, 1, 2, 3, 5, 8, 13, 21 ...
function fibonacciSequence(int $max, array $data = [])
{
    $i = 2;
    while (true) {
        $data[0] = 1;
        $data[1] = 1;
        $data[$i] = (int) ($data[$i -2] + $data[$i -1]);
        if ($data[$i] > $max) {
            return var_dump($data);
        }
        $i++;
    }
}


$max = 100;
fibonacciSequence($max);
