<?php

$users = [
    [
        'id' => 1,
        'email' => '1@example.com',
        'profile_enable' => true,
    ],
    [
        'id' => 2,
        'email' => '2@example.com',
        'profile_enable' => false,
    ],
    [
        'id' => 3,
        'email' => '3@example.com',
        'profile_enable' => true,
    ],
];

$user_profiles = [
    [
        'id' => 1,
        'user_id' => 1,
        'name' => "優さん",
    ],
    [
        'id' => 2,
        'user_id' => 2,
        'name' => "佐藤",
    ],
    [
        'id' => 3,
        'user_id' => 3,
        'name' => "鈴木",
    ],
];

// 子を親のidでindexを指定して配列化
$profile_contents = [];
foreach ($user_profiles as $user_profile) {
    $profile_contents[$user_profile['user_id']] = $user_profile;
}

// 親のプロフィール設定が有効であれば出力
foreach ($users as $user) {
    if ($user['profile_enable']) {
        print_r($profile_contents[$user['id']]);
    }
}

// Array
// (
//     [id] => 1
//     [user_id] => 1
//     [name] => 優さん
// )
// Array
// (
//     [id] => 3
//     [user_id] => 3
//     [name] => 鈴木
// )

