<?php

$list = range(0, 100);
shuffle($list);
// 実行
main($list, false);


function main(array $list, bool $is_test = false) {
    switch ($is_test) {
        // テスト
        case true:
            printf("テスト結果は「%b」です。", testInsertionSort($list));
            break;
        // 実行
        case false:
            var_dump(insertionSort($list));
            break;
    }
}

/**
 * 挿入ソート
 *
 * ex.
 * [3, 1, 4, 9, 2, 7]
 * [3,  1, 4, 9, 2, 7] // 配列の$list[0]の「3」はソート済とする
 * [1, 3,  4, 9, 2, 7] // $list[1]の1は3より小さいので$list[0]に,$list[0]の3は$list[1]に移動 // 1個ずらして保存の動き
 * [1, 3, 4,  9, 2, 7] // $list[2]の4は$list[1]の3より大きいのでそのままになる。
 * [1, 3, 4, 9,  2, 7] // $list[3]の9は$list[2]の4より大きいのでそのまま
 * [1, 2, 3, 4, 9,  7] // $list[4]の2は$list[3]の4より小さく、$list[2]の3より小さく、$list[1]の1より大きいので$list[1]に入れる。3, 4, 9は後方に[+1]移動する // 1個ずらして保存の動き
 * [1, 2, 3, 4, 7, 9]  // $list[5]の9は$list[4]の9より小さく、$list[3]より大きいので$list[4]に入り、$list[4]にあった9は[+1]された$list[6]に移動する // 1個ずらして保存の動き
 *
 * @param array $list
 * @return array
 */
function insertionSort(array $list): array
{
    $max = count($list);
    for ($count = 1; $count < $max; $count++) {
        $tmp = $list[$count];
        for ($index = $count; $index >= 1 && $tmp < $list[$index -1]; $index--) {
            // 1個ずらして保存
            $list[$index] = $list[$index -1];
        }
        // $index--されて$indexは-1されているところに、$tmpを挿入
        $index_minus_one = $index;
        $list[$index_minus_one] = $tmp;
    }
    return $list;
}


/**
 * テストコード
 *
 * @param array $list
 * @return bool
 */
function testInsertionSort(array $list)
{
    $test_count = 1000; // テスト回数

    $clone_list = $list;
    sort($clone_list);
    for ($i = 0; $i < $test_count; $i++) {
        if ($clone_list !== insertionSort($list)) {
            return false;
        }
    }
    return true;
}

