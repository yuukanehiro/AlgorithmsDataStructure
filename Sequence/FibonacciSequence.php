<?php

// 1, 1, 2, 3, 5, 8, 13, 21 ...
function fibonacciSequence(int $max, array $data = [])
{
    $i = 2;
    while (true) {
        $data[0] = 1;
        $data[1] = 1;
        $temp = (int) ($data[$i -2] + $data[$i -1]);
        // $maxを超えていたら処理終了
        if ($temp > $max) {
            break;
        }
        $data[$i] = $temp;
        $i++;
    }
    return var_dump($data);
}

$max = 400;
fibonacciSequence($max);

// array(14) {
//     [0]=>
//     int(1)
//     [1]=>
//     int(1)
//     [2]=>
//     int(2)
//     [3]=>
//     int(3)
//     [4]=>
//     int(5)
//     [5]=>
//     int(8)
//     [6]=>
//     int(13)
//     [7]=>
//     int(21)
//     [8]=>
//     int(34)
//     [9]=>
//     int(55)
//     [10]=>
//     int(89)
//     [11]=>
//     int(144)
//     [12]=>
//     int(233)
//     [13]=>
//     int(377)
//   }
