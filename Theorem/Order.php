<?php

// log𝑛 < 𝑛√n < 𝑛 < 𝑛log𝑛 < 𝑛𝑎 <𝑏𝑛 < 𝑛!

/**
 * O(n)
 *
 * @param int $n
 */
function oN(int $n) {
    for ($i = 0; $i < $n; $i++) {
        echo $i;
    }
}

/**
 * O(n^2)
 *
 * @param int $n
 */
function oNn(int $n) {
    for ($i = 0; $i < $n; $i++) {
        for ($i = 0; $i < $n; $i++) {
            echo $i;
        }
    }
}

/**
 * O(log 𝑛) ... 底は2を想定。二進法展開。
 *
 * @param int $n
 */
function log𝑛(int $n) {
    for ($i = 0; $i < $n;) {
        echo $i;
        $i++;
        $n = $n / 2; // log 2^n回実行される
    }
}

/**
 * O(n log n) ... nのループの中で２進法展開が行われるパターン。ヒープ・バブル・挿入ソートなど
 *
 * @param int $n
 */
function nLogn(int $n) {
    for ($i = 0; $i < $n; $i++) {
        for ($i = 0; $i < $n;) {
            echo $i;
            $i++;
            $n = $n / 2;
        }
    }
}
