<?php

/**
 * 重複した値を返却
 *
 * @param array $array
 * @return array
 */
function searchDuplicatedValue(array $array): array
{
    // 要素の重複チェック
    $unique_array = array_values(array_unique($array));
    if (count($unique_array) !== count($array)) {
        // 重複している値を配列で取得
        // 重複している値を返却 ex. array_count_values($array): ["xxx" => 1,"yyy" => 2,"zzz" => 2]
        // 重複していない値は1なので0となる
        $duplicated_array = array_filter(array_count_values($array), function ($v) {
            return ($v-1 !== 0);
        }); // ["yyy" => 0, "zzz" => 1]
        return array_keys($duplicated_array); // ["yyy", "zzz"]
    }
}


/**
 * 重複した値のキーと値を返却
 *
 * @param array $array
 * @return array
 */
function searchDuplicatedKeysAndValues(array $array): array
{
    $duplicated_array = searchDuplicatedValue($array);

    $response = [];
    foreach ($duplicated_array as $duplicated_value) {
        $keys = array_keys($array, $duplicated_value);
        $response[] = [
            'keys' => $keys,
            'value' => $duplicated_value
        ];
    }
    return $response;
}

$array = ['apple', 'apple', 'orange', 'banana', 'banana', 'mikan', 'apple', 'iyokan', 'melon', 'pine', 'pine'];
print_r(searchDuplicatedValue($array));
// Array
// (
//     [0] => apple
//     [1] => banana
//     [2] => pine
// )

print_r(searchDuplicatedKeysAndValues($array));
// Array
// (
//     [0] => Array
//         (
//             [keys] => Array
//                 (
//                     [0] => 0
//                     [1] => 1
//                     [2] => 6
//                 )
//             [value] => apple
//         )
//     [1] => Array
//         (
//             [keys] => Array
//                 (
//                     [0] => 3
//                     [1] => 4
//                 )
//             [value] => banana
//         )
//     [2] => Array
//         (
//             [keys] => Array
//                 (
//                     [0] => 9
//                     [1] => 10
//                 )

//             [value] => pine
//         )
// )
