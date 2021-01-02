<?php

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
    if ($remainder === 0) {
        return intdiv($number1, $number2);
    }
    return euclideanAlgorithm($number2, $remainder);
}

$number1 = 1024;
$number2 = 28;
$answer = euclideanAlgorithm($number1, $number2);
printf("「%d / %d」の最大公約数は%dです", $number1, $number2, $answer);
// 「1024 / 28」の最大公約数は3です
