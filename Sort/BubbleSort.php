<?php

$data = [4, 6, 1, 2, 5, 3];
$max = count($data);

// 要素数の繰り返し
for ($i = 0; $i < $max; $i++) {
    // 要素数-1回の繰り返し
    for ($n = 1; $n < $max; $n++) {
        // 隣同士を比較して順番に入れ替える
        if ($data[$n-1] > $data[$n]) {
            $temp = $data[$n];
            $data[$n] = $data[$n-1];
            $data[$n-1] = $temp;
        }
    }
}

var_dump($data);
// array(6) {
//     [0]=>
//     int(1)
//     [1]=>
//     int(2)
//     [2]=>
//     int(3)
//     [3]=>
//     int(4)
//     [4]=>
//     int(5)
//     [5]=>
//     int(6)
//   }
