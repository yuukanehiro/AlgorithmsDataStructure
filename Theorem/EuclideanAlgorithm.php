<?php

$flag = false;
$number1 = 465;
$number2 = 360;
main($flag, $number1, $number2);

function main(bool $flag = true, int $number1, int $number2) {
    switch ($flag) {
        // テスト
        case 0:
            testEuclideanAlgorithm();
            break;
        // 実行
        case 1:
            $answer = euclideanAlgorithm($number1, $number2);
            printf("「%d / %d」の最大公約数は%dです", $number1, $number2, $answer);
            break;
    }
}

/**
 * ユークリッドの互除法
 */
function euclideanAlgorithm(int $number1, int $number2)
{
    if ($number1 < $number2) {
        echo '入力値異常エラー。ユークリッドの互除法の前提条件は $number1 >= $number2 です。';
        return null;
    }

    $remainder = $number1 % $number2;
    echo "{$number1} % {$number2} 余り「{$remainder}」\n";
    if ($remainder === 0) {
        return $number2;
    }
    return euclideanAlgorithm($number2, $remainder);
}


/**
 * テストコード
 */
function testEuclideanAlgorithm()
{
    $items = [
        [3355, 2379],
        [1617, 273],
    ];
    foreach ($items as $item) {
        euclideanAlgorithm($item[0], $item[1]);
        $answer = euclideanAlgorithm($item[0], $item[1]);
        printf("「%d / %d」の最大公約数は%dです\n\n", $item[0], $item[1], $answer);
    }

    // 3355 % 2379 余り「976」
    // 2379 % 976 余り「427」
    // 976 % 427 余り「122」
    // 427 % 122 余り「61」
    // 122 % 61 余り「0」
    // 3355 % 2379 余り「976」
    // 2379 % 976 余り「427」
    // 976 % 427 余り「122」
    // 427 % 122 余り「61」
    // 122 % 61 余り「0」
    // 「3355 / 2379」の最大公約数は61です

    // 1617 % 273 余り「252」
    // 273 % 252 余り「21」
    // 252 % 21 余り「0」
    // 1617 % 273 余り「252」
    // 273 % 252 余り「21」
    // 252 % 21 余り「0」
    // 「1617 / 273」の最大公約数は21です
}


