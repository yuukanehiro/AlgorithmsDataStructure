<?php

$rows = [
    ['node_id' => 1, 'name' => 'Root', 'ancestor' => 1, 'descendant' => 1, 'path_length' => 0],
    ['node_id' => 2, 'name' => 'Child A', 'ancestor' => 1, 'descendant' => 2, 'path_length' => 1],
    ['node_id' => 3, 'name' => 'Child B', 'ancestor' => 1, 'descendant' => 3, 'path_length' => 1],
    ['node_id' => 4, 'name' => 'Grandchild A1', 'ancestor' => 2, 'descendant' => 4, 'path_length' => 1],
    ['node_id' => 5, 'name' => 'Grandchild A2', 'ancestor' => 2, 'descendant' => 5, 'path_length' => 1],
    ['node_id' => 6, 'name' => 'Grandchild B1', 'ancestor' => 3, 'descendant' => 6, 'path_length' => 1],
];

$tree = [];

// 1. 全てのノードを$treeに初めに格納する
foreach ($rows as $row) {
    $row['children'] = [];
    $tree[$row['node_id']] = $row;
}

// 2. 子ノードを関連付ける
foreach ($rows as $row) {
    if ($row['path_length'] != 0) {
        $tree[$row['ancestor']]['children'][$row['node_id']] = &$tree[$row['node_id']];
    }
}

// 表示
foreach ($tree as $node) {
    if ($node['path_length'] == 0) {
        displayTree($node);
    }
}

function displayTree(array $node, int $level = 0) {
    echo str_repeat('--', $level) . $node['name'] . "\n";
    foreach ($node['children'] as $child) {
        displayTree($child, $level + 1);
    }
}
