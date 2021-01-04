<?php

$data = range(0, 100);
shuffle($data);
$flag = false;
main($flag, $data);

function main(bool $flag = true, array $data) {
    switch ($flag) {
        // テスト
        case 0:
            printf("テスト結果は「%s」です。", testBubbleSort());
            break;
        // 実行
        case 1:
            var_dump(bubbleSort($data));
            break;
    }
}


function bubbleSort(array $data = []): array
{
    $max = count($data);

    // 要素数の繰り返し
    for ($i = 0; $i < $max; $i++) {
        // 要素数-1回の繰り返し
        for ($j = 1; $j < $max; $j++) {
            // 隣同士を比較して順番に入れ替える
            if ($data[$j-1] > $data[$j]) {
                $temp = $data[$j];
                $data[$j] = $data[$j-1];
                $data[$j-1] = $temp;
            }
        }
    }
    return $data;
}

function testBubbleSort()
{
    for ($i = 0; $i < 100; $i++) {
        $data = range(0, 1000);
        shuffle($data);
        $data1 = $data;
        $data2 = $data;
        if (bubbleSort($data1) != sort($data2)) {
            return "不合格";
        }
    }
    return "合格";
}
