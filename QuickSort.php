<?php

function QuickSort(&$data, $left=0, $right) {
    if ($left >= $right) {
        return;
    }
    $pivot = $data[$left];

    for ($lower = $left, $upper = $right; $lower < $upper;) {

        while ($lower <= $upper && $data[$lower] <= $pivot) {
            $lower++;
        }

        while ($lower <= $upper && $data[$upper] > $pivot) {
            $upper--;
        }
        if ($lower < $upper) {
            $temp = $data[$lower];
            $data[$lower] = $data[$upper];
            $data[$upper] = $temp;
        }
    }
    // $pivotと比べて小さい、大きいものを交換する
    $temp = $data[$left];
    $data[$left] = $data[$upper];
    $data[$upper] = $temp;
    QuickSort($data, $left, $upper -1);
    QuickSort($data, $upper + 1, $right);
}

$max = 100;
$sort = range(1, $max);
shuffle($sort);

QuickSort($sort, 0, $max-1);
var_dump($sort);