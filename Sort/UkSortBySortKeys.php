<?php

// ソート用キー
$sort_keys = [
    'id',
    'name',
    'password',
    'skill',
    'role',
    'note',
];

// 対象データ
$users = [
    [
        'note' => "管理者だよ",
        'role' => "Admin",
        'password' => "xxxxx",
        'skill' => "IT",
        'name' => "優さん",
        'id' => 1,
    ],
    [
        'name' => "田中っち",
        'note' => "",
        'password' => "yyyyy",
        'skill' => "Actor",
        'id' => 2,
        'role' => "Member",
    ],
    [
        'password' => "yyyyy",
        'id' => 3,
        'note' => "",
        'skill' => "Actor",
        'role' => "Guest",
        'name' => "木村",
    ],
];

// ソート用にkeyとvalueを反転させる
$sort_keys = array_flip($sort_keys);
// array(6) {
//     ["id"]=>
//     int(0)
//     ["name"]=>
//     int(1)
//     ["password"]=>
//     int(2)
//     ["skill"]=>
//     int(3)
//     ["role"]=>
//     int(4)
//     ["note"]=>
//     int(5)
// }

// 実行
var_dump(ukSortBySortKeys($users, $sort_keys));
// array(3) {
//     [1]=>
//     array(6) {
//       ["id"]=>
//       int(1)
//       ["name"]=>
//       string(9) "優さん"
//       ["password"]=>
//       string(5) "xxxxx"
//       ["skill"]=>
//       string(2) "IT"
//       ["role"]=>
//       string(5) "Admin"
//       ["note"]=>
//       string(15) "管理者だよ"
//     }
//     [2]=>
//     array(6) {
//       ["id"]=>
//       int(2)
//       ["name"]=>
//       string(12) "田中っち"
//       ["password"]=>
//       string(5) "yyyyy"
//       ["skill"]=>
//       string(5) "Actor"
//       ["role"]=>
//       string(6) "Member"
//       ["note"]=>
//       string(0) ""
//     }
//     [3]=>
//     array(6) {
//       ["id"]=>
//       int(3)
//       ["name"]=>
//       string(6) "木村"
//       ["password"]=>
//       string(5) "yyyyy"
//       ["skill"]=>
//       string(5) "Actor"
//       ["role"]=>
//       string(5) "Guest"
//       ["note"]=>
//       string(0) ""
//     }
// }

/**
 * 配列を任意のソートキー配列でソートして返却
 *
 * @param array $data
 * @param array $sort_keys
 * @return array
 */
function ukSortBySortKeys(array $data, array $sort_keys): array
{
    foreach ($data as $datum) {
        // @see https://www.php.net/manual/ja/function.uksort.php
        uksort($datum, function ($x, $y) use ($sort_keys) {
            if ($sort_keys[$x] === $sort_keys[$y]) {
                return 0;
            }
            return ($sort_keys[$x] > $sort_keys[$y]) ? 1 : -1;
        });
        $sorted_users[$datum['id']] = $datum;
    }
    return $sorted_users;
}
