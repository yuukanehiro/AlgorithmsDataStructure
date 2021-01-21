<?php

$list = [5, 20 , 8, 45, 100, 0, 6, 11];

// 実行
main($list, false);
// array(1) {
//     [4]=>
//     int(100)
//   }


function main(array $list, bool $is_test = false) {
    switch ($is_test) {
        // テスト
        case true:
            printf("テスト結果は「%b」です。", testMaxKeyValueSearch($list));
            break;
        // 実行
        case false:
            var_dump(maxKeyValueSearch($list));
            break;
    }
}


/**
 * 配列の最大値を検索してキーと値を返却
 *
 * @param array $list
 * @return array
 */
function maxKeyValueSearch(array $list): array
{
    $max_key = 0;
    $max_value = isset($list[0]) ? $list[0] : null;
    $response = [
        $max_key => $max_value
    ];
    if (is_null($max_value)) {
        return $response;
    }

    foreach ($list as $key => $value) {
        if ($value > $max_value) {
            $max_value = $value;
            $max_key = $key;
        }
    }
    return $response = [
        $max_key => $max_value
    ];
}

/**
 * テストコード
 *
 * @param array $list
 * @return bool
 */
function testMaxKeyValueSearch(array $list)
{
    $value = max($list);
    $max_key = array_search($value, $list);
    $max_value = $list[$max_key];
    $response = [
        $max_key => $max_value
    ];

    if ($response === maxKeyValueSearch($list)) {
        return true;
    }
    return false;
}
