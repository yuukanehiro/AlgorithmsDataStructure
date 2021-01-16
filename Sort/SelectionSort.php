<?php

$list = range(0, 15);
shuffle($list);

main($list, true);

function main(array $list, bool $is_test = false) {
    switch ($is_test) {
        // テスト
        case true:
            printf("テスト結果は「%b」です。", testSelectionSort($list));
            break;
        // 実行
        case false:
            var_dump(selectionSort($list));
            break;
    }
}

/**
 * 選択ソート
 *
 * @param array $list
 * @return array
 */
function selectionSort(array $list): array
{
    $max = count($list);
    for ($index = 0; $index < $max; $index++) {
        $min_key = $index; // 基準となる最小値の位置
        // 最小値の$keyの位置を求める
        for ($key = $index; $key < $max; $key++) {
            if ($list[$key] < $list[$min_key]) {
                $min_key = $key;
            }
        }
        // 入れ替える
        $temp = $list[$index];
        $list[$index] = $list[$min_key];
        $list[$min_key] = $temp;
    }
    return $list;
}

/**
 * テストコード
 *
 * @param array $list
 * @return bool
 */
function testSelectionSort(array $list)
{
    $clone_list = $list;
    sort($clone_list);
    return $clone_list === selectionSort($list);
}
