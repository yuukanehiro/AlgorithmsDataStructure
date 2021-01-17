<?php

$list = range(1, 8);
shuffle($list);
print_r(bogoSort($list));
// Array
// (
//     [試行回数] => 7146
//     [data] => Array
//         (
//             [0] => 1
//             [1] => 2
//             [2] => 3
//             [3] => 4
//             [4] => 5
//             [5] => 6
//             [6] => 7
//             [7] => 8
//         )
// )


/**
 * ボゴソート
 *
 * @param array $list
 * @return array
 */
function bogoSort($list): array
{
    shuffle($list);

    $clone_list = $list;
    sort($clone_list);

    $count = 1;
    while (true) {
        shuffle($list);
        if ($clone_list == $list) {
            return $response = [
                '試行回数' => $count,
                'data' => $list
            ];
        }
        $count++;
    }
}
