<?php

$max = 400;
$flag = false;
main($flag, $max);


function main(bool $flag = true, int $max) {
    switch ($flag) {
        // テスト
        case 0:
            testFibonacciSequence();
            break;
        // 実行
        case 1:
            var_dump(fibonacciSequence($max));
            break;
    }
}

/**
 * フィボナッチ数列生成
 * 1, 1, 2, 3, 5, 8, 13, 21 ...
 *
 * @param int $max
 * @return array $data
 */
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
    return $data;
    // return var_dump($data);
}


/**
 * テストコード
 */
function testFibonacciSequence()
{
    for ($i = 0; $i < 100; $i++) {
        $max = rand(100, 1000);
        $result = fibonacciSequence($max);
        $count = count($result);

        $diceNum = rand(1, 6);
        $n = $count - $diceNum;
        $a = $n -2;
        $b = $n -1;

        if ($result[$n] !== (int) ($result[$a] + $result[$b])) {
            var_dump($result);
            echo '異常な値';
            return;
        }
    }
    print("正常");
}


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
